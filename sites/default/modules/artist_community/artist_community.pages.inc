<?php

function artist_community_search_page() {

    // include the community js
    ctools_add_js('community', 'artist_community');

    // declare some empty stuff
    $filters        = array();
    $content        = array();
    $output         = '';
    $articles_data  = array();
    $events_data    = array();
    $all_results    = array();
    $kill_content   = false;
    $filtered_by_events_only = false;

    // pull in solarium config
    global $solarium_config;

    // set up how many articles we want to pull back at a go
    $default_content_chunk = 50;

    // containers for the query conditions we'll build below
    $nodeQueryBuilder = array();
    $userQueryBuilder = array();

    // instantiate our client and query objects
    $client = new Solarium\Client($solarium_config);
    $solarium_query = $client->createSelect();

    // assign url vars to local variables
    $local_og = (isset($_GET['og'])) ? $_GET['og'] : null;
    $local_content = (isset($_GET['content'])) ? $_GET['content'] : null;
    $start_row = (isset($_GET['start']) && is_numeric($_GET['start'])) ? intval($_GET['start']) : null;
    $num_rows = (isset($_GET['rows']) && is_numeric($_GET['rows'])) ? intval($_GET['rows']) : intval(SEARCH_DEFAULT_ROWS);

    // Handle Organic groups and taxonomies
    if ($local_og !== null) {
        $filter = new SearchApiQueryFilter;
        $filter->setConjunction('OR');

        foreach($local_og as $og_id => $terms) {
            $filter->condition('og_group_ref', $og_id);

            // Add taxonomy filters for a specific taxonomy
            if (is_array($terms)) {
                $sub_filter = new SearchApiQueryFilter;
                foreach($terms as $term) {
                    $sub_filter->condition('field_medium', $term);
                }
                $filter->filter($sub_filter);
            } else {
            }
        }
        $filters[] = $filter;
    }

    // Handle content and users
    if ($local_content !== null) {
        $filter = new SearchApiQueryFilter;
        $filter->setConjunction('OR');

        foreach($local_content as $type => $value) {
            switch($type) {
                case 'artwork':
                    if (isset($local_content['artwork']) &&
                        is_array($local_content['artwork'])) {
                        foreach ($local_content['artwork'] as $tid) {
                            $term = taxonomy_term_load($tid);
                            $filter->condition('field_subject_concept', $tid);
                        }
                        break;
                    }
            }
        }
    } else {
        // get articles for 'top stories' block. if there's a community filter, merge
        // it with the article type filter. package the data up for the template
        $article_filters = array();
        $article_filter = new SearchApiQueryFilter;
        $article_filter->condition('type', 'article');
        $article_filters[] = $article_filter;
        if ($local_og !== null) {
            $article_filters = array_merge($article_filters, $filters);
        }
        $articles = artist_community_execute_query(NODE_INDEX, $article_filters, array(array('changed')));
        foreach($articles as $index => $article) {
            $context_article_data = new StdClass();
            $author_full_name = '';
            $context_user_main_profile = profile2_load_by_user($article->uid, 'main');
            if (isset($context_user_main_profile->field_full_name['und'])) {
                $entity = field_collection_item_load($context_user_main_profile->field_full_name['und'][0]['value']);
                $first_name = $entity->field_first_name['und'][0]['value'];
                $last_name = $entity->field_last_name['und'][0]['value'];
                $author_full_name = "$first_name $last_name";
            } else {
                $author_full_name = $article->name;
            }
            $context_article_data->author = $author_full_name;
            $context_article_data->title = $article->title;
            $context_article_data->image_uri = isset($article->field_images['und']) ? file_create_url($article->field_images['und'][0]['uri']) : '';
            $context_article_data->photo_credit = isset($article->field_images['und'][0]['image_field_caption']['value']) ? $article->field_images['und'][0]['image_field_caption']['value'] : '';
            $context_article_data->excerpt = (isset($article->field_body['und'])) ? text_summary($article->field_body['und'][0]['value'], 'html', 300) : '';
            $context_article_data->nid = $article->nid;
            $category_term = (isset($article->field_article_category['und'])) ? taxonomy_term_load($article->field_article_category['und'][0]['tid']) : '';
            $context_article_data->category = (isset($category_term->name)) ? $category_term->name : '';
            $articles_data[] = $context_article_data;
        }

        // as above, but with events
        $start_date = new DateTime();
        $end_date = date('Y-m-d\TH:i:s\Z', strtotime("+7 days"));
        $event_filters = array();
        $event_filter = new SearchApiQueryFilter;
        $event_filter->condition('type', 'event');
        // $event_filter->condition('field_date:value', $start_date->format('Y-m-d\TH:i:s\Z'), '>=');
        // $event_filter->condition('field_date:value', $end_date, '<=');
        $event_filters[] = $event_filter;
        if ($local_og !== null) {
            $event_filters = array_merge($event_filters, $filters);
        }

        $events = artist_community_execute_query(NODE_INDEX, $event_filters, array(array('promote', 'DESC'), array('field_date:value', 'ASC')), 3);
        if (!empty($events)) {
            $events_data['others'] = array();
            foreach ($events as $index => $event) {
                $context_event_data = new StdClass();
                $context_event_data->nid = $event->nid;
                $context_event_data->title = $event->title;
                $context_event_data->text = text_summary($event->body['und'][0]['value'], 'html', 300);
                $context_event_data->image_uri = image_style_url('medium', $event->field_images['und'][0]['uri']);

                if (!(isset($events_data['hero']))) {
                    $events_data['hero'] = $context_event_data;
                } else {
                    $events_data['others'][] = $context_event_data;
                }
            }
        }
    }

    // get latest users data, format data for template
    $latest_user_filter = new SearchApiQueryFilter;
    $latest_user_filter->condition('roles', ARTIST_ROLE);
    $latest_users = artist_community_execute_query(USER_INDEX, array($latest_user_filter), array(array('created', 'DESC')));
    $user_keys = array_keys($latest_users);
    $latest_users_data = array();
    foreach($user_keys as $index => $value) {
        if ($index >= 3) { break; }
        $user = $latest_users[$value];
        $context_latest_user_data = new StdClass();

        $full_name = mnartist_profiles_collective_or_fullname_or_username($user->uid);
        $image_uri = (isset($user->picture->uri)) ? image_style_url('artist_thumbnail_small', $user->picture->uri) : 'http://mnartist.imalab.us/sites/default/files/styles/artist_thumbnail_small/public/pictures/picture-default.jpg';

        $context_latest_user_data->uid = $user->uid;
        $context_latest_user_data->username = $user->name;
        $context_latest_user_data->full_name = $full_name;
        $context_latest_user_data->image_uri = $image_uri;
        $latest_users_data[] = $context_latest_user_data;
    }

    $all_community_results = _artist_community_get_items_query($local_og, $local_content, $start_row, $num_rows);

    $all_event_results = null;
    if (isset($_GET['content']) &&
        count($_GET['content']) === 1 &&
        !(isset($_GET['og'])) &&
        isset($_GET['content']['event'])) {

        $filtered_by_events_only = true;

        $all_event_results = array();
        foreach ($all_community_results as $index => $row) {

            $date_key = date_create($row['item']->field_date['und'][0]['value']);
            $date_key->setTime(0,0,0);
            $date_key_string = $date_key->format('Y-m-d');
            if (isset($all_event_results[$date_key_string])) {
                $all_event_results[$date_key_string][] = $row;
            } else {
                $all_event_results[$date_key_string] = array($row);
            }
        }
    }

    return theme('artist_community_page', array('content' => $all_community_results, 'articles' => $articles_data, 'events' => $events_data, 'latest_users' => $latest_users_data, 'all_event_results' => $all_event_results));
}
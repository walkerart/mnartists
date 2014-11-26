<?php

function artist_community_search_page() {

    // include the community js
    ctools_add_js('community', 'artist_community');
    ctools_add_js('follow-menu', 'artist_community');

    // include the banner stuff
    drupal_add_js(drupal_get_path('module', 'artist_community') .'/banner/javascripts/src/main.js');
    drupal_add_css(drupal_get_path('module', 'artist_community') .'/banner/banner_style.css');

    // declare some empty stuff
    $filters        = array();
    $user_filters   = array();
    $content        = array();
    $output         = '';
    $articles_data  = array();
    $latest_users_data = array();
    $from_the_network_posts = array();
    $all_event_results = array();
    $from_the_network_limit = 3;
    $events_data    = array();
    $all_results    = array();
    $kill_content   = false;
    $filtered_by_events_only = false;
    // user "MN Artists"
    $default_uid = '492';


    // how many articles to include in featured
    // articles section
    $number_of_featured_articles = 7;

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
    $local_sort = (isset($_GET['sort'])) ? $_GET['sort'] : null;
    $local_sort_direction = (isset($_GET['sort_direction'])) ? $_GET['sort_direction'] : null;

    // Handle Organic groups and taxonomies
    if (!empty($local_og)) {
        $filter = new SearchApiQueryFilter;
        $filter->setConjunction('OR');

        $user_filter = new SearchApiQueryFilter;
        $user_filter->setConjunction('OR');
// dpm($local_og);
        // @CK: fixed per the logic of similar query in _artist_community_get_items_query()
        foreach($local_og as $og_id => $terms) {
            if (is_numeric($og_id)) {
                $user_filter->condition('og_user_node', $og_id);
            }
            // Add taxonomy filters for a specific taxonomy
            if (is_array($terms)) {
                // $sub_filter = new SearchApiQueryFilter; // @CK
                $user_sub_filter = new SearchApiQueryFilter;
                foreach($terms as $term) {
                    $filter->condition('field_medium', $term);
                }
                // $filter->filter($sub_filter);   // @CK
            }
            elseif (is_numeric($og_id)) {
                $filter->condition('og_group_ref', $og_id);
            }
        }
        $filters[] = $filter;
        $user_filters[] = $user_filter;
    }

    // Handle content and users
    if ($local_content !== null) {
        // @CK: This part never used?
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
        $article_filter->condition('type', 'article', '=');
        $article_filter->condition('status', '1', '=');

        //skip the about articles
        $article_filter->condition('field_article_category', ABOUT_TID, '<>');
        $article_filters[] = $article_filter;
        if ($local_og !== null) {
            $article_filters = array_merge($article_filters, $filters);
        }
        $articles = artist_community_execute_query(NODE_INDEX, $article_filters, array(array('promote', 'DESC'), array('changed', 'DESC')), $number_of_featured_articles);

        foreach($articles as $index => $article) {
            $context_article_data = new StdClass();
            $author_full_name = '';

            // if MN Artists, check we should print articlea author by byline
            if ($article->uid == $default_uid && !empty($article->field_byline)) {
                $author_full_name = $article->field_byline[LANGUAGE_NONE][0]['safe_value'];
            }
            else {
                $context_user_main_profile = profile2_load_by_user($article->uid, 'main');
                if (isset($context_user_main_profile->field_full_name['und'])) {
                    $entity = field_collection_item_load($context_user_main_profile->field_full_name['und'][0]['value']);
                    $first_name = $entity->field_first_name['und'][0]['value'];
                    $last_name = $entity->field_last_name['und'][0]['value'];
                    $author_full_name = "$first_name $last_name";
                } else {
                    $author_full_name = $article->name;
                }
            }
            $context_article_data->author = $author_full_name;
            $context_article_data->title = $article->title;
            $context_article_data->subhead = isset($article->field_article_subheader['und']) ? $article->field_article_subheader['und'][0]['value'] : '';
            $context_article_data->image_uri = isset($article->field_images['und']) ? image_style_url('featured_article', $article->field_images['und'][0]['uri']) : '';
            $context_article_data->photo_credit = isset($article->field_images['und'][0]['image_field_caption']['value']) ? $article->field_images['und'][0]['image_field_caption']['value'] : '';
            $context_article_data->excerpt = (isset($article->field_body['und'])) ? strip_tags(text_summary($article->field_body['und'][0]['value'], 'html', 300)) : '';
            $context_article_data->nid = $article->nid;
            $category_term = (isset($article->field_article_category['und'])) ? taxonomy_term_load($article->field_article_category['und'][0]['tid']) : '';
            $context_article_data->category = (isset($category_term->name)) ? $category_term->name : '';
            $articles_data[] = $context_article_data;
        }

        // as above, but with events
        $start_date = date('Y-m-d\TH:i:s\Z', time());
        $end_date = date('Y-m-d\TH:i:s\Z', strtotime("+7 days"));
        $event_filters = array();
        $event_filter = new SearchApiQueryFilter;
        $event_filter->condition('type', 'event');
        $event_filter->condition("field_date:value", $start_date, ">=");
        $event_filter->condition("field_date:value", $end_date, "<");
        $event_filter->condition('status', '1', '=');
        $event_filters[] = $event_filter;
        if ($local_og !== null) {
            $event_filters = array_merge($event_filters, $filters);
        }

        $from_the_network_filters = array();
        $from_the_network_filter = new SearchApiQueryFilter;
        $from_the_network_filter->condition('type', 'from_the_network_item');
        $from_the_network_filter->condition('status', '1', '=');
        $from_the_network_filters[] = $from_the_network_filter;
        if (!is_null($local_og)) {
            $from_the_network_filters = array_merge($from_the_network_filters, $filters);
        }
        $from_the_network_result = artist_community_execute_query(NODE_INDEX, $from_the_network_filters, array(array('promote', 'DESC'), array('changed', 'DESC')), $from_the_network_limit);
        foreach ($from_the_network_result as $index => $post) {
            $post_data = new StdClass();
            $post_data->nid = $post->nid;
            $post_data->title = $post->title;
            if (isset($post->field_images['und'])) {
                $post_data->image_url = image_style_url('from_the_network', $post->field_images['und'][0]['uri']);
            }
            $post_data->subheader = (isset($post->field_subheader['und'])) ? $post->field_subheader['und'][0]['value'] : '';
            $post_data->url = (isset($post->field_url['und'])) ? $post->field_url['und'][0]['value'] : '';
            $post_data->source = (isset($post->field_url['und'])) ? $post->field_url['und'][0]['title'] : '';
            $from_the_network_posts[] = $post_data;
        }

        // Upcoming Event on front page
        $events = artist_community_execute_query(NODE_INDEX, $event_filters, array(array('promote', 'DESC'), array('field_date:value', 'ASC')), 3);
        if (!empty($events)) {
            $events_data['others'] = array();
            foreach ($events as $index => $event) {
                $context_event_data = new StdClass();
                $context_event_data->nid = $event->nid;
                $context_event_data->title = $event->title;

                $date_utc = format_date(strtotime($event->field_date['und'][0]['value']), 'custom', 'Y-m-d\T00:00:00\Z');
                $context_event_data->date = format_date(strtotime($date_utc), 'custom', 'M d');

                $context_event_data->text = isset($event->body['und']) ? text_summary($event->body['und'][0]['value'], 'html', 300) : '';
                $context_event_data->image_uri = image_style_url('medium', $event->field_images['und'][0]['uri']);

                if (!(isset($events_data['hero']))) {
                    $events_data['hero'] = $context_event_data;
                } else {
                    $events_data['others'][] = $context_event_data;
                }
            }
        }

        // get latest users data, format data for template
        $latest_user_filters = array();
        $latest_user_filter = new SearchApiQueryFilter();
        $latest_user_filter->condition('roles', ARTIST_ROLE);
        $latest_user_filter->condition('picture_url', NULL, '<>');
        $latest_user_filter->condition('status', '1', '=');
        $latest_user_filters[] = $latest_user_filter;
        if ($local_og !== null) {
            $latest_user_filters = array_merge($latest_user_filters, $user_filters);
        }
        $latest_users = artist_community_execute_query(USER_INDEX, $latest_user_filters, array(array('created', 'DESC')), 3);
        $user_keys = array_keys($latest_users);
        foreach($user_keys as $index => $value) {
            $user = $latest_users[$value];
            // if (is_null($user->picture)) { continue; }
            $context_latest_user_data = new StdClass();

            $full_name = mnartist_profiles_collective_or_fullname_or_username($user->uid);
            $working_uri = (isset($user->picture->uri)) ? $user->picture->uri : variable_get('user_picture_default');
            $image_uri = image_style_url('artist_thumbnail_small', $working_uri);

            $context_latest_user_data->uid = $user->uid;
            $context_latest_user_data->username = $user->name;
            $context_latest_user_data->full_name = $full_name;
            $context_latest_user_data->image_uri = $image_uri;
            $latest_users_data[] = $context_latest_user_data;
        }
    }



    $all_community_results = _artist_community_get_items_query($local_og, $local_content, $start_row, $num_rows, null, $local_sort, $local_sort_direction);

    $highlighted_event = null;

    // Making event_date overrules event_include_past, i.e. event_include_past has no effect when event_date exists
    if (isset($_GET['event_date']) && isset($_GET['content']) && !empty($_GET['content']) && isset($_GET['content']['event_include_past'])) {
        unset($_GET['content']['event_include_past']);
    }

    // Event filter, e.g.
    // - /community?content[event]=1
    // - /?content[event]=1&event_date=2014-11-26
    if (isset($_GET['content']) &&
        count($_GET['content']) === 1 &&
        !(isset($_GET['og'])) &&
        isset($_GET['content']['event'])) {

        $filtered_by_events_only = true;
        $highlighted_event_node_id = null;
        $highlighted_event_node_date = null;
        foreach ($all_community_results['results'] as $index => $row) {
            // date should always be set as it's a required field,
            // but putting this here to prevent a breakdown if that
            // somehow ever happens
            if (isset($row['item']->field_date['und'])) {
                $date = strtotime($row['item']->field_date['und'][0]['value']);
                $date_utc = format_date($date, 'custom', 'Y-m-d\T00:00:00\Z');
                $date_string = format_date(strtotime($date_utc), 'custom', 'Y-m-d');

                if (isset($all_event_results[$date_string])) {
                    $all_event_results[$date_string][] = $row;
                } else {
                    $all_event_results[$date_string] = array($row);
                }

                if ($row['item']->promote && REQUEST_TIME < $date && ($date < $highlighted_event_node_date || $highlighted_event_node_date == null)) {
                    $highlighted_event_node_id = $row['item']->nid;
                    $highlighted_event_node_date = $date_string;
                }
            }
        }

        if ($highlighted_event_node_id !== null) {
            $highlighted_event_node = node_load($highlighted_event_node_id);// @TODO get real node based on criteria specified by mn
            $highlighted_event_node_venue = node_load($highlighted_event_node->field_venue['und'][0]['target_id']);
            $highlighted_event = new StdClass;
            $highlighted_event->nid = $highlighted_event_node->nid;
            $highlighted_event->title = $highlighted_event_node->title;
            $highlighted_event->body = (isset($highlighted_event_node->body['und'])) ? text_summary($highlighted_event_node->body['und'][0]['value'], NULL, 800) : null;
            $highlighted_event->uri = "/node/{$highlighted_event_node->nid}";
            $highlighted_event->venue_name = $highlighted_event_node_venue->title;
            $highlighted_event->date = (isset($highlighted_event_node->field_date['und'])) ? new DateTime($highlighted_event_node->field_date['und'][0]['value']) : null;
            $highlighted_event->image_uri = (isset($highlighted_event_node->field_images['und'])) ? image_style_url('medium', $highlighted_event_node->field_images['und'][0]['uri']) : null;
        }
    }

    return theme('artist_community_page', array('content' => $all_community_results['results'],
                                                'total_num_results' => $all_community_results['total_num_results'],
                                                'articles' => $articles_data,
                                                'event_widget_items' => $events_data,
                                                'from_the_network_posts' => $from_the_network_posts,
                                                'latest_users' => $latest_users_data,
                                                'all_event_results' => $all_event_results,
                                                'filtered_by_events_only' => $filtered_by_events_only,
                                                'highlighted_event' => $highlighted_event,
                                                'banner_string' => artist_community_current_filters_as_banner_string()));
}

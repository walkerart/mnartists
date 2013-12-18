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

    // the field names in solr aren't quite
    // the same as the drupal entity field names,
    // so let's put those into variables why not?
    $og_group_red_field     = 'im_og_group_ref';
    $medium_field           = 'im_field_medium';
    $subject_field          = 'im_field_subject_concept';
    $user_node_field        = 'im_og_user_node';
    $type_field             = 'ss_type';
    $user_roles_field       = 'im_roles';
    $created_field          = 'ds_created';

    $default_content_chunk = 50;

    // containers for the query conditions we'll build below
    $nodeQueryBuilder = array();
    $userQueryBuilder = array();

    // config for solarium
    // @TODO move this somewhere more widely accessible
    $solarium_config = array(
        'endpoint' => array(
            'localhost' => array(
                'host' => '127.0.0.1',
                'port' => 8080,
                'path' => '/solr/',
            )
        )
    );

    // instantiate our query object
    $client = new Solarium\Client($solarium_config);
    $solarium_query = $client->createSelect();

    // Handle Organic groups and taxonomies

    if (isset($_GET['og'])) {
        $filter = new SearchApiQueryFilter;
        $filter->setConjunction('OR');

        foreach($_GET['og'] as $og_id => $terms) {
            $filter->condition('og_group_ref', $og_id);

            // Add taxonomy filters for a specific taxonomy
            if (is_array($terms)) {
                $sub_filter = new SearchApiQueryFilter;
                foreach($terms as $term) {
                    $sub_filter->condition('field_medium', $term);

                    $nodeQueryBuilder[] = "$medium_field:$term";
                }
                $filter->filter($sub_filter);
            } else {
                $nodeQueryBuilder[] = "$og_group_red_field:$og_id";
            }
            $userQueryBuilder[] = "$user_node_field:$og_id";
        }
        $filters[] = $filter;
    }

    // Handle content and users
    if (isset($_GET['content'])) {
        $filter = new SearchApiQueryFilter;
        $filter->setConjunction('OR');

        foreach($_GET['content'] as $type => $value) {
            switch($type) {
                case 'artwork':

                    $nodeQueryBuilder[] = "$type_field:$type";

                    if (isset($_GET['content']['artwork']) &&
                        is_array($_GET['content']['artwork'])) {
                        foreach ($_GET['content']['artwork'] as $tid) {
                            $term = taxonomy_term_load($tid);
                            $filter->condition('field_subject_concept', $tid);

                            $nodeQueryBuilder[] = "$subject_field:$tid";

                        }
                        break;
                    }
                case 'article':
                case 'event':
                case 'opportunity':
                    $nodeQueryBuilder[] = "$type_field:$type";
                    break;
                case 'artists':
                    if (isset($_GET['content']['artists']) &&
                        is_array($_GET['content']['artists'])) {
                        foreach ($_GET['content']['artists'] as $tid) {

                            // @TODO how do we do this? these fields were searchable through
                            // the search api, but only the main profile itself was
                            // $userQueryBuilder[] = '$user_node_field:$og_id';

                            // $term = taxonomy_term_load($tid);
                            // $term_target = '';
                            // if ($term->vid === EXPERIENCE_VID) {
                            //     $term_target = 'experiences';
                            // } else if ($term->vid === PRACTICE_VID) {
                            //     $term_target = 'practices';
                            // }
                        }
                    } else {
                        $userQueryBuilder[] = "$user_roles_field:".ARTIST_ROLE;
                    }
                    break;
                case 'organizations':
                    $userQueryBuilder[] = "$user_roles_field:".ORG_ROLE;
                    break;
            }
        }
    } else {
        // get articles for 'top stories' block. if there's a community filter, merge
        // it with the article type filter. package the data up for the template
        $article_filters = array();
        $article_filter = new SearchApiQueryFilter;
        $article_filter->condition('type', 'article');
        $article_filters[] = $article_filter;
        if (isset($_GET['og'])) {
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
            // $context_article_data->uri = url(drupal_lookup_path('article', 'node/' . $node->nid), array('absolute' => true));// @TODO how do we get this?
            $context_article_data->image_uri = isset($article->field_images['und']) ? file_create_url($article->field_images['und'][0]['uri']) : '';// @TODO article image placeholder? or just skip over articles that don't have one?
            $context_article_data->photo_credit = isset($article->field_images['und'][0]['image_field_caption']['value']) ? $article->field_images['und'][0]['image_field_caption']['value'] : '';
            $context_article_data->excerpt = (isset($article->field_body['und'])) ? text_summary($article->field_body['und'][0]['value'], 'html', 300) : '';
            $context_article_data->nid = $article->nid;
            $category_term = taxonomy_term_load($article->field_article_category['und'][0]['tid']);
            $context_article_data->category = $category_term->name;
            $articles_data[] = $context_article_data;
        }

        // as above, but with events
        $event_filters = array();
        $event_filter = new SearchApiQueryFilter;
        $event_filter->condition('type', 'event');
        // @TODO figure out this date filtering
        // $today = new DateTime();
        // $next_week = date_add(clone $today, date_interval_create_from_date_string('7 days'));
        // $event_filter->condition('field_date', $today->format('Y-m-d\TH:i:s\Z'), '>=');
        // $event_filter->condition('field_date', $next_week->format('Y-m-d\TH:i:s\Z'), '<=');
        $event_filters[] = $event_filter;
        if (isset($_GET['og'])) {
            $event_filters = array_merge($event_filters, $filters);
        }
        $events = artist_community_execute_query(NODE_INDEX, $event_filters, array());
        foreach ($events as $event) {
            $context_event_data = new StdClass();
            $context_event_data->nid = $event->nid;
            $context_event_data->title = $event->title;
            $context_event_data->image_uri = image_style_url('thumbnail', $event->field_images['und'][0]['uri']);
            $events_data[] = $context_event_data;
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

    // deal with solarium query
    $nodeQueryBuilderString = (count($nodeQueryBuilder) !== 0) ? ' AND ('.implode(' OR ', $nodeQueryBuilder).')' : '';
    $userQueryBuilderString = (count($userQueryBuilder) !== 0) ? ' AND ('.implode(' OR ', $userQueryBuilder).')' : '';
    // @TODO do those ss_type conditions need to be 3 ors or can they be on statement and derive the terms from a constant or something?
    $finalQueryString = "(index_id:default_node_index$nodeQueryBuilderString AND (ss_type:article OR ss_type:artwork OR ss_type:event)) OR (index_id:users$userQueryBuilderString)";
    $solarium_query->createFilterQuery('the_thing')->setQuery($finalQueryString);
    $solarium_query->setStart(0)->setRows($default_content_chunk);// @TODO 'pagination would go here too'
    $solarium_query->addSort($created_field, $solarium_query::SORT_ASC);
    $resultset = $client->select($solarium_query);

    // get items of the appropriate types, put them into
    // the all community results array
    foreach($resultset as $item) {
        switch ($item->index_id) {
            case 'users':
                $all_results[] = array('type' => 'user', 'item' => user_load($item->is_uid));
                break;
            case 'default_node_index':
                $all_results[] = array('type' => 'node', 'item' => node_load($item->is_nid));
                break;
        }
    }

    return theme('artist_community_page', array('content' => $all_results, 'articles' => $articles_data, 'events' => $events_data, 'latest_users' => $latest_users_data));
}
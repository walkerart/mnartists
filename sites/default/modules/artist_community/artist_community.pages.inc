<?php

function artist_community_search_page() {
    ctools_add_js('community', 'artist_community');

    $filters        = array();
    $user_filters   = array();
    $has_content    = FALSE;
    $content        = array();
    $has_user       = FALSE;
    $output         = '';
    $articles_data  = array();
    $events_data    = array();
    $all_content_items = array();
    $all_user_items = array();

    // Handle Organic groups and taxonomies

    if (isset($_GET['og'])) {
        $filter = new SearchApiQueryFilter;
        $filter->setConjunction('OR');

        $user_filter = new SearchApiQueryFilter;
        $user_filter->setConjunction('OR');

        foreach($_GET['og'] as $og_id => $terms) {
            $filter->condition('og_group_ref', $og_id);

            // Add taxonomy filters for a specific taxonomy
            if (is_array($terms)) {
                $sub_filter = new SearchApiQueryFilter;
                foreach($terms as $term) {
                    $sub_filter->condition('field_medium', $term);
                }

                $filter->filter($sub_filter);
            }

            // Add user index filters
            $user_filter->condition('og_user_node', $og_id);

        }

        $filters[] = $filter;
        $user_filters[] = $user_filter;
    }

    // Handle content and users
    if (isset($_GET['content'])) {
        $filter = new SearchApiQueryFilter;
        $filter->setConjunction('OR');

        $user_filter = new SearchApiQueryFilter;
        $user_filter->setConjunction('OR');

        foreach($_GET['content'] as $type) {
            switch($type) {
                case 'article':
                case 'artwork':
                case 'event':
                case 'opportunity':
                    $filter->condition('type', $type);
                    $has_content = TRUE;
                    break;
                case 'artists':
                    $user_filter->condition('roles', ARTIST_ROLE);
                    $has_user = TRUE;
                    break;
                case 'organizations':
                    $user_filter->condition('roles', ORG_ROLE);
                    $has_user = TRUE;
                    break;
            }
        }

        $filters[] = $filter;
        $user_filters[] = $user_filter;
    } else {
        $has_content = TRUE;
        $has_user = TRUE;

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

    // Query the content index
    if ($has_content) {
        $all_content_items = artist_community_execute_query(NODE_INDEX, $filters);
        foreach($all_content_items as $item) {
            $content_node = node_view($item, 'teaser');
            $content[$item->type][] = render($content_node);
        }
    }

    // Query the user index
    if ($has_user) {
        $all_user_items = artist_community_execute_query(USER_INDEX, $user_filters);
        foreach($all_user_items as $item) {
            $content['users'][] = theme('artist_community_artist_profile', array('user' => $item));
        }
    }
    // @TODO refactor above, $content is a leftover from when all
    // users and content types were kept discrete

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
        $practices = implode(', ', mnartist_profiles_practice_values_as_array($user->uid));
        $image_uri = (isset($user->picture->uri)) ? image_style_url('artist_thumbnail_small', $user->picture->uri) : 'http://mnartist.imalab.us/sites/default/files/styles/artist_thumbnail_small/public/pictures/picture-default.jpg';

        $context_latest_user_data->uid = $user->uid;
        $context_latest_user_data->username = $user->name;
        $context_latest_user_data->full_name = $full_name;
        $context_latest_user_data->practice = $practices;
        $context_latest_user_data->image_uri = $image_uri;
        $latest_users_data[] = $context_latest_user_data;
    }

    return theme('artist_community_page', array('content' => $content, 'all_content_items' => $all_content_items, 'articles' => $articles_data, 'events' => $events_data, 'latest_users' => $latest_users_data));// @TODO bundle the new data into content?
}
<?php

function artist_community_search_page() {
    ctools_add_js('community', 'artist_community');

    $filters        = array();
    $user_filters   = array();
    $has_content    = FALSE;
    $content        = array();
    $has_user       = FALSE;
    $output         = '';

    // Handle Organic groups and taxonomies
/*
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
*/
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
    }

    // Query the content index
    if ($has_content) {
        $items = artist_community_execute_query(NODE_INDEX, $filters);
        foreach($items as $item) {
            $content_node = node_view($item, 'teaser');
            $content[$item->type][] = render($content_node);
        }
    }

    // Query the user index
    if ($has_user) {
        $items = artist_community_execute_query(USER_INDEX, $user_filters);
        foreach($items as $item) {
            $content['users'][] = theme('artist_community_artist_profile', array('user' => $item));
        }
    }

    return theme('artist_community_page', array('content' => $content));
}

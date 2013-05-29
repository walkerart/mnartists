<?php

function artist_community_search_page() {
    ctools_add_js('community', 'artist_community');

    $filters        = array();
    $has_content    = FALSE;
    $has_user       = FALSE;
    $output         = '';

    // Handle Organic groups and taxonomies
    if (isset($_GET['og'])) {
        foreach($_GET['og'] as $og_id => $terms) {
            $filter = new SearchApiQueryFilter;
            $filter->condition('og_group_ref', $og_id);

            if (is_array($terms)) {
                $sub_filter = new SearchApiQueryFilter;
                foreach($terms as $term) {
                    $sub_filter->condition('field_medium', $term);
                }

                $filter->filter($sub_filter);
            }
            $filters[] = $filter;

            // Add user index filters
            $filter = new SearchApiQueryFilter;
            $filter->condition('og_user_node', $og_id);

            $user_filters[] = $filter;

        }
    }

    // Handle content and users
    if (isset($_GET['content'])) {
        $user_filter = new SearchApiQueryFilter;
        $user_filter->setConjunction('OR');

        $filter = new SearchApiQueryFilter;
        $filter->setConjunction('OR');

        foreach($_GET['content'] as $type) {
            // If all is selected reset everything and exit the loop
            if ($type == 'all') {
                $has_content    = TRUE;
                $has_user       = TRUE;
                $filters        = array();
                $user_filters   = array();
                break;
            }

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
            $content[$item->type][] = render(node_view($item, 'teaser'));
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

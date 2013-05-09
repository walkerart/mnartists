<?php

function artist_community_search_page() {
    ctools_add_js('community', 'artist_community');

    $filters = array();
    $output = '';

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

        foreach($_GET['content'] as $type) {
            switch($type) {
                case 'article':
                case 'artwork':
                case 'event':
                case 'opportunity':
                    $filter = new SearchApiQueryFilter;
                    $filter->condition('type', $type);
                    $filters[] = $filter;
                    break;
                case 'artists':
                    $user_filter->condition('roles', ARTIST_ROLE);
                    break;
                case 'organizations':
                    $user_filter->condition('roles', ORG_ROLE);
                    break;
            }
        }

        $user_filters[] = $user_filter;
    }

    $items = artist_community_execute_query(NODE_INDEX, $filters);
    foreach($items as $item) {
        $output .= render(node_view($item, 'teaser'));
    }

    $items = artist_community_execute_query(USER_INDEX, $user_filters);
    foreach($items as $item) {
        $output .= theme('artist_community_artist_profile', array('user' => $item));
    }

    return $output;
}

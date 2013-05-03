<?php

function artist_community_search_page() {
    $conditions = array();
    $output = '';
    $show_content = TRUE;
    $show_user = TRUE;

    // Filter by group nid
    if (isset($_GET['community'])) {
        $conditions['og_group_ref'] = $_GET['community'];
    }
    if (isset($_GET['tid'])) {
        $conditions['field_medium'] = $_GET['tid'];
    }   
    if (isset($_GET['content'])) {
        switch($_GET['content']) {
            case 'article':
            case 'artwork':
            case 'event':
            case 'opportunity':
                $conditions['type'] = $_GET['content'];
                $show_user = FALSE;
                break;
            case 'artists':
            case 'organizations':
                $show_content = FALSE;
                break;
        }
    }

    if ($show_content) {
        $items = artist_community_execute_query(NODE_INDEX, $conditions);
        foreach($items as $item) {
            $output .= render(node_view($item, 'teaser'));
        }
    }

    if ($show_user) {
        if (isset($_GET['content']) && $_GET['content'] == 'organizations') {
            $role = ORG_ROLE;
        } else {
            $role = ARTIST_ROLE;
        }

        // Search for latest artists
        $conditions = array();
        if (isset($_GET['community'])) {
            $conditions['og_user_node'] = $_GET['community'];
        }
        $conditions['roles'] = $role;

        $items = artist_community_execute_query(USER_INDEX, $conditions);
        foreach($items as $item) {
            $output .= theme('artist_community_artist_profile', array('user' => $item));
        }
    }

    return $output;
}

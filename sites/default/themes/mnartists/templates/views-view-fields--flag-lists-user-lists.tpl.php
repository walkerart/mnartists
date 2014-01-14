<?php

// this template renders the individual lists in
// the list of collection lists (it does this by
// rendering the singular list view)

$list_id = $row->fid;
$user_list_view = views_get_view('flag_lists_user_list', TRUE);
$user_list_view->set_display('page_1');
$user_list_view->set_arguments(array($list_id));
$user_list_view->pre_execute();
$user_list_view->execute();

if (count($user_list_view->result) > 0) { ?>
    <h2><a href="/<?= $user_list_view->get_url() ?>"><?= $user_list_view->get_title(); ?></a></h2>
    <?= $user_list_view->render() ?>
<?php } else { ?>
    <h2><?= $user_list_view->get_title(); ?></h2>
    <div class="view-flag-lists-user-list view-id-flag_lists_user_list view-display-id-page_1">
        <div class="view-content">
            <ul class="user-list">
                <li>Nothing in this collection yet</li>
            </ul>
        </div>
    </div>
<?php } ?>
<?php

// this template renders the individual lists in
// the list of collection lists (it does this by
// rendering the singular list view)
global $user;
$list_id = $row->fid;
$user_list_view = views_get_view('flag_lists_user_list', TRUE);
$user_list_view->set_display('page_1');
$user_list_view->set_arguments(array($list_id));
$user_list_view->pre_execute();
$user_list_view->execute();

if (count($user_list_view->result) > 0) { ?>
    <div class="user-list-wrap">
        <h2><a href="/user/<?= $user->uid ?>/<?= $user_list_view->get_url() ?>"><?= $user_list_view->get_title(); ?></a></h2>
        <ul class="edit-controls">
            <li><a href="/flags/lists/edit/<?= $list_id ?>">edit</a></li>
            <li><a href="/flags/lists/delete/<?= $list_id ?>">delete</a></li>
        </ul>
        <?= $user_list_view->render() ?>
    </div>
<?php } else { ?>
    <div class="user-list-wrap">
        <h2><?= $user_list_view->get_title(); ?></h2>
        <ul class="edit-controls">
            <li><a href="/flags/lists/edit/<?= $list_id ?>">edit</a></li>
            <li><a href="/flags/lists/delete/<?= $list_id ?>">delete</a></li>
        </ul>
        <ul class="user-list">
            <li>Nothing in this collection yet</li>
        </ul>
    </div>
<?php } ?>
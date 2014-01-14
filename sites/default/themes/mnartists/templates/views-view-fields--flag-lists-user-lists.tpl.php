<?php

// this template renders the individual lists in
// the list of collection lists (it does this by
// rendering the singular list view)

$list_uid = $row->flag_lists_flags_uid;
$list_id = $row->fid;
$list_title = $row->flag_lists_flags_title;

?>
<?php

$user_list_view = views_get_view('flag_lists_user_list', TRUE);
$user_list_view->set_display('page_1');
$user_list_view->set_arguments(array($list_id));
$user_list_view->pre_execute();
$user_list_view->execute();
print $user_list_view->render();

?>
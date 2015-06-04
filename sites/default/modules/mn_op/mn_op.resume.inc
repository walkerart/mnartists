<?php

function mn_op_resume($nid) {
	global $user;
	$uid = $user->uid;
	$node = node_load($nid);
	$application = mn_op_get_user_ap($uid, $nid);


	$rows = array(
		'nid' => $nid,
		'uid' => $uid
	);

	$output = '';
	if($application) {
		$output = theme('mn_op_resume', array('rows' => $rows));
		return $output;
	} else {
		return drupal_set_message(t('You are not authorized to view this page.'), 'warning');
	}
}

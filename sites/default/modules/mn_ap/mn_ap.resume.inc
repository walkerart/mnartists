<?php

function mn_ap_resume($nid, $uid) {
	global $user;
	$node = node_load($nid);
	$owner = $node->uid == $user->uid ? 1 : 0;
	$juror = mn_ap_check_juror($nid, $user->mail);

	$rows = array(
		'nid' => $nid,
		'uid' => $uid
	);

	$output = '';
	if(in_array('administrator', $user->roles) || $owner || $juror) {
		$output = theme('mn_ap_resume', array('rows' => $rows));
		return $output;
	} else {
		return drupal_set_message(t('You are not authorized to view this page.'), 'warning');
	}
}

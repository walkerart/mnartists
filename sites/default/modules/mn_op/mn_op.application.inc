<?php

/**
 * Render a view of users application for an opportunity.
 */
function mn_op_ap($nid) {
	global $user;
    $uid = $user->uid;

	$output = '';
	$opportunity = node_load($nid);
	$application = mn_op_get_user_ap($uid, $nid);
	$artworks = mn_op_get_user_ap_artworks($uid, $nid);
	$areas = get_form_areas($opportunity->field_op_required, $opportunity->field_op_optional);;
	$steps = get_form_steps($opportunity->field_op_required, $opportunity->field_op_optional, $opportunity->op_work_types);;


	$rows = array(
		'opportunity' => (array)$opportunity,
		'application' => $application,
		'artworks' => $artworks,
		'areas' => $areas,
		'steps' => $steps,
	);

	$output = theme('mn_op_application', array('rows' => $rows));
	return $output;
}

function mn_op_get_user_ap($uid, $nid) {
	$result = db_select('op_applications', 'op')
					->fields('op')
					->condition('nid', $nid, '=')
					->condition('uid', $uid, '=')
					->execute()
					->fetchAssoc();
	return $result;
}

function mn_op_get_user_ap_artworks($uid, $nid) {
	$result = db_select('op_artworks', 'op')
					->fields('op')
					->condition('nid', $nid, '=')
					->condition('uid', $uid, '=')
					->execute()
					->fetchAll();
	return $result;
}

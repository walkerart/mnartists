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

	if($application) {
		$artworks = mn_op_get_user_ap_artworks($uid, $nid);
		$areas = get_form_areas($opportunity->field_op_required, $opportunity->field_op_optional);
		$steps = get_form_steps($opportunity->field_op_required, $opportunity->field_op_optional, $opportunity->op_work_types);


		$rows = array(
			'opportunity' => (array)$opportunity,
			'application' => $application,
			'artworks' => $artworks,
			'areas' => $areas,
			'steps' => $steps,
		);

		$output = theme('mn_op_application', array('rows' => $rows));
		return $output;
	} else {
		return drupal_set_message(t('You are not authorized to view this page.'), 'warning');
	}
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

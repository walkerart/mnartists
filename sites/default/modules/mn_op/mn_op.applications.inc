<?php

/**
 * Render a index of user applications in the database.
 */
function mn_op_aps() {
	global $user;
	$uid = $user->uid;

	$output = '';
	$reopened = _get_reopened_applications($uid);
	$completed = _get_completed_applications($uid);
	$started = _get_started_applications($uid);
	$juries = _get_juror_opportunites($user->mail);
	$incomplete = '';

	if (! $completed && ! $started && ! $juries) {
		return drupal_set_message(t('You have no applications.'), 'error');
	}

	$rows = array(
		'juries' => $juries,
		'reopened' => $reopened,
		'completed' => $completed,
		'started' => $started
	); //get users applications

	$output = theme('mn_op_applications', array('rows' => $rows));
	return $output;
}

function _get_reopened_applications($uid) {
	$query = db_select('op_applications', 'op');
						$query->join('node', 'n', 'op.nid = n.nid');
						$query->join('field_data_op_dates ', 'd', 'op.nid = d.entity_id');
						$query->fields('op');
						$query->condition('op.uid', $uid, '=');
						$query->condition('op.reopen', 1, '=');
						$query->fields('n', array('title'));
						$query->fields('d', array('op_dates_value2'));
	$result = $query->execute()->fetchAll();
	return $result;
}

function _get_completed_applications($uid) {
	$query = db_select('op_applications', 'op');
						$query->join('node', 'n', 'op.nid = n.nid');
						$query->join('field_data_op_dates ', 'd', 'op.nid = d.entity_id');
						$query->fields('op');
						$query->condition('op.uid', $uid, '=');
						$query->condition('op.complete', 1, '=');
						$query->condition('op.reopen', 0, '=');
						$query->fields('n', array('title'));
						$query->fields('d', array('op_dates_value2'));
	$result = $query->execute()->fetchAll();
	return $result;
}

function _get_started_applications($uid) {
	$query = db_select('op_applications', 'op');
						$query->join('node', 'n', 'op.nid = n.nid');
						$query->join('field_data_op_dates ', 'd', 'op.nid = d.entity_id');
						$query->fields('op');
						$query->condition('op.uid', $uid, '=');
						$query->condition('op.complete', 0, '=');
						$query->condition('op.reopen', 0, '=');
						$query->fields('n', array('title'));
						$query->fields('d', array('op_dates_value2'));
	$result = $query->execute()->fetchAll();
	return $result;
}

function _get_juror_opportunites($email) {
	$query = db_select('op_jurors', 'op');
						$query->join('node', 'n', 'op.nid = n.nid');
						$query->join('field_data_op_dates ', 'd', 'op.nid = d.entity_id');
						$query->fields('op');
						$query->condition('op.mail', $email, '=');
						$query->fields('n', array('title'));
						$query->fields('d', array('op_dates_value2'));
	$result = $query->execute()->fetchAll();
	return $result;
}



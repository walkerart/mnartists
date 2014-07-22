<?php

function mn_ap_review($nid, $uid) {
	global $user;
	$node = node_load($nid);
	$owner = $node->uid == $user->uid ? 1 : 0;
	$juror = mn_ap_check_juror($nid, $user->mail);

	$review = _get_ap_review($nid, $user->uid, $uid);
	$paging = _get_submission_paging($nid);
	//look for a POST request
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if($review) {
			$review = _update_ap_review($nid, $user->uid, $uid, $_POST);
		} else {
			$review = _create_ap_review($nid, $user->uid, $uid, $_POST);
		}
	}

	$application = mn_ap_application_data($nid, $uid);
	$areas = get_form_areas($node->field_op_required, $node->field_op_optional);
	$artworks  = _get_ap_artworks($nid, $uid);
	$settings = _get_jury_settings($nid);
	$steps = get_form_steps($node->field_op_required, $node->field_op_optional, $node->op_work_types);

	$rows = array(
		'opportunity' => (array)$node,
		'juror' => $juror,
		'owner' => $owner,
		'review' => $review,
		'paging' => $paging,
		'settings' => $settings,
		'application' => $application,
		'areas' => $areas,
		'steps' => $steps,
		'artworks' => $artworks
	);

	$output = '';
	if(user_access('administrator') || $owner || $juror) {
		$output = theme('mn_ap_review', array('rows' => $rows));
		return $output;
	} else {
		return drupal_set_message(t('You are not authorized to view this page.'), 'warning');
	}
}

function _get_ap_review($nid, $uid, $aid){
	$result = db_select('op_rating', 'op')
      ->fields('op')
      ->condition('nid', $nid, '=')
      ->condition('uid', $uid, '=')
      ->condition('aid', $aid, '=')
      ->execute()
      ->fetchAssoc();
    return $result;
}

function _create_ap_review($nid, $uid, $aid, $data) {
	//db_insert('op_rating', 'op')
	$review = array(
		'nid' => $nid,
		'aid' => $aid,
		'uid' => $uid,
		'rating' => $data['rating'],
		'comment' => $data['comment']
		);
	$result = db_insert('op_rating')
		->fields($review)
		->execute();
	return $review;
}

function _update_ap_review($nid, $uid, $aid, $data) {
	$review = array(
		'nid' => $nid,
		'aid' => $aid,
		'uid' => $uid,
		'rating' => $data['rating'],
		'comment' => $data['comment']
		);
	db_update('op_rating')
      	->condition('nid', $nid, '=')
      	->condition('uid', $uid, '=')
      	->condition('aid', $aid, '=')
	    ->fields($review)
	    ->execute();
	if (isset($data['next'])) {
		drupal_goto('opportunity/' . $nid . '/submission/' . $data['next']);
	} else {
		drupal_goto('opportunity/'. $nid . '/submissions');
	}
	return $review;
}

function _get_submission_paging($nid) {
  $results = db_select('op_applications', 'op')
      ->fields('op', array('uid'))
      ->condition('nid', $nid, '=')
      ->condition('complete', 1, '=')
      ->orderBy('uid', 'desc')
      ->execute()
      ->fetchAll();
  $resultArray = array();
  foreach ($results as $result) {
    $resultArray[] = $result->uid;
  }
  return $resultArray;
}

function _get_ap_artworks($nid, $uid) {
	$results = db_select('op_artworks', 'op')
      ->fields('op')
      ->condition('nid', $nid, '=')
      ->condition('uid', $uid, '=')
      ->execute()
      ->fetchAll();
    return $results;
}

function _get_jury_settings($nid) {
	$results = db_select('op_jury_settings', 'op')
      ->fields('op')
      ->condition('nid', $nid, '=')
      ->execute()
      ->fetchAssoc();
    return $results;
}
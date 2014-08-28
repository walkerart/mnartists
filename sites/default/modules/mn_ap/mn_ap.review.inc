<?php

function mn_ap_review($nid, $uid) {
	global $user;
	$node = node_load($nid);
	$owner = $node->uid == $user->uid ? 1 : 0;
	$juror = mn_ap_check_juror($nid, $user->mail);
	$application = mn_ap_application_data($nid, $uid);
	$areas = get_form_areas($node->field_op_required, $node->field_op_optional);
	$artworks  = _get_ap_artworks($nid, $uid);
	$settings = _get_jury_settings($nid);
	$steps = get_form_steps($node->field_op_required, $node->field_op_optional, $node->op_work_types);
	$round = isset($settings['round']) ? $settings['round'] : 1;
	$review = _get_ap_review($nid, $user->uid, $uid, $round);
	$paging = _get_submission_paging($nid, $round);

	//look for a POST request
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if($review) {
			$review = _update_ap_review($nid, $user->uid, $uid, $_POST);
		} else {
			$review = _create_ap_review($nid, $user->uid, $uid, $_POST);
		}
	}

	$rows = array(
		'opportunity' => (array)$node,
		'juror' => $juror,
		'review' => $review,
		'paging' => $paging,
		'settings' => $settings,
		'application' => $application,
		'areas' => $areas,
		'steps' => $steps,
		'artworks' => $artworks
	);

	//get previous reviews if not round 1
	if ($settings != NULL && $settings['round'] != 1) {
		$i = 1;
		while ($i < $settings['round']) {
			$previous_reviews[] = _get_ap_review($nid, $user->uid, $uid, $i);
			$i++;
		}
		$rows['previous_reviews'] = $previous_reviews;
	} else {
		$rows['previous_reviews'] = '';
	}

	$output = '';
	if(in_array('administrator', $user->roles) || $owner || $juror) {
		$output = theme('mn_ap_review', array('rows' => $rows));
		return $output;
	} else {
		return drupal_set_message(t('You are not authorized to view this page.'), 'warning');
	}
}

function _get_ap_review($nid, $uid, $aid, $round){
	$result = db_select('op_rating', 'op')
      ->fields('op')
      ->condition('nid', $nid, '=')
      ->condition('uid', $uid, '=')
      ->condition('aid', $aid, '=')
      ->condition('round', $round, '=')
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
		'comment' => $data['comment'],
		'round' => $data['round']
		);
	$result = db_insert('op_rating')
		->fields($review)
		->execute();
	if (isset($data['next'])) {
		drupal_goto('opportunity/' . $nid . '/submission/' . $data['next']);
	} else {
		drupal_goto('opportunity/'. $nid . '/submissions');
	}
	return $review;
}

function _update_ap_review($nid, $uid, $aid, $data) {
	$review = array(
		'nid' => $nid,
		'aid' => $aid,
		'uid' => $uid,
		'rating' => $data['rating'],
		'comment' => $data['comment'],
		'round' => $data['round']
		);
	db_update('op_rating')
      	->condition('nid', $nid, '=')
      	->condition('uid', $uid, '=')
      	->condition('aid', $aid, '=')
      	->condition('round', $data['round'], '=')
	    ->fields($review)
	    ->execute();
	if (isset($data['next'])) {
		drupal_goto('opportunity/' . $nid . '/submission/' . $data['next']);
	} else {
		drupal_goto('opportunity/'. $nid . '/submissions');
	}
	return $review;
}

function _get_submission_paging($nid, $round) {
  $query = db_select('op_applications', 'op')
      ->fields('op', array('uid'))
      ->condition('nid', $nid, '=')
      ->condition('complete', 1, '=')
      ->orderBy('uid', 'asc');
    if ($round > 1 ) $query->condition('op.accept', '1', '=');
    $results = $query->execute()->fetchAll();
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

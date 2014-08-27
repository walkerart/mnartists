<?php

function mn_ap_admin($nid, $uid) {
	global $user;

	$node = node_load($nid);
	$owner = $node->uid == $user->uid ? 1 : 0;
	$paging = _get_submission_paging($nid);
	$jurors = mn_op_get_jurors($nid);
	$areas = get_form_areas($node->field_op_required, $node->field_op_optional);
	$steps = get_form_steps($node->field_op_required, $node->field_op_optional, $node->op_work_types);
	$artworks  = _get_ap_artworks($nid, $uid);
	$settings = mn_op_check_existing_settings($nid);

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['status'])) {
			mn_ap_update_ap_status($nid, $uid, $_POST['status']);
		} elseif (isset($_POST['reopen'])) {
			mn_ap_reopen_ap($nid, $uid, $_POST['reopen']);
		}
	}

	$reviews = mn_ap_get_review($nid, $uid, $settings['round']);


	$rows = array(
		'opportunity' => (array)$node,
		'owner' => $owner,
		'paging' => $paging,
		'jurors' => $jurors,
		'settings' => $settings,
		'reviews' => $reviews,
		'areas' => $areas,
		'steps' => $steps,
		'artworks' => $artworks
	);

	//get previous reviews if not round 1
	if ($settings != NULL && $settings['round'] != 1) {
		$i = 1;
		while ($i < $settings['round']) {
			$previous_reviews[] = mn_ap_get_review($nid, $uid, $i);
			$i++;
		}
		$rows['previous_reviews'] = $previous_reviews;
	} else {
		$rows['previous_reviews'] = '';
	}

	$output = '';
	if(in_array('administrator', $user->roles) || $owner ) {
		$output = theme('mn_ap_admin', array('rows' => $rows));
		return $output;
	} else {
		return drupal_set_message(t('You are not authorized to view this page.'), 'warning');
	}
}


function _get_submission_paging($nid) {
	$results = db_select('op_applications', 'op')
			->fields('op', array('uid'))
			->condition('nid', $nid, '=')
			->condition('complete', 1, '=')
			->orderBy('uid', 'asc')
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

function mn_ap_get_review($nid, $uid, $round) {
	$query = db_select('op_applications', 'ap');
	$query->join('op_rating', 'r', 'ap.uid = r.aid');
	$query->condition('ap.nid', $nid, '=')
				->condition('ap.uid', $uid, '=')
				->condition('r.nid', $nid, '=')
				->condition('r.round', $round, '=')
				->fields('ap',array('uid'))
				->fields('r',array('uid', 'aid', 'rating', 'comment'))
				->orderBy('ap.uid', 'desc');
	$results = $query->execute()->fetchAll();

	$submission = mn_ap_application_data($nid, $uid);
	$combined = array();

	$temp = array();
	$i = 0;
	$c = 1;
	$rating = 0;
	foreach ($results as $result) {
		if($result->uid == $submission['uid']) {
			$rating += $result->rating;
			$avg = $rating / $c;
			$temp['avgRating'] = $avg;
			$temp['voteCount'] = $c;
			$temp['reviews'][$i] = $result;
			$i++;
			$c++;
		}
	}
	$combined = array_merge($submission, (array)$temp);

	return $combined;
}
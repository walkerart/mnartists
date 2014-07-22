<?php
/*
** Get all submissions data for an opportunity
*/
function mn_ap_submission($nid) {
	global $user;
	$uid = $user->uid;
	$node = node_load($nid);
	$owner = $node->uid == $uid ? 1 : 0;
	$juror = mn_ap_check_juror($nid, $user->mail);

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      mn_ap_update_ap_status($nid, $_POST['uid'], $_POST['status']);
    }

	if(user_access('administrator') || $owner || $juror) {
		$output = '';
		//$submissions = mn_ap_get_submissions($nid);
		//$reviews = user_access('administrator') || $owner ? mn_ap_get_all_reviews($nid) : get_juror_reviews($nid, $uid);

		$settings = mn_op_check_existing_settings($nid);
		$areas = get_form_areas($node->field_op_required, $node->field_op_optional);

		$rows = array(
			'opportunity' => $node,
			'juror' => $juror,
			'owner' => $owner,
			'areas' => $areas,
			'settings' => $settings,
		);
    if($juror) {
      $juror_reviews = get_juror_reviews($nid, $uid);
      $rows['juror_reviews'] = $juror_reviews;
    }
    if(user_access('administrator')|| $owner ) {
      $reviews = mn_ap_get_all_reviews($nid);
      $rows['reviews'] = $reviews;
    }

		if (user_access('administrator') || $owner) {
			$jurors = mn_op_get_jurors($nid);
			$rows['jurorCount'] = count($jurors);
		}
		$output = theme('mn_ap_submissions', array('rows' => $rows));
		return $output;
	} else {
		return drupal_set_message(t('You do not have access.'), 'status');
	}
}
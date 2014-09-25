<?php

/**
 * Render a index of entries in the database.
 */
function mn_ap_apply($nid) {
	//$node = node_load($nid);
	//dpr($node);
	global $user;
	$uid = $user->uid;
	if (! $uid) return drupal_set_message(t('You need to be logged in to view this page!'), 'error');

	//get information defined in the Opportunity Content Type
	$op_data = mn_ap_opportunity_data($nid);
	//check for exiting application
	$ap_data = mn_ap_application_data($nid, $uid);

	if(isset($op_data['error'][0])) {
		return drupal_set_message(t('This opportunity is not available for applications.'), 'error');
	}
	//if this is not a reopened application
	if($ap_data['reopen'] == 0) {
		//check if application deadline has passed
		if (strtotime($op_data['end_date']) < strtotime($op_data['today'])) {
			return drupal_set_message(t('The application deadline: ' . date("F d, Y h:i a", strtotime($op_data['end_date']))  . ' for this opportunity has passed.'), 'warning');
		} elseif (strtotime($op_data['start_date']) > strtotime($op_data['today'])) {
			return drupal_set_message(t('The applications will not be accepted for this opportunity until: ' . date("F d, Y h:i a", strtotime($op_data['start_date']))), 'warning');
		}
	}

	//check if application is onsite
	if (! $op_data['apply_on_site']) {
		return drupal_set_message(t('The applications for this opportunity are on an external site.'), 'warning');
	}

	$output = '';
	//check id completed or still in progress
	$user_artworks = mn_ap_artworks_data($uid);
	$resume = mnartist_profiles_resume_download($uid);

	if (! $ap_data || $ap_data['complete'] == '0' || $ap_data['reopen'] == '1') {
		//if non-existing do drupal queries
		//if exists query op_applicaiton table and image table
		if ($ap_data) {
			$application_data = array(
					'opportunity' => $op_data,
					'artworks' => $user_artworks,
					'application' => $ap_data,
					'resume_view' => $resume
			);
			//if application is reopened get previous artworks selected
			if ($ap_data['reopen'] == '1') {
				$application_data['ap_artworks'] = mn_ap_get_ap_artworks($nid, $uid);
			}
			$rows = mn_ap_parse_data($application_data, $nid);
		} else {
			$user_profile = (array) user_load($uid);
			$main_profile =  (array) _profile2_by_uid_load($uid, 'main');
			$resume_profile =  (array) _profile2_by_uid_load($uid, 'resume');
			$profile2_data[] = array(
					'opportunity' => $op_data,
					'artworks' => $user_artworks,
					'user' => $user_profile,
					'main' => $main_profile,
					'resume' => $resume_profile,
					'resume_view' => $resume
			);
			$rows = mn_ap_profile2_data($profile2_data['0'], $nid);
		}
		//apply theme to node data
		$output = theme('mn_ap_apply', array('rows' => $rows['0'])); //used without template
		return $output;
	} else {
		//add drupal goto - back to opp page
		return drupal_set_message(t('You have already completed an application for the ' .  $op_data['title'] . ' on ' . date("F d, Y h:i a", strtotime($ap_data['updated_at'])) . '.'), 'warning');
	}
}
/*
* get data from the oppportunity content type
*/
function mn_ap_opportunity_data($nid) {
	$query =  new EntityFieldQuery();
	$query->entityCondition('entity_type', 'node')
		->entityCondition('bundle', 'opportunity')
		->propertyCondition('nid', $nid, '=')
		->propertyCondition('status', '1') //status is visbility to public
		->propertyOrderBy('created', 'DESC');

	$result = $query->execute();

	$out = '';
	if (!empty($result['node'])) {
		$out['nodes'] = node_view_multiple(node_load_multiple(array_keys($result['node'])));
	}

	if (empty($out['nodes'])) {
		return drupal_set_message(t('Opportunity not found.'), 'error');
	}

	$rows = array();
	foreach ($out['nodes']['nodes'] as $row) {
		$rows[] = (array)$row['#node'];
	}

	$r = array();
	foreach ($rows as $row) {
		if(!empty($row)){
			$form_steps = get_form_steps($row['field_op_required'], $row['field_op_optional'], $row['op_work_types']);
			$form_areas = get_form_areas($row['field_op_required'], $row['field_op_optional']);
			$form_areas_separate = _separate_form_areas($form_areas);
			$form_inputs = isset($form_areas_separate['inputs']) ? $form_areas_separate['inputs'] : '';
			$form_editors = "";
			$step_titles = get_form_titles($form_areas);
			$work_types = isset($row['op_work_types']['und']) ? get_work_types($row['op_work_types']) : '';
			//$steps = get_form_step_count($row['field_op_required'], $row['field_op_optional'], $row['op_work_types']);

			$startDate = mn_ap_get_date($row['op_dates']['und']['0']['value'], $row['op_dates']['und']['0']['timezone'], $row['op_dates']['und']['0']['timezone_db']);
			$endDate = mn_ap_get_date($row['op_dates']['und']['0']['value2'], $row['op_dates']['und']['0']['timezone'], $row['op_dates']['und']['0']['timezone_db']);
			$announceDate = mn_ap_get_date($row['field_announce_date']['und']['0']['value'], $row['field_announce_date']['und']['0']['timezone'], $row['field_announce_date']['und']['0']['timezone_db']);
			$currentDate = date("F j, Y, g:i a");
			$required_list = isset($row['field_op_required']['und']) ? get_required_list($row['field_op_required']['und']) : '';

			$r = array(
				//'row' => $row, //return entire row for use with dpt($rows)
				'nid' => $row['nid'],
				'status' => $row['status'],
				'steps' => isset($form_steps) ? $form_steps : '',
				'textareas' => '',
				'areas' => isset($form_areas) ? $form_areas : '',
				'additional_fields' => $form_inputs,
				'step_titles' => $step_titles != '' ? $step_titles : '',
				'title' => $row['title'],
				'apply_on_site' => $row['op_application_type']['und']['0']['value'],
				'description' => isset($row['body']['und']['0']['value']) ? $row['body']['und']['0']['value'] : '',
				'today' => $currentDate,
				'start_date' => $startDate, //$row['op_dates']['und']['0']['value'],
				'end_date' => $endDate, //$row['op_dates']['und']['0']['value2'],
				'announce_date' => $announceDate,
				'image' => isset($row['op_cover_image']['und']['0']) ? $row['op_cover_image']['und']['0'] : '',
				'email' => isset($row['op_email']['und']['0']['safe_value']) ? $row['op_email']['und']['0']['safe_value'] : '',
				'website' => isset($row['op_uri']['und']['0']['safe_value']) ? $row['op_uri']['und']['0']['safe_value'] : '',
				'min_works' => isset($row['op_min_works']['und']['0']['value']) ? $row['op_min_works']['und']['0']['value'] : '',
				'max_works' => isset($row['op_max_works']['und']['0']['value']) ? $row['op_max_works']['und']['0']['value'] : '',
				'artwork_desc' => isset($row['field_op_artwork_desc']['und']['0']['safe_value']) ? $row['field_op_artwork_desc']['und']['0']['safe_value'] : '',
				'communities' => isset($row['og_group_ref']) ? $row['og_group_ref'] : '',
				'guidelines' => isset($row['op_guidelines']['und']['0']['safe_value']) ? $row['op_guidelines']['und']['0']['safe_value'] : '',
				'work_types' => $work_types, //isset($row['op_work_types']['und']) ? $row['op_work_types']['und'] : '',
				'required' => $required_list, //isset($row['field_op_required']['und']) ? $row['field_op_required']['und'] : '',
				'optional' => isset($row['field_op_optional']['und']) ? $row['field_op_optional']['und'] : '',
				'proposal_desc' => isset($row['field_op_proposal_desc']['und']['0']['safe_value']) ? $row['field_op_proposal_desc']['und']['0']['safe_value'] : '',
				'statement_desc' => isset($row['field_op_statement_desc']['und']['0']['safe_value']) ? $row['field_op_statement_desc']['und']['0']['safe_value'] : '',
				'bio_desc' => isset($row['field_op_bio_desc']['und']['0']['safe_value']) ? $row['field_op_bio_desc']['und']['0']['safe_value'] : '',
				'resume_desc' => isset($row['field_op_resume_desc']['und']['0']['safe_value']) ? $row['field_op_resume_desc']['und']['0']['safe_value'] : '',
				'custom_1_title' => isset($row['field_op_custom_1']['und']['0']['safe_value']) ? $row['field_op_custom_1']['und']['0']['safe_value'] : '',
				'custom_1_desc' => isset($row['field_op_custom_desc_1']['und']['0']['safe_value']) ? $row['field_op_custom_desc_1']['und']['0']['safe_value'] : '',
				'custom_2_title' => isset($row['field_op_custom_2']['und']['0']['safe_value']) ? $row['field_op_custom_2']['und']['0']['safe_value'] : '',
				'custom_2_desc' => isset($row['field_op_custom_desc_2']['und']['0']['safe_value']) ? $row['field_op_custom_desc_2']['und']['0']['safe_value'] : '',
				'custom_3_title' => isset($row['field_op_custom_3']['und']['0']['safe_value']) ? $row['field_op_custom_3']['und']['0']['safe_value'] : '',
				'custom_3_desc' => isset($row['field_op_custom_desc_3']['und']['0']['safe_value']) ? $row['field_op_custom_desc_3']['und']['0']['safe_value'] : '',
				'custom_4_title' => isset($row['field_op_custom_4']['und']['0']['safe_value']) ? $row['field_op_custom_4']['und']['0']['safe_value'] : '',
				'custom_4_desc' => isset($row['field_op_custom_desc_4']['und']['0']['safe_value']) ? $row['field_op_custom_desc_4']['und']['0']['safe_value'] : '',
				'custom_up_1_title' => isset($row['field_op_custom_upload_1']['und']['0']['safe_value']) ? $row['field_op_custom_upload_1']['und']['0']['safe_value'] : '',
				'custom_up_1_desc' => isset($row['field_op_custom_up_desc_1']['und']['0']['safe_value']) ? $row['field_op_custom_up_desc_1']['und']['0']['safe_value'] : '',
				'custom_up_2_title' => isset($row['field_op_custom_upload_2']['und']['0']['safe_value']) ? $row['field_op_custom_upload_2']['und']['0']['safe_value'] : '',
				'custom_up_2_desc' => isset($row['field_op_custom_up_desc_2']['und']['0']['safe_value']) ? $row['field_op_custom_up_desc_2']['und']['0']['safe_value'] : '',
				'custom_up_3_title' => isset($row['field_op_custom_upload_3']['und']['0']['safe_value']) ? $row['field_op_custom_upload_3']['und']['0']['safe_value'] : '',
				'custom_up_3_desc' => isset($row['field_op_custom_up_desc_3']['und']['0']['safe_value']) ? $row['field_op_custom_up_desc_3']['und']['0']['safe_value'] : '',
				'custom_up_4_title' => isset($row['field_op_custom_upload_4']['und']['0']['safe_value']) ? $row['field_op_custom_upload_4']['und']['0']['safe_value'] : '',
				'custom_up_4_desc' => isset($row['field_op_custom_up_desc_4']['und']['0']['safe_value']) ? $row['field_op_custom_up_desc_4']['und']['0']['safe_value'] : '',
				'juror_note' => isset($row['field_op_juror_note']['und']['0']['safe_value']) ? $row['field_op_juror_note']['und']['0']['safe_value'] : '',
				'user' => $row['name'],
			);
		}
	}
	//dpr($r);
	return $r;
}

/*
* Separate Form Areas to allow them to be stepped through in template
*/
function _separate_form_areas($areas) {
	$separate_areas = '';
	foreach ($areas as $area) {
		if ($area == 'bio' || $area == 'statement' || $area == 'proposal' || substr($area, 0, 5) == 'field' ) {
			$separate_areas['editors'][] = $area;
		} elseif ($area != 'resume' && substr($area, 0, 6) != 'upload')  {
			$separate_areas['inputs'][] = $area;
		}
	}
	return $separate_areas;
}

/*
* Checks areas to render names for sections of the form
*/
function get_form_titles($areas) {
	$title = '';
	if (in_array('bio', $areas) && in_array('resume', $areas)) {
		$title['bio-resume'] = 'Bio and Resume';
	} elseif (in_array('bio', $areas)) {
		$title['bio-resume'] = 'Bio';
	} elseif (in_array('resume', $areas)) {
		$title['bio-resume'] = 'Resume';
	}
	if (in_array('statement', $areas) && in_array('proposal', $areas)) {
		$title['statement-proposal'] = 'Statement and Proposal';
	} elseif (in_array('statement', $areas)) {
		$title['statement-proposal'] = 'Statement';
	} elseif (in_array('proposal', $areas)) {
		$title['statement-proposal'] = 'Proposal';
	}
	return $title;
}

/*
* convert datetime to correct site db set time
*/
// function mn_ap_get_date($date, $timezone, $timezone_db) {
// 	$timezone = new DateTimeZone($timezone);
// 	$timezone_db = new DateTimeZone($timezone_db);

// 	$resultDate = new DateTime($date, $timezone_db);
// 	$resultDate->setTimezone($timezone);
// 	$resultDate = (array) $resultDate;
// 	$resultDate = new DateTime($resultDate['date']);
// 	$resultDate = $resultDate->format("F j, Y, g:i a");
// 	return $resultDate;
// }

// simply flatten the array to get rid of drupalness ['und'][0]['value'] junk
function get_work_types($types) {
	$types  = isset($types['und']) ? $types['und'] : '';
	foreach ($types as $t) {
		$work[] = $t['value'];
	}
	return $work;
}

function get_required_list($list) {
	foreach ($list as $l) {
		$required[] = $l['value'];
	}
	return $required;
 }

/**
 * Clean up data for use in view. Used on inital load of the page before ajax sets data in op_applications
 */
function mn_ap_profile2_data($profile, $nid) {
	$opportunity = $profile['opportunity'];
	$user = $profile['user'];
	$main = $profile['main'];
	$resume = $profile['resume'];
	$artworks = $profile['artworks'];
	$resume_view = $profile['resume_view'];

	//go get the fullname from the field collection
	if (isset($main['field_full_name']['und']['0']['value'])) {
		$fullname_id = $main['field_full_name']['und']['0']['value'];
		$name = mn_ap_get_fullname($fullname_id);
	}

	$rows[] = array(
		'nid' => $nid,
		'uid' => $user['uid'],
		'username' => $user['name'],
		'opportunity' => $opportunity,
		'op_title' => $opportunity['title'],
		'first_name' => isset($name['0']['first_name']) ? $name['0']['first_name'] : '',
		'last_name' => isset($name['0']['last_name']) ? $name['0']['last_name'] : '',
		'email' => isset($main['field_public_email']['und']['0']['email']) ? $main['field_public_email']['und']['0']['email'] : '',
		'phone' => isset($main['field_phone']['und']['0']['value']) ? $main['field_phone']['und']['0']['value'] : '',
		'address' => isset($main['field_address']['und']['0']['safe_value']) ? $main['field_address']['und']['0']['safe_value'] : '',
		'city' => isset($main['field_city']['und']['0']['safe_value']) ? $main['field_city']['und']['0']['safe_value'] : '',
		'state' => isset($main['field_state']['und']['0']['value']) ? $main['field_state']['und']['0']['value'] : '',
		'zip' => isset($main['field_zip']['und']['0']['value']) ? $main['field_zip']['und']['0']['value'] : '',
		'website' => isset($application['website']) ? $application['website'] : '',
		'gender' => isset($application['gender']) ? $application['gender'] : '',
		'ethnicity' => isset($application['ethnicity']) ? $application['ethnicity'] : '',
		'age' => isset($application['age']) ? $application['age'] : '',
		'county' => isset($application['county']) ? $application['county'] : '',
		'country' => isset($application['country']) ? $application['country'] : '',
		'field1' => isset($application['field1']) ? $application['field1'] : '',
		'field2' => isset($application['field2']) ? $application['field2'] : '',
		'field3' => isset($application['field3']) ? $application['field3'] : '',
		'field4' => isset($application['field4']) ? $application['field4'] : '',
		'upload1' => isset($application['upload1']) ? $application['upload1'] : '',
		'upload2' => isset($application['upload2']) ? $application['upload2'] : '',
		'upload3' => isset($application['upload3']) ? $application['upload3'] : '',
		'upload4' => isset($application['upload4']) ? $application['upload4'] : '',
		'resume_statement' => isset($resume['field_general_statement']['und']['0']['safe_value']) ? $resume['field_general_statement']['und']['0']['safe_value'] : '',
		'resume_bio' => isset($resume['field_biography']['und']['0']['safe_value']) ? $resume['field_biography']['und']['0']['safe_value'] : '',
		'proposal' =>	isset($application['proposal']) ? $application['proposal'] : '',
		'artworks' => $artworks,
		'profile' => $profile,
		'resume' => $resume_view,
	);
	return $rows;
}
/*
*
*/
function mn_ap_parse_data($profile, $nid) {
		$opportunity = $profile['opportunity'];
		$application = $profile['application'];
		$artworks = $profile['artworks'];
		$resume_view = $profile['resume_view'];
		$ap_artworks = isset($profile['ap_artworks']) ? $profile['ap_artworks'] : '';

		$rows[] = array(
		'nid' => $nid,
		'uid' => $application['uid'],
		'opportunity' => $opportunity,
		'op_title' => $opportunity['title'],
		//'username' => $application['name'],
		'first_name' => isset($application['first_name']) ? $application['first_name'] : '',
		'last_name' => isset($application['last_name']) ? $application['last_name'] : '',
		'email' => isset($application['email']) ? $application['email'] : '',
		'phone' => isset($application['phone']) ? $application['phone'] : '',
		'address' => isset($application['address']) ? $application['address'] : '',
		'city' => isset($application['city']) ? $application['city'] : '',
		'state' => isset($application['state']) ? $application['state'] : '',
		'zip' => isset($application['zip']) ? $application['zip'] : '',
		'website' => isset($application['website']) ? $application['website'] : '',
		'gender' => isset($application['gender']) ? $application['gender'] : '',
		'ethnicity' => isset($application['ethnicity']) ? $application['ethnicity'] : '',
		'age' => isset($application['age']) ? $application['age'] : '',
		'county' => isset($application['county']) ? $application['county'] : '',
		'country' => isset($application['country']) ? $application['country'] : '',
		'field1' => isset($application['field1']) ? $application['field1'] : '',
		'field2' => isset($application['field2']) ? $application['field2'] : '',
		'field3' => isset($application['field3']) ? $application['field3'] : '',
		'field4' => isset($application['field4']) ? $application['field4'] : '',
		'upload1' => isset($application['upload1']) ? $application['upload1'] : '',
		'upload2' => isset($application['upload2']) ? $application['upload2'] : '',
		'upload3' => isset($application['upload3']) ? $application['upload3'] : '',
		'upload4' => isset($application['upload4']) ? $application['upload4'] : '',
		'reopen' => $application['reopen'],
		'resume_statement' => isset($application['statement']) ? $application['statement'] : '',
		'resume_bio' => isset($application['bio']) ? $application['bio'] : '',
		'proposal' =>	isset($application['proposal']) ? $application['proposal'] : '',
		'artworks' => $artworks,
		'profile' => $profile,
		'resume' => $resume_view,
		'ap_artworks'=> isset($ap_artworks) ? $ap_artworks : ''
	);
	return $rows;
}

// get the fullname of user that is buried in a field collection
function mn_ap_get_fullname($fullname_id) {
    $entity = field_collection_item_load($fullname_id);
    $first_name = isset($entity->field_first_name['und'][0]['value']) ? $entity->field_first_name['und'][0]['value'] : '';
    $last_name = isset($entity->field_last_name['und'][0]['value']) ? $entity->field_last_name['und'][0]['value'] : '';
    //$full_name = "$first_name $last_name";
    $name[] = array(
    	'first_name' => $first_name,
    	'last_name' => $last_name,
    );
    return $name;
}

/**
* Fetch Data from Profile2 Module fields for the user
* http://drupalcontrib.org/api/drupal/contributions%21profile2%21contrib%21profile2_page.module/function/profile2_by_uid_load/7
*/
function _profile2_by_uid_load($uid, $type_name) {
  if ($uid && is_numeric($uid) && ($account = user_load($uid))) {
    $profile = profile2_load_by_user($account, $type_name);
    if (!$profile) {
      $profile = profile2_create(array('type' => $type_name));
      $profile->setUser($account);
      $profile->is_new = TRUE;
    }
    return $profile;
  }
  return FALSE;
}

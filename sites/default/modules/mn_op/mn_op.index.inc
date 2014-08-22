<?php

/**
 * Render a index of entries in the database.
 */
function mn_op_index() {
	global $user;
	global $base_root;

	//if user is an admin or an org admin send show them the the manage page for opportunities
	if (in_array('administrator', $user->roles) || in_array('Organizational Admin', $user->roles)) {

		$output = '';
		//look for a POST request
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (isset($_POST['status'])) {
				$input = array(
					'nid' => $_POST['node_id'],
					'status' => $_POST['status']
				);
				//run status update on nid
				_update_published_status($input);
			} elseif (isset($_POST['reopen'])) {
				mn_ap_reopen_all_aps($_POST['node_id'], $_POST['reopen']);
			}
		}
		//get row node data
		$rows = mn_op_node_data($user);

		//apply theme to node data
		$output = theme('mn_op_list', array('rows' => $rows)); //used without template

		return $output;
	} else {
		// they are not an admin or org admin send them to list of all opps
		return drupal_goto($base_root . '/community?content[opportunity]=1');
	}
}

/**
 * Populate rows data from opportunity node
 */
function mn_op_node_data($user) {

	$uid = $user->uid;

	$query =  new EntityFieldQuery();
	$query->entityCondition('entity_type', 'node')
			->entityCondition('bundle', 'opportunity')
			->propertyOrderBy('created', 'DESC');

	//if role is not admin show only user created opps
	if (! in_array('administrator', $user->roles)) {
		$query->propertyCondition('uid', $uid, '=');
	}

	$result = $query->execute();

	$out = '';
	if (!empty($result['node'])) {
		$out['nodes'] = node_view_multiple(node_load_multiple(array_keys($result['node'])));
	}

	if (!empty($out['nodes'])) {
		$rows = array();
		foreach ($out['nodes']['nodes'] as $row) {
			$rows[] = (array)$row['#node'];
		}

		$r = array();
		foreach ($rows as $row) {
			if(!empty($row)){
				$settings = mn_op_check_existing_settings($row['nid']);
				$startDate = mn_ap_get_date($row['op_dates']['und']['0']['value'], $row['op_dates']['und']['0']['timezone'], $row['op_dates']['und']['0']['timezone_db']);
				$endDate = mn_ap_get_date($row['op_dates']['und']['0']['value2'], $row['op_dates']['und']['0']['timezone'], $row['op_dates']['und']['0']['timezone_db']);
				$announceDate = mn_ap_get_date($row['field_announce_date']['und']['0']['value'], $row['field_announce_date']['und']['0']['timezone'], $row['field_announce_date']['und']['0']['timezone_db']);
				$owner = $row['uid'] == $uid ? 1 : 0;;
				$juror = mn_ap_check_juror($row['nid'], $user->mail);
				$submissions = mn_ap_get_submissions_count($row['nid'], $row['op_application_type']['und']['0']['value']);

				$r[] = array(
					//'row' => $row, //return entire row for use with dpt($rows)
					'nid' => isset($row['nid']) ? $row['nid'] : '',
					'status' => $row['status'],
					'reopen' => isset($settings['reopen']) ? $settings['reopen'] : '',
					'title' => isset($row['title']) ? $row['title'] : '',
					'start_date' => $startDate, //$row['op_dates']['und']['0']['value'],
					'end_date' => $endDate, //$row['op_dates']['und']['0']['value2'],
					'announce_date' => $announceDate,
					'submissions' => $submissions,
					'apply_on_site' => $row['op_application_type']['und']['0']['value'],
					'cover_image' => isset($row['op_cover_image']['und']['0']) ? $row['op_cover_image']['und']['0'] : '' ,
					'user' => $row['name'],
					'owner' => $owner,
					'juror' => $juror
				);
			}
		}
		return $r;
	}
}

function mn_ap_get_submissions_count($nid, $site) {
	$count = 0;
	if ($site) {
		$result = db_select('op_applications', 'op')
		  ->fields('op')
		  ->condition('nid', $nid, '=')
		  ->condition('complete', 1, '=')
		  ->execute()
		  ->fetchAll();
	  $count = count($result);
	}
  return $count;
}

/**
 * Used in POST request to opportunity listing to update published status
 */
function _update_published_status($input) {
	$return_value = NULL;
	try {
		$node = node_load($input['nid']);
		$node->status = $input['status'];
		node_save($node);

		if ($input['status'] == '1') {
			drupal_set_message(t($node->title . ' - Opportunity Published'), 'status');
		} else {
			drupal_set_message(t($node->title . ' - Opportunity Unpublished'), 'status');
		}
	}
	catch (Exception $e) {
		drupal_set_message(t('db_update failed. Message = %message, query= %query',
			array('%message' => $e->getMessage(), '%query' => $e->query_string)), 'error');
	}
	return $return_value;
}

/*
* convert datetime to correct site db set time
*/
function mn_ap_get_date($date, $timezone, $timezone_db) {
	if($date && $timezone && $timezone_db) {
		$timezone = new DateTimeZone($timezone);
		$timezone_db = new DateTimeZone($timezone_db);

		$resultDate = new DateTime($date, $timezone_db);
		$resultDate->setTimezone($timezone);
		$resultDate = (array) $resultDate;
		$resultDate = new DateTime($resultDate['date']);
		$resultDate = $resultDate->format("F j, Y, g:i a");
	} else {
		$resultDate = '';
	}
	return $resultDate;
}

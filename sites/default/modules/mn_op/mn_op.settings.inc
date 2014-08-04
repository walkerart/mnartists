<?php

function mn_op_settings($nid) {
	global $user;
	dpm($user);
	$uid = $user->uid;
	$node = node_load($nid);
	$owner = $node->uid == $uid ? 1 : 0;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (user_access('administrator') || $owner) {
			if(isset($_POST['remove']) && isset($_POST['juror_email'])) {
				//remove a juror by email address
				_remove_juror_from_opportunity($nid, $_POST['juror_email']);
			} elseif(isset($_POST['juror_email'])) {
				//run status update on nid
				_add_juror_to_opportunity($nid, $_POST['juror_email'], $node->title);
			} elseif(isset($_POST['settings'])) {
				//update general review settings
				_add_settings_to_opportunity($nid, $_POST);
			}
		}
	}

	if (user_access('administrator') || $owner) {
		$areas = get_form_areas($node->field_op_required, $node->field_op_optional);
		$output = '';
		$jurors = mn_op_get_jurors($nid);
		$settings = mn_op_check_existing_settings($nid);

		$rows = array(
			'opportunity' => $node,
			'areas' => $areas,
			'settings' => $settings,
			'jurors' => $jurors,
			'owner' => $owner
		);

		$output = '';
		return $output = theme('mn_op_settings', array('rows' => $rows));
	} else {
		return drupal_set_message(t('You are not authorized to view this page.'), 'warning');
	}
}

function _add_juror_to_opportunity($nid, $mail, $title) {
	$user = user_load_by_mail($mail);
	$juror = array(
			'nid' => $nid,
			'mail' => $mail
		);

	//check if Juror has already been added
	$existingJuror = _check_existing_juror($nid, $mail);
	if($existingJuror) {
		return drupal_set_message(t('You have already added ' . $mail . ' as a juror.'), 'warning');
	}

	if($user) {
		//user is already in the system set uid and name fields
		$juror['uid'] = $user->uid;
		$juror['name'] = $user->name;
		if(! $existingJuror) {
			db_insert('op_jurors')
			  ->fields($juror)
			  ->execute();
			//send mail to registered user
			_mail_to_juror($mail, 1, $nid, $title);
		}
	} else {
		//user is not in the system
		if(! $existingJuror) {
			db_insert('op_jurors')
			  ->fields($juror)
			  ->execute();
			//send mail to non registered user
			_mail_to_juror($mail, 0, $nid, $title);
		}
	}
}

function _check_existing_juror($nid, $mail) {
	$existing = 0;
	$result = db_select('op_jurors', 'op')
	  ->fields('op')
	  ->condition('nid', $nid, '=')
	  ->condition('mail', $mail, '=')
	  ->execute()
	  ->fetchAssoc();
	if ($result) $existing = 1;
	return $existing;
}

function _remove_juror_from_opportunity($nid, $mail) {
	db_delete('op_jurors')
	  ->condition('nid', $nid)
	  ->condition('mail', $mail)
	  ->execute();
}

function _add_settings_to_opportunity($nid, $fields) {
	$existing = mn_op_check_existing_settings($nid);
	unset($fields['settings']);

	if ($existing) {
		//update
		db_update('op_jury_settings')
			->condition('nid', $nid, '=')
			->fields($fields)
			->execute();
	} else {
		//create
		db_insert('op_jury_settings')
		  ->fields($fields)
		  ->execute();
	}
}

function _mail_to_juror($mail, $status, $nid, $title) {
	global $user;
	global $base_url;
	$to = $mail;
	$from = $user->mail;
	$subject = $title + "Jury";

	if ($status) {
		$body = 'You have been added as a juror for ' + $title + ' on the MNArtist website. Please visit: ' + $base_url + '/opportunity/' + $nid + '/submissions to begin the review process. Thank You.';
	} else {
		$body = 'You have been added as a juror for ' + $title + ' on the MNArtist website. Please register at: " +  $base_url + "/user After you have registered visit: ' + $base_url + '/opportunity/' + $nid + '/submissions to begin the review process. Thank You.';
	}
	$message = drupal_mail('mn_op', 'C3512995DB53EC882694983BA2273', $to, user_preferred_language($user), array('body' => $body, 'subject' => $subject, $from, TRUE));
}
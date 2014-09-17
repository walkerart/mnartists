<?php

function mn_op_settings($nid) {
	global $user;
	$uid = $user->uid;
	$node = node_load($nid);
	$owner = $node->uid == $uid ? 1 : 0;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (in_array('administrator', $user->roles) || $owner) {
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

	if (in_array('administrator', $user->roles) || $owner) {
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

	$module = 'mn_op';
  	
	$to = $mail;
	$from = $user->mail;
	$subject = $title + "Jury";

	if ($status) {
		$key = 'A3512995DB53EC882694983BA2273';
	} else {
		$key = 'B3512995DB53EC882694983BA2273';
	}

	$params = $nid;

	$language = language_default();
	$send = TRUE;

	$result = drupal_mail($module, $key, $to, $language, $params, $from, $send);
	if ($result['result'] == TRUE) {
		return drupal_set_message(t('Your invite has been sent.'), 'status');
	} else {
		return drupal_set_message(t('There was a problem sending your invitation and it was not sent.'), 'error');
  }
}

/**
* Implements hook_mail()
*/
function mn_op_mail($key, &$message, $params) {
	global $user;
	global $base_url;

	$options = array(
		'langcode' => $message['language']->language,
	);

	switch ($key) {
    // Send a simple message from the contact form.
    case 'A3512995DB53EC882694983BA2273':
		$message['subject'] = t('E-mail sent from @site-name', array('@site-name' => variable_get('site_name', 'Drupal')), $options);
		$message['body'][] = t("@name sent you the following message: You have been added as a juror on the MNArtist website. Please visit:  @$base_url/opportunity/@params/submissions to begin the review process. Thank You.", array('@name' => $user->name, '@base_url' => $base_url, '@params' => $params), $options);
		dpm($message);
		break;
	case 'B3512995DB53EC882694983BA2273':
		$message['subject'] = t('E-mail sent from @site-name', array('@site-name' => variable_get('site_name', 'Drupal')), $options);
		$message['body'][] = t("@name sent you the following message: You have been added as a juror on the MNArtist website. Please register at: @base_url/user After you have registered visit: @base_url/opportunity/@params/submissions to begin the review process. Thank You.", array('@name' => $user->name, '@base_url' => $base_url, '@params' => $params), $options);
		dpm($message);
		break;
  }
}


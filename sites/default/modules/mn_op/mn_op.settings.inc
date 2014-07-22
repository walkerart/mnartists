<?php

function mn_op_settings($nid) {
    global $user;
    $uid = $user->uid;
    $node = node_load($nid);
    $owner = $node->uid == $uid ? 1 : 0;

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (user_access('administrator') || $owner) {
            if(isset($_POST['remove']) && isset($_POST['juror_email'])) {
                _remove_juror_from_opportunity($nid, $_POST['juror_email']);
            } elseif(isset($_POST['juror_email'])) {
                //run status update on nid
                _add_juror_to_opportunity($nid, $_POST['juror_email']);
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

function _add_juror_to_opportunity($nid, $mail) {
    $user = user_load_by_mail($mail);
    $juror = array(
            'nid' => $nid,
            'mail' => $mail
        );
    $existingJuror = _check_existing_juror($nid, $mail);
    if($user) {
        $juror['uid'] = $user->uid;
        $juror['name'] = $user->name;
        if(! $existingJuror) {
            db_insert('op_jurors')
              ->fields($juror)
              ->execute();
        }
    } else {
        if(! $existingJuror) {
            db_insert('op_jurors')
              ->fields($juror)
              ->execute();
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
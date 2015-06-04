<?php

// adapted from _mnartist_register_get_user_data().
function _mnartists_artist_redirect_get_user_data($email) {
  $userData = array();
  $email = trim($email);

  $query = Database::getConnection('default', 'migration')
    ->select('t_user', 'u');
  $query->fields('u', array('id', 'firstname', 'lastname'));
  $query->condition('u.username', $email, '=');

  $result = $query->execute();

  $record = $result->fetchAssoc();

  $query = Database::getConnection('default', 'migration')
    ->select('t_resource', 'tr');
  $query->fields('tr', array('id'));
  $query->join('t_resourcetype', 'trt', 'tr.resourcetype = trt.id');
  $query->condition('tr.owner', $record['id'], '=');
  $query->condition('trt.name', 'Artist', '=');

  $result = $query->execute();
  $resource = $result->fetchAssoc();

  return $resource['id'];
}

// Get all users
$accounts = array();
$query = new EntityFieldQuery();

$query->entityCondition('entity_type', 'user')
  ->propertyCondition('uid', 15, '>=')
  // ->addTag('random')
  // ->range(0, 5)
  ->addMetaData('account', user_load(1)); // Run the query as user 1.

$result = $query->execute();

if (isset($result['user'])) {
  $user_uids = array_keys($result['user']);
  $accounts = entity_load('user', $user_uids);
}

$redirect_defaults = array(
  'status_code' => 301,
  'language' => LANGUAGE_NONE,
);

foreach ($accounts as $account) {
  if (isset($account->uid)) {
    $redirect_defaults['uid'] = $account->uid;
  }
  // var_export($account->uid);
  // var_export($account->mail);
  $old_id = _mnartists_artist_redirect_get_user_data($account->mail);
  // var_export($old_id);
  if ($old_id) {
    $redirect_destination = entity_uri('user', $account);

    $redirect = new stdClass();
    redirect_object_prepare($redirect, $redirect_defaults);
    $redirect->redirect = $redirect_destination['path'];
    $redirect->source = 'artistHome.do';
    $redirect->source_options['query'] = array('rid' => $old_id);

    // check not exist
    if (redirect_load_by_source($old_path) === FALSE) {
      drush_print($account->mail . "\t:\t" . $old_path . "\t=>\t" . $redirect_destination['path']);
      redirect_save($redirect);
    }
  }
}

<?php

/**
 * Root directory of Drupal installation.
 */
define('DRUPAL_ROOT', getcwd());

require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
menu_execute_active_handler();



$table = 'op_artworks';
$results = db_select($table, 'a')
    ->fields('a')
    ->execute()
    ->fetchAll();

foreach ($results as $result) {
   // If vid and fid are not 0, 
  if($result->vid != 0 || $result->fid !=0) { //add and condition here for medium3 and roles to not re update
  // entity load artwork, grab medium and role field
  $node = node_load($result->vid);
  $wrapper = entity_metadata_wrapper('node', $node);
  $mediums =  $wrapper->field_medium3->value();
  $roles = $wrapper->field_roles->value();
  
  $med_count = count($mediums) - 1;
  $role_count = count($roles) - 1;
  $med_value = '';
  $role_value = '';

  //check if there are values, data in field
  if($mediums) {
    //get and format medium values
    foreach ($mediums as $key => $value) {
      if ($med_count === 0  || $key === $med_count) {
        $med_value .= "\"$value->name\"";
      } 
      else {
        $med_value .="\"$value->name\",";
      }

    }
    $final_med_value = '['.$med_value.']';
  }
  else {
    $final_med_value = '""';
  }
  
  //check if roles exists, data in field
  if($roles) {
    //get and format role values
    foreach ($roles as $key => $value) {
      if ($role_count === 0  || $key === $role_count) {
        $role_value .= "\"$value->name\"";
      } 
      else {
        $role_value .="\"$value->name\",";
      }

    }
    $final_role_value = '['.$role_value.']';
  }
  else {
    $final_role_value = '""';
  }
  
    // sql statement to update these two rows with, vid, fid equal to what is above
  
  dpm($result->vid .' : '.$final_med_value .' : '. $final_role_value);
  
  //insert new values into the table
  db_update($table)
      ->fields(array(
        'medium3' => $final_med_value,
        'roles' => $final_role_value,
      ))
      ->condition('fid', $result->fid, '=')
      ->condition('vid', $result->vid, '=') 
      ->execute();

  }


}


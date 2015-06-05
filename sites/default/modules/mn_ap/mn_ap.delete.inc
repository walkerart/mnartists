<?php

/**
 * 
 * @param type $nid
 * @param type $uid
 */
function mn_ap_delete($nid, $uid) {
  //path to take user back to original opportunity
  $path = check_plain($_GET['destination']); 

  if(isset($nid) && isset($uid)){ //check for integers
  $op_applications = db_delete('op_applications')
      ->condition('nid',$nid)
      ->condition('uid', $uid)
      ->execute();
  
  watchdog('mn_ap_delete', "The application for the opportunity: %nid for user %uid has been deleted", array('%nid' => $nid, '%uid' => $uid), WATCHDOG_INFO);
  
  }
   
  //if the application is successfully deleted, delete artworks in op_artworks table
  if($op_applications) { 
    $op_artworks = db_delete('op_artworks')
      ->condition('nid',$nid)
      ->condition('uid', $uid)
      ->execute();
  }
  watchdog('mn_ap_delete', "Artworks deleted from opportunity: %nid for user %uid", array('%nid' => $nid, '%uid' => $uid), WATCHDOG_INFO);
 
  //redirect back to original path
  drupal_goto ($path, array(), $http_response_code = 302);
} 

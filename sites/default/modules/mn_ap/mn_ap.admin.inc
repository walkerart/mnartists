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
      mn_ap_update_ap_status($nid, $uid, $_POST['status']);
    }

    $reviews = mn_ap_get_review($nid, $uid);

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

    $output = '';
    if(user_access('administrator') || $owner ) {
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

function mn_ap_get_review($nid, $uid) {
  $query = db_select('op_applications', 'ap');
  $query->join('op_rating', 'r', 'ap.uid = r.aid');
  $query->condition('ap.nid', $nid, '=')
        ->condition('ap.uid', $uid, '=')
        ->condition('r.nid', $nid, '=')
        ->fields('ap',array('uid'))
        ->fields('r',array('uid', 'aid', 'rating', 'comment'))
        ->orderBy('ap.uid', 'desc');
  $results = $query->execute()->fetchAll();

  //$submissions = mn_ap_get_submissions($nid);
  //dpm($submissions);
  $submission = mn_ap_application_data($nid, $uid);
  //dpm($application);
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
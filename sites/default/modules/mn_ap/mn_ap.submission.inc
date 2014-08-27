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

    if($juror) {
        mn_op_check_juror_registration($nid, $user->mail);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['status'])) {
            mn_ap_update_ap_status($nid, $uid, $_POST['status']);
        } elseif (isset($_POST['reopen'])) {
            mn_ap_reopen_ap($nid, $_POST['uid'], $_POST['reopen']);
        }
    }

    if(in_array('administrator', $user->roles) || $owner || $juror) {
        $output = '';

        $settings = mn_op_check_existing_settings($nid);
        $round = isset($settings['round']) ? $settings['round'] : 1;
        $areas = get_form_areas($node->field_op_required, $node->field_op_optional);

        $rows = array(
            'opportunity' => $node,
            'juror' => $juror,
            'owner' => $owner,
            'areas' => $areas,
            'settings' => $settings,
        );

        if($juror) {
            $juror_reviews = get_juror_reviews($nid, $uid, $round);
            $rows['juror_reviews'] = $juror_reviews;
        }

        if(in_array('administrator', $user->roles) || $owner ) {
            $reviews = mn_ap_get_all_reviews($nid, $round);
            $rows['reviews'] = $reviews;
        }

        if (in_array('administrator', $user->roles) || $owner) {
            $jurors = mn_op_get_jurors($nid);
            $rows['jurorCount'] = count($jurors);
        }
        $output = theme('mn_ap_submissions', array('rows' => $rows));
        return $output;
    } else {
        return drupal_set_message(t('You do not have access.'), 'status');
    }
}
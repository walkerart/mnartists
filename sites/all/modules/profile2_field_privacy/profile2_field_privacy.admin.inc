<?php

/**
* @file
* Admin pages of Profile2 field privacy module.
*/

/**
 * Page callback for config.
 */
function profile2_field_privacy_admin_overview() {
  // Display all profile types and allow selection
  $info = entity_get_all_property_info('profile2');
  
  krumo($info);
  $form['soc'] = array(
    '#type' => 'fieldset',
    '#title' => t('Social sites and employers'),
    '#description' => t('Control what happens if employer is registered on the site. You can set wheter to post to social and text template that is posted.'),
    '#collapsible' => TRUE,
    '#collapsed' => FALSE,
  );
  
  $form['contact_information'] = array(
    '#value' => t('You can leave us a message using the contact form below.'),
  );
  $form['node_options'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Default'),
    '#default_value' => $node->featured,
    '#options' => array('0', '1'),
    '#description' => t('Featured products will appear on front page and any other highlight product area.'),
  );
  
  return system_settings_form($form);
}
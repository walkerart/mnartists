<?php

/**
 * @file
 * Theme functions.
 */

/**
 * Process variables for prefinery-user-login.tpl.php
 *
 * @param $variables
 *   An array of variables from the theme system.
 */
function template_preprocess_prefinery_user_login_form(&$variables) {
  $variables['header_title'] = t('Beta Invite');

  $url = variable_get('prefinery_url', '');
  $variables['title'] = t('Do you have an invite? Enter code or <a href="@url" target="_blank">request an invite</a>.', array('@url' => $url));

  $variables['messages'] = theme('status_messages');
}

/**
 * Process variables for prefinery-page.tpl.php
 *
 * @param $variables
 *   An array of variables from the theme system.
 */
function template_preprocess_prefinery_page(&$variables) {
  // Add relevant default variables, taken from template_preprocess_page()
  $variables['messages']   = isset($variables['show_messages']) ? theme('status_messages') : '';
  $variables['base_path']  = base_path();
  $variables['logo']       = theme_get_setting('logo');
  $variables['front_page'] = url();

  // Check if logo exists before output it in a template file
  // First get relative path from logo theme setting
  $logo_parts = parse_url($variables['logo']);
  $logo_path = $logo_parts['path'];
  if (strpos($logo_path, $variables['base_path']) === 0) {
    $logo_path = substr($logo_path, strlen($variables['base_path']));
  }
  // If file does not exist clear it
  if (!file_exists($logo_path)) {
    $variables['logo'] = NULL;
  }

  // Clear out existing CSS
  $css = &drupal_static('drupal_add_css', array());
  $css = array();

  // Add our css file back, so it will be the only one
  drupal_add_css(drupal_get_path('module', 'prefinery') . '/theme/prefinery.css');

  // By default a lot unnecessary JS is load,
  // By default we should not need any JS.
  $js = &drupal_static('drupal_add_js', array());
  $js = array();

  // Required by Core template_process_html()
  $variables['page']['#children'] = NULL;

  // Call Drupal core default html page preprocess function
  template_preprocess_html($variables);
}

/**
 * Process variables for prefinery-page.tpl.php
 *
 * @param $variables
 *   An array of variables from the theme system.
 */
function template_process_prefinery_page(&$variables) {
  // Process all the variables set by template_preprocess_html()
  template_process_html($variables);
}

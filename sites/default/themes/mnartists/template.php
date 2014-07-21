<?php
/**
* hook theme for custom form template
* http://www.wdtutorials.com/2013/01/22/drupal-7-how-override-forms-using-custom-template#.U01LXeZdWDo
*/
function mnartists_theme() {
  return array(
    'opportunity_node_form' => array(
      'arguments' => array('form' => NULL),
      'template' => 'templates/opportunity-node-form',
      'render element' => 'form'
    ),
    'user_login' => array(
      'template' => 'templates/user_login',
      'render element' => 'form',
    ),
    'user_register_form' => array(
      'template' => 'templates/user_register',
      'render element' => 'form',
    ),
    'user_pass' => array(
      'template' => 'templates/user_pass',
      'render element' => 'form',
    ),
  );
}

function mnartists_preprocess_user_login(&$variables) {
  $variables['intro_text'] = t('Have you registered with the new mnartists.org? If so, log-in here with your new username and password.<br>If not, register first, then you can create a new profile or import your old account.');
  $variables['rendered'] = drupal_render_children($variables['form']);
}

function mnartists_preprocess_user_register_form(&$variables) {
  $variables['intro_text'] = t('Welcome to the all-new mnartists.org!  Whether you have an account on the old site or you&rsquo;d like to start fresh, you&rsquo;ll need to register with us by providing the information below.');
  $variables['rendered'] = drupal_render_children($variables['form']);
}

function mnartists_preprocess_user_pass(&$variables) {
  $variables['intro_text'] = t('Forgot your password?<br>If you&rsquo;ve created an account on the new mnartists.org, fill out your username or email and click the "E-Mail New Password" button.<br> If you haven&rsquo;t created an account on the new mnartists.org, retrieve your old password by emailing <a href="mailto:info@mnartists.org">info@mnartists.org</a>.');
  $variables['rendered'] = drupal_render_children($variables['form']);
}

/**
 * @file
 * Process theme data.
 *
 * Use this file to run your theme specific implimentations of theme functions,
 * such preprocess, process, alters, and theme function overrides.
 *
 * Preprocess and process functions are used to modify or create variables for
 * templates and theme functions. They are a common theming tool in Drupal, often
 * used as an alternative to directly editing or adding code to templates. Its
 * worth spending some time to learn more about these functions - they are a
 * powerful way to easily modify the output of any template variable.
 *
 * Preprocess and Process Functions SEE: http://drupal.org/node/254940#variables-processor
 * 1. Rename each function and instance of "mnartists" to match
 *    your subthemes name, e.g. if your theme name is "footheme" then the function
 *    name will be "footheme_preprocess_hook". Tip - you can search/replace
 *    on "mnartists".
 * 2. Uncomment the required function to use.
 */


/**
 * Preprocess variables for the html template.
 */
function mnartists_preprocess_html(&$vars) {
  global $theme_key, $user;

  // Two examples of adding custom classes to the body.

  // Add a body class for the active theme name.
  // $vars['classes_array'][] = drupal_html_class($theme_key);

  // Browser/platform sniff - adds body classes such as ipad, webkit, chrome etc.
  $vars['classes_array'][] = css_browser_selector();

  if ((!user_is_logged_in() && arg(0) == "user" && (is_null(arg(1)) || in_array(arg(1), array('password', 'register')))) ||
          (in_array(arg(0), array('opportunities'))) ||
          (arg(0) == "user" && in_array(arg(2), array("edit", "mailchimp"))) ||
          (arg(0) == "node" && in_array(arg(1), array("edit", "add"))) ||
          (arg(0) == "node" && in_array(arg(2), array("edit"))) ||
          (arg(0) == 'user' && in_array(arg(1), array("saved-filters", "feed", "welcome")) ||
          (user_is_logged_in() && (arg(0) == "user" && in_array(arg(2), array("flags")) && flag_lists_is_owner('edit', arg(4)))) ||
          (user_is_logged_in() && (arg(0) == "user" && in_array(arg(2), array("flags")) && !is_numeric(arg(3)))) ||
          (user_is_logged_in() && (arg(0) == "flags" && flag_lists_is_owner('edit', arg(2)))))
      ) {
    $vars['classes_array'][] = drupal_html_class("my-stuff");
  }
}


/**
 * Process variables for the html template.
 */
/* -- Delete this line if you want to use this function
function mnartists_process_html(&$vars) {
}
// */


/**
 * Override or insert variables for the page templates.
 */
function mnartists_preprocess_page(&$vars) {
    drupal_add_library('system', 'ui.datepicker');
}
function mnartists_process_page(&$vars) {
}


/**
 * Override or insert variables into the node templates.
 */
/* -- Delete this line if you want to use these functions
function mnartists_preprocess_node(&$vars) {
}
function mnartists_process_node(&$vars) {
}
// */


/**
 * Override or insert variables into the comment templates.
 */
/* -- Delete this line if you want to use these functions
function mnartists_preprocess_comment(&$vars) {
}
function mnartists_process_comment(&$vars) {
}
// */


/**
 * Override or insert variables into the block templates.
 */
/* -- Delete this line if you want to use these functions
function mnartists_preprocess_block(&$vars) {
}
function mnartists_process_block(&$vars) {
}
// */

function mnartists_preprocess_flag(&$vars) {
    $content_id = $vars['content_id'];
    $vars['link_count'] = flag_get_counts('node', $content_id);
}

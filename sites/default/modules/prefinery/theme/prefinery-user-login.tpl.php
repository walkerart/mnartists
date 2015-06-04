<?php

/**
 * @file
 * Template for Prefinery log-in form.
 *
 * @see template_preprocess_prefinery_user_login()
 */
?>
<h1><?php print $header_title; ?></h1>
<?php print $messages ?>
<p><?php print $title ?></p>
<?php print drupal_render($form['mail']); ?>
<?php print drupal_render($form['code']); ?>
<?php print drupal_render($form['submit']); ?>
<?php print drupal_render_children($form); ?>
<span></span>

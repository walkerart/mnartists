<?php
/**
 * @file
 * mnartists_views.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function mnartists_views_user_default_permissions() {
  $permissions = array();

  // Exported permission: access draggableviews.
  $permissions['access draggableviews'] = array(
    'name' => 'access draggableviews',
    'roles' => array(
      'Artist' => 'Artist',
      'administrator' => 'administrator',
    ),
    'module' => 'draggableviews',
  );

  return $permissions;
}

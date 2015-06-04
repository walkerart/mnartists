<?php
/**
 * @file
 * mnartists_user.features.user_role.inc
 */

/**
 * Implements hook_user_default_roles().
 */
function mnartists_user_user_default_roles() {
  $roles = array();

  // Exported role: Artist.
  $roles['Artist'] = array(
    'name' => 'Artist',
    'weight' => 3,
  );

  // Exported role: Organization.
  $roles['Organization'] = array(
    'name' => 'Organization',
    'weight' => 4,
  );

  // Exported role: Organizational Admin.
  $roles['Organizational Admin'] = array(
    'name' => 'Organizational Admin',
    'weight' => 5,
  );

  // Exported role: Public.
  $roles['Public'] = array(
    'name' => 'Public',
    'weight' => 6,
  );

  // Exported role: administrator.
  $roles['administrator'] = array(
    'name' => 'administrator',
    'weight' => 2,
  );

  return $roles;
}

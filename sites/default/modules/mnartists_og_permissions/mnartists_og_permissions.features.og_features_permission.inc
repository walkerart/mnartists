<?php
/**
 * @file
 * mnartists_og_permissions.features.og_features_permission.inc
 */

/**
 * Implements hook_og_features_default_permissions().
 */
function mnartists_og_permissions_og_features_default_permissions() {
  $permissions = array();

  // Exported og permission: 'node:community:add user'
  $permissions['node:community:add user'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
    ),
  );

  // Exported og permission: 'node:community:administer group'
  $permissions['node:community:administer group'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
    ),
  );

  // Exported og permission: 'node:community:approve and deny subscription'
  $permissions['node:community:approve and deny subscription'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
    ),
  );

  // Exported og permission: 'node:community:create article content'
  $permissions['node:community:create article content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:create artwork content'
  $permissions['node:community:create artwork content'] = array(
    'roles' => array(
      'member' => 'member',
    ),
  );

  // Exported og permission: 'node:community:create blog content'
  $permissions['node:community:create blog content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:create event content'
  $permissions['node:community:create event content'] = array(
    'roles' => array(
      'member' => 'member',
    ),
  );

  // Exported og permission: 'node:community:create from_the_network_item content'
  $permissions['node:community:create from_the_network_item content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:create opportunity content'
  $permissions['node:community:create opportunity content'] = array(
    'roles' => array(
      'member' => 'member',
    ),
  );

  // Exported og permission: 'node:community:delete any article content'
  $permissions['node:community:delete any article content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:delete any artwork content'
  $permissions['node:community:delete any artwork content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:delete any blog content'
  $permissions['node:community:delete any blog content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:delete any event content'
  $permissions['node:community:delete any event content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:delete any from_the_network_item content'
  $permissions['node:community:delete any from_the_network_item content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:delete any opportunity content'
  $permissions['node:community:delete any opportunity content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:delete own article content'
  $permissions['node:community:delete own article content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:delete own artwork content'
  $permissions['node:community:delete own artwork content'] = array(
    'roles' => array(
      'member' => 'member',
    ),
  );

  // Exported og permission: 'node:community:delete own blog content'
  $permissions['node:community:delete own blog content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:delete own event content'
  $permissions['node:community:delete own event content'] = array(
    'roles' => array(
      'member' => 'member',
    ),
  );

  // Exported og permission: 'node:community:delete own from_the_network_item content'
  $permissions['node:community:delete own from_the_network_item content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:delete own opportunity content'
  $permissions['node:community:delete own opportunity content'] = array(
    'roles' => array(
      'member' => 'member',
    ),
  );

  // Exported og permission: 'node:community:manage members'
  $permissions['node:community:manage members'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
    ),
  );

  // Exported og permission: 'node:community:manage permissions'
  $permissions['node:community:manage permissions'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
    ),
  );

  // Exported og permission: 'node:community:manage roles'
  $permissions['node:community:manage roles'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
    ),
  );

  // Exported og permission: 'node:community:subscribe'
  $permissions['node:community:subscribe'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:subscribe without approval'
  $permissions['node:community:subscribe without approval'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:unsubscribe'
  $permissions['node:community:unsubscribe'] = array(
    'roles' => array(
      'member' => 'member',
    ),
  );

  // Exported og permission: 'node:community:update any article content'
  $permissions['node:community:update any article content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:update any artwork content'
  $permissions['node:community:update any artwork content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:update any blog content'
  $permissions['node:community:update any blog content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:update any event content'
  $permissions['node:community:update any event content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:update any from_the_network_item content'
  $permissions['node:community:update any from_the_network_item content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:update any opportunity content'
  $permissions['node:community:update any opportunity content'] = array(
    'roles' => array(),
  );

  // Exported og permission: 'node:community:update group'
  $permissions['node:community:update group'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
    ),
  );

  // Exported og permission: 'node:community:update own article content'
  $permissions['node:community:update own article content'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
      'member' => 'member',
      'non-member' => 'non-member',
    ),
  );

  // Exported og permission: 'node:community:update own artwork content'
  $permissions['node:community:update own artwork content'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
      'member' => 'member',
      'non-member' => 'non-member',
    ),
  );

  // Exported og permission: 'node:community:update own blog content'
  $permissions['node:community:update own blog content'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
      'member' => 'member',
      'non-member' => 'non-member',
    ),
  );

  // Exported og permission: 'node:community:update own event content'
  $permissions['node:community:update own event content'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
      'member' => 'member',
      'non-member' => 'non-member',
    ),
  );

  // Exported og permission: 'node:community:update own from_the_network_item content'
  $permissions['node:community:update own from_the_network_item content'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
      'member' => 'member',
      'non-member' => 'non-member',
    ),
  );

  // Exported og permission: 'node:community:update own opportunity content'
  $permissions['node:community:update own opportunity content'] = array(
    'roles' => array(
      'administrator member' => 'administrator member',
      'member' => 'member',
      'non-member' => 'non-member',
    ),
  );

  return $permissions;
}

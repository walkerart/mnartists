<?php

/**
 * @file
 * MNArtists content migration
 */

/*
 * You must implement hook_migrate_api(), setting the API level to 2, if you are
 * implementing any migration classes. As of Migrate 2.5, you should also
 * register your migration and handler classes explicitly here - the former
 * method of letting them get automatically registered on a cache clear will
 * break in certain environments (see http://drupal.org/node/1778952).
 */
function migrate_mnartist_migrate_api() {
  $api = array(
    'api' => 2,
    'migrations' => array(
      'MNArticle' => array('class_name' => 'MNArticleMigration'),
      'MNOpportunity' => array('class_name' => 'MNOpportunityMigration'),
    ),
  );
  return $api;
}

<?php
/**
 * @file
 * mnartist_profiles.features.inc
 */

/**
 * Implements hook_default_profile2_type().
 */
function mnartist_profiles_default_profile2_type() {
  $items = array();
  $items['main'] = entity_import('profile2_type', '{
    "userCategory" : true,
    "userView" : true,
    "type" : "main",
    "label" : "Main profile",
    "weight" : "0",
    "data" : { "registration" : true, "use_page" : true },
    "rdf_mapping" : []
  }');
  $items['organization'] = entity_import('profile2_type', '{
    "userCategory" : true,
    "userView" : true,
    "type" : "organization",
    "label" : "Organization",
    "weight" : "0",
    "data" : { "registration" : 0 },
    "rdf_mapping" : []
  }');
  $items['resume'] = entity_import('profile2_type', '{
    "userCategory" : true,
    "userView" : true,
    "type" : "resume",
    "label" : "Resume",
    "weight" : "0",
    "data" : { "registration" : 0 },
    "rdf_mapping" : []
  }');
  return $items;
}

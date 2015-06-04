<?php
/**
 * @file
 * mnartist_profiles.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function mnartist_profiles_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "field_group" && $api == "field_group") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function mnartist_profiles_views_api() {
  return array("api" => "3.0");
}

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
    "data" : { "registration" : 0 },
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
    "label" : "R\\u00e9sum\\u00e9",
    "weight" : "0",
    "data" : { "registration" : 0 },
    "rdf_mapping" : []
  }');
  return $items;
}

<?php
/**
 * @file
 * mnartists_content_types.features.field_base.inc
 */

/**
 * Implements hook_field_default_field_bases().
 */
function mnartists_content_types_field_default_field_bases() {
  $field_bases = array();

  // Exported field_base: 'field_subheader'
  $field_bases['field_subheader'] = array(
    'active' => 1,
    'cardinality' => 1,
    'deleted' => 0,
    'entity_types' => array(),
    'field_name' => 'field_subheader',
    'field_permissions' => array(
      'type' => 0,
    ),
    'foreign keys' => array(
      'format' => array(
        'columns' => array(
          'format' => 'format',
        ),
        'table' => 'filter_format',
      ),
    ),
    'indexes' => array(
      'format' => array(
        0 => 'format',
      ),
    ),
    'locked' => 0,
    'module' => 'text',
    'settings' => array(
      'max_length' => 510,
      'profile2_private' => FALSE,
    ),
    'translatable' => 0,
    'type' => 'text',
  );

  return $field_bases;
}

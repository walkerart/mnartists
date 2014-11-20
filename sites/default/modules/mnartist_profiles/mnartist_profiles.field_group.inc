<?php
/**
 * @file
 * mnartist_profiles.field_group.inc
 */

/**
 * Implements hook_field_group_info().
 */
function mnartist_profiles_field_group_info() {
  $export = array();

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_awards|profile2|resume|form';
  $field_group->group_name = 'group_awards';
  $field_group->entity_type = 'profile2';
  $field_group->bundle = 'resume';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Awards',
    'weight' => '5',
    'children' => array(
      0 => 'field_awards',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Awards',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-awards field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $export['group_awards|profile2|resume|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_biography|profile2|resume|form';
  $field_group->group_name = 'group_biography';
  $field_group->entity_type = 'profile2';
  $field_group->bundle = 'resume';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Biography',
    'weight' => '1',
    'children' => array(
      0 => 'field_biography',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Biography',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => '',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $export['group_biography|profile2|resume|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_collections|profile2|resume|form';
  $field_group->group_name = 'group_collections';
  $field_group->entity_type = 'profile2';
  $field_group->bundle = 'resume';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Collections',
    'weight' => '9',
    'children' => array(
      0 => 'field_collections',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Collections',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-collections field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $export['group_collections|profile2|resume|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_education|profile2|resume|form';
  $field_group->group_name = 'group_education';
  $field_group->entity_type = 'profile2';
  $field_group->bundle = 'resume';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Education',
    'weight' => '2',
    'children' => array(
      0 => 'field_education',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Education',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-education field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $export['group_education|profile2|resume|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_exb_and_perfs|profile2|resume|form';
  $field_group->group_name = 'group_exb_and_perfs';
  $field_group->entity_type = 'profile2';
  $field_group->bundle = 'resume';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Exhibitions and Performances',
    'weight' => '6',
    'children' => array(
      0 => 'field_exhibition_and_performance',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Exhibitions and Performances',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-exb-and-perfs field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $export['group_exb_and_perfs|profile2|resume|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_galleries|profile2|resume|form';
  $field_group->group_name = 'group_galleries';
  $field_group->entity_type = 'profile2';
  $field_group->bundle = 'resume';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Galleries/Representation',
    'weight' => '8',
    'children' => array(
      0 => 'field_galleries',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Galleries/Representation',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-galleries field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $export['group_galleries|profile2|resume|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_memberships|profile2|resume|form';
  $field_group->group_name = 'group_memberships';
  $field_group->entity_type = 'profile2';
  $field_group->bundle = 'resume';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Memberships and Associations',
    'weight' => '10',
    'children' => array(
      0 => 'field_related_organizations',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Memberships and Associations',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-memberships field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $export['group_memberships|profile2|resume|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_publications|profile2|resume|form';
  $field_group->group_name = 'group_publications';
  $field_group->entity_type = 'profile2';
  $field_group->bundle = 'resume';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Publications/Press/Bibliography',
    'weight' => '7',
    'children' => array(
      0 => 'field_publications',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Publications/Press/Bibliography',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-publications field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $export['group_publications|profile2|resume|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_teaching_experience|profile2|resume|form';
  $field_group->group_name = 'group_teaching_experience';
  $field_group->entity_type = 'profile2';
  $field_group->bundle = 'resume';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Teaching Experience',
    'weight' => '4',
    'children' => array(
      0 => 'field_teaching_experience',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Teaching Experience',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-teaching-experience field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $export['group_teaching_experience|profile2|resume|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_websites|profile2|resume|form';
  $field_group->group_name = 'group_websites';
  $field_group->entity_type = 'profile2';
  $field_group->bundle = 'resume';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Websites and Accounts',
    'weight' => '11',
    'children' => array(
      0 => 'field_websites',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Websites and Accounts',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-websites field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $export['group_websites|profile2|resume|form'] = $field_group;

  $field_group = new stdClass();
  $field_group->disabled = FALSE; /* Edit this to true to make a default field_group disabled initially */
  $field_group->api_version = 1;
  $field_group->identifier = 'group_work_experience|profile2|resume|form';
  $field_group->group_name = 'group_work_experience';
  $field_group->entity_type = 'profile2';
  $field_group->bundle = 'resume';
  $field_group->mode = 'form';
  $field_group->parent_name = '';
  $field_group->data = array(
    'label' => 'Work Experience',
    'weight' => '3',
    'children' => array(
      0 => 'field_work_experience',
    ),
    'format_type' => 'fieldset',
    'format_settings' => array(
      'label' => 'Work Experience',
      'instance_settings' => array(
        'required_fields' => 1,
        'classes' => 'group-work-experience field-group-fieldset',
        'description' => '',
      ),
      'formatter' => 'collapsed',
    ),
  );
  $export['group_work_experience|profile2|resume|form'] = $field_group;

  return $export;
}

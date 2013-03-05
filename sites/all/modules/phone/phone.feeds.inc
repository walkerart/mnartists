<?php
/**
 * @file
 * Implements Feeds support for Phone fields.
 */

/**
 * Implements hook_feeds_processor_targets_alter().
 *
 * @see FeedsNodeProcessor::getMappingTargets()
 */
function phone_feeds_processor_targets_alter(&$targets, $entity_type, $bundle_name) {
  foreach (field_info_instances($entity_type, $bundle_name) as $name => $instance) {
    $info = field_info_field($name);
    if ($info['type'] == 'phone') {
      if (array_key_exists('countrycode', $info['columns'])) {
        $targets[$name . ':countrycode'] = array(
          'name' => t('@name: Country Code', array('@name' => $instance['label'])),
          'callback' => 'phone_feeds_set_target',
          'description' => t('The @label fields country code off the entity.', array('@label' => $instance['label'])),
          'real_target' => $name,
        );
      }
      if (array_key_exists('number', $info['columns'])) {
        $targets[$name . ':number'] = array(
          'name' => t('@name: Number', array('@name' => $instance['label'])),
          'callback' => 'phone_feeds_set_target',
          'description' => t('The @label fields number off the entity.', array('@label' => $instance['label'])),
          'real_target' => $name,
        );
      }
      if (array_key_exists('comment', $info['columns'])) {
        $targets[$name . ':comment'] = array(
          'name' => t('@name: Comment', array('@name' => $instance['label'])),
          'callback' => 'phone_feeds_set_target',
          'description' => t('The @label fields comment off the entity.', array('@label' => $instance['label'])),
          'real_target' => $name,
        );
      }
      if (array_key_exists('extension', $info['columns'])) {
        $targets[$name . ':extension'] = array(
          'name' => t('@name: Extension', array('@name' => $instance['label'])),
          'callback' => 'phone_feeds_set_target',
          'description' => t('The @label fields extension off the entity.', array('@label' => $instance['label'])),
          'real_target' => $name,
        );
      }
    }
  }
}

/**
 * Callback for mapping. Here is where the actual mapping happens.
 *
 * When the callback is invoked, $target contains the name of the field the
 * user has decided to map to and $value contains the value of the feed item
 * element the user has picked as a source.
 */
function phone_feeds_set_target($source, $entity, $target, $value) {
  if (empty($value)) {
    return;
  }

  // Handle non-multiple value fields.
  if (!is_array($value)) {
    $value = array($value);
  }

  // Iterate over all values.
  list($field_name, $column) = explode(':', $target);
  $info = field_info_field($field_name);

  $field = isset($entity->$field_name) ? $entity->$field_name : array();
  $delta = 0;

  foreach ($value as $v) {
    if ($info['cardinality'] == $delta) {
      break;
    }

    if (is_object($v) && ($v instanceof FeedsElement)) {
      $v = $v->getValue();
    }

    if (is_scalar($v)) {
      $field[LANGUAGE_NONE][$delta][$column] = $v;
      $delta++;
    }
  }

  $entity->$field_name = $field;
}

<?php
/**
 * @file
 * mnartists_content_types.features.inc
 */

/**
 * Implements hook_node_info().
 */
function mnartists_content_types_node_info() {
  $items = array(
    'from_the_network_item' => array(
      'name' => t('Links We Like'),
      'base' => 'node_content',
      'description' => t('Use <em>from the network items</em> to point at items on external sites. These items are displayed in the "From The Network" block on the home page.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}

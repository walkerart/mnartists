<?php
/**
 * @file
 * artist_community.features.inc
 */

/**
 * Implements hook_node_info().
 */
function artist_community_node_info() {
  $items = array(
    'article' => array(
      'name' => t('Article'),
      'base' => 'node_content',
      'description' => t('Use <em>articles</em> for time-sensitive content like news, press releases or blog posts.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'artwork' => array(
      'name' => t('Artwork'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'blog' => array(
      'name' => t('Blog'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'community' => array(
      'name' => t('Community'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  return $items;
}

/**
 * Implements hook_default_og_membership_type().
 */
function artist_community_default_og_membership_type() {
  $items = array();
  $items['community'] = entity_import('og_membership_type', '{
    "name" : "community",
    "description" : "Community",
    "language" : "",
    "rdf_mapping" : []
  }');
  return $items;
}

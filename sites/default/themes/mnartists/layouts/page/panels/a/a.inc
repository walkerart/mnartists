<?php

/**
 * @file
 * Implementation of hook_panels_layouts
 */
function adaptivetheme_one_panels_layouts() {
  $items['a'] = array(
    'title'    => t('A'),
    'category' => t('MN Artists - Landing'),
    'icon'     => 'one.png',
    'theme'    => 'one',
    'admin css' => 'one.admin.css',
    'theme arguments' => array('id', 'content'),
    'regions' => array(
      'one_main'  => t('Main'),
    ),
    // AT Core
    'type' => 'one',
  );
  return $items;
}

/**
 * Preprocess variables for one.tpl.php
 */
function template_preprocess_one(&$vars) {
  $vars['panel_prefix'] = '';
  $vars['panel_suffix'] = '';
}

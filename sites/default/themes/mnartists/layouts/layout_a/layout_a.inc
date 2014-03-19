<?php

// Plugin definition
$plugin = array(
  'title' => t('Layout A'),
  'category' => t('MN Artists Layouts'),
  'icon' => 'layout_a.png',
  'theme' => 'layout_a',
  'css' => 'layout_a.css',
  'regions' => array(
    'top_left' => t('Top left'),
    'top_right' => t('Top right'),
    'community_full' => t('Community full'),
    'left' => t('Left side'),
    'right' => t('Right side'),
    'inset_left' => t('Inset Left side'),
    'inset_right' => t('Inset Right side')
  ),
);

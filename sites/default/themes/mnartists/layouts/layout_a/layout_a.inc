<?php

// Plugin definition
$plugin = array(
  'title' => t('Layout A'),
  'category' => t('MN Artists Layouts'),
  'icon' => 'layout_a.png',
  'theme' => 'layout_a',
  'css' => 'layout_a.css',
  'regions' => array(
    'left' => t('Left side'),
    'right' => t('Right side')
    'inset-left' => t('Inset Left side'),
    'inset-right' => t('Inset Right side')
  ),
);

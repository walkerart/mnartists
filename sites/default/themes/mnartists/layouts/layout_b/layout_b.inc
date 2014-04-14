<?php

// Plugin definition
$plugin = array(
  'title' => t('Layout B'),
  'category' => t('MN Artists Layouts'),
  'icon' => 'layout_b.png',
  'theme' => 'layout_b',
  'css' => 'layout_b.css',
  'regions' => array(
    'tip_top' => t('Tippy top'),
    'left' => t('Left side'),
    'right' => t('Right side')
  ),
);

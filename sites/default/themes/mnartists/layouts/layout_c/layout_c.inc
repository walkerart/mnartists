<?php

// Plugin definition
$plugin = array(
  'title' => t('Layout C'),
  'category' => t('MN Artists Layouts'),
  'icon' => 'layout_c.png',
  'theme' => 'layout_c',
  'css' => 'layout_c.css',
  'regions' => array(
    'left' => t('Left side'),
    'right' => t('Right side'),
    'inset_left' => t('Inset Left side'),
    'inset_right' => t('Inset Right side')
  ),
);

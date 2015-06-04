<?php

// Plugin definition
$plugin = array(
  'title' => t('Layout F Event'),
  'category' => t('MN Artists Layouts'),
  'icon' => 'layout_f.png',
  'theme' => 'layout_f',
  'css' => 'layout_f.css',
  'regions' => array(
    'left' => t('Left side'),
    'right' => t('Right side'),
    'inset_left' => t('Inset Left side'),
    'inset_right' => t('Inset Right side')
  ),
);


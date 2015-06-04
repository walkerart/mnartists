<?php

// Plugin definition
$plugin = array(
  'title' => t('Layout G Artwork'),
  'category' => t('MN Artists Layouts'),
  'icon' => 'layout_g.png',
  'theme' => 'layout_g',
  'css' => 'layout_g.css',
  'regions' => array(
    'artwork_top' => t('Artwork Top'),
    'artwork' => t('Artwork'),
    'inset_left' => t('Inset Left side'),
    'inset_middle' => t('Inset Middle'),
    'inset_right' => t('Inset Right side')
  ),
);


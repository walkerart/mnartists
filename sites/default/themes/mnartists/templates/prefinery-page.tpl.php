<?php

/**
 * @file
 * Template for Prefinery pages. Taken from modules/system/html.tpl.php
 *
 * @see template_preprocess_page()
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN"
  "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head profile="<?php print $grddl_profile; ?>">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <style type="text/css">
    body {
      padding: 40px 0;
    }
    #backstretch {
      background: url(<?php print url(path_to_theme() . '/images/prefinery_landing_page3.png') ?>);
      background-size: 120%;
      height: 100%;
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      top: 0;
      width: 100%;
      z-index: -9999;
    }
  </style>
  <?php print $scripts; ?>
</head>
<body>
  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
    <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
  </a>
  <?php print $messages ?>
  <?php print $content ?>
  <div id="backstretch"></div>
</body>
</html>

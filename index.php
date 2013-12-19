<?php
/*
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

/**
 * @file
 * The PHP page that serves all page requests on a Drupal installation.
 *
 * The routines here dispatch control to the appropriate handler, which then
 * prints the appropriate page.
 *
 * All Drupal code is released under the GNU General Public License.
 * See COPYRIGHT.txt and LICENSE.txt.
 */

/**
 * Root directory of Drupal installation.
 */


define('DRUPAL_ROOT', getcwd());

// include solarium library (and symfonyeventdispatcher, on which it depends)
require_once DRUPAL_ROOT.'/sites/all/libraries/SymfonyEventDispatcher/EventDispatcherInterface.php';
require_once DRUPAL_ROOT.'/sites/all/libraries/SymfonyEventDispatcher/EventDispatcher.php';
require_once DRUPAL_ROOT.'/sites/all/libraries/SymfonyEventDispatcher/Event.php';
require_once DRUPAL_ROOT.'/sites/all/libraries/Solarium/Autoloader.php';
Solarium\Autoloader::register();

// bootstrap drupal
require_once DRUPAL_ROOT . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
menu_execute_active_handler();

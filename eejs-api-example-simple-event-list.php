<?php
/*
Plugin Name: Simple Event List using eejs-api
Plugin URI: http://eventespresso.com
Description: This plugin provides example usage of the eejs-api to build vue apps.  Just add <code>[EJS_EVENTS_LIST]`</code> to any page to see in action.
Version: 1.0
Author: Darren Ethier
Author URI: https://darrenethier.com
License: GPLv2
*/

define('EEJS_EXAMPLE_PLUGIN_URL', plugin_dir_url(__FILE__));
define('EEJS_EXAMPLE_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('EEJS_EXAMPLE_VERSION', '1.0');

require __DIR__ . '/vendor/autoload.php';
require_once EEJS_EXAMPLE_PLUGIN_DIR . 'src/init.php';

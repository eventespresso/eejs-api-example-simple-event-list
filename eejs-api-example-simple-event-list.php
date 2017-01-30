<?php
/*
Plugin Name: Examples for the EEJS API
Plugin URI: http://eventespresso.com
Description: A bunch of examples of the eejs-api library in action. Various shortcodes to try out.  See README.md for more info.
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

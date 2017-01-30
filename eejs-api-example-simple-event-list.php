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
use EEJSAPI\EejsApiLoader;

define( 'EEJS_EXAMPLE_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'EEJS_EXAMPLE_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'EEJS_EXAMPLE_VERSION', '1.0' );

$loader = new EejsApiLoader();

//first let's register the scripts we're going to use but not enqueue them.  This allows the shortcode handler to only
//enqueue the script as needed.
add_action('wp_enqueue_scripts', 'eejs_example_register_scripts' );
function eejs_example_register_scripts() {
    wp_register_script(
        'eejs-example-event-list',
        EEJS_EXAMPLE_PLUGIN_URL . 'assets/eejs-example-event-list.js',
        array('eejs-api'),
        EEJS_EXAMPLE_VERSION,
        true
    );
    //make sure templates are registered for the `eejs.data` property.
    EE_Registry::instance()->AssetsRegistry->addTemplate(
        'event',
        EEH_Template::display_template(
            EEJS_EXAMPLE_PLUGIN_DIR . 'templates/event_template.html',
            '',
            true
        )
    );
    EE_Registry::instance()->AssetsRegistry->addTemplate(
        'datetime',
        EEH_Template::display_template(
            EEJS_EXAMPLE_PLUGIN_DIR . 'templates/datetime_template.html',
            '',
            true
        )
    );
}

add_shortcode( 'EEJS_EVENTS_LIST', 'eejs_example_events_list' );
function eejs_example_events_list() {
    //enqueue the script needed for the shortcode content
    wp_enqueue_script('eejs-example-event-list');
    //now return the main app container
    return EEH_Template::display_template(
        EEJS_EXAMPLE_PLUGIN_DIR . 'templates/app_container.html',
        '',
        true
    );
}





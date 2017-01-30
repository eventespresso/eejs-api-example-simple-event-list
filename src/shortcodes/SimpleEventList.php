<?php
namespace EEJSAPI\shortcodes;

use EEJSAPI\EejsApiShortcodeInterface;
use EE_Registry;
use EEH_Template;

class SimpleEventList implements EejsApiShortcodeInterface
{

    public function registerScripts()
    {
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

    public function shortcodeTag()
    {
        return 'EEJS_EVENTS_LIST';
    }

    public function shortcodeContent()
    {
        //enqueue the script needed for the shortcode content
        wp_enqueue_script('eejs-example-event-list');
        //now return the main app container
        return EEH_Template::display_template(
            EEJS_EXAMPLE_PLUGIN_DIR . 'templates/app_container.html',
            '',
            true
        );
    }
}

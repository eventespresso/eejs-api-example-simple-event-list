<?php
namespace EEjsapi\shortcodes;

use Eejsapi\ShortcodeInterface;
use EE_Registry;
use EEH_Template;
use EEM_Event;

class SimpleEvent implements ShortcodeInterface
{
    public function registerScripts()
    {
        wp_register_script(
            'eejs-example-event',
            EEJS_EXAMPLE_PLUGIN_URL . 'assets/eejs-example-simple-event.js',
            array('eejs-api'),
            EEJS_EXAMPLE_VERSION,
            true
        );
        EE_Registry::instance()->AssetsRegistry->addTemplate(
            'single_event_preview',
            EEH_Template::display_template(
                EEJS_EXAMPLE_PLUGIN_DIR . 'templates/single_event_preview.html',
                '',
                true
            )
        );
        EE_Registry::instance()->AssetsRegistry->addTemplate(
            'single_event_form',
            EEH_Template::display_template(
                EEJS_EXAMPLE_PLUGIN_DIR . 'templates/single_event_form.html',
                '',
                true
            )
        );
    }

    public function shortcodeContent($attributes = array())
    {
        $event_id = isset($attributes['id']) ? $attributes['id'] : 0;
        //if no id then we're just creating a new event.

        EE_Registry::instance()->AssetsRegistry->addData('event_id', $event_id);
        wp_enqueue_script('eejs-example-event');

        //return main app container
        return EEH_Template::display_template(
            EEJS_EXAMPLE_PLUGIN_DIR . 'templates/app_wrapper_container.php',
            array( 'component' => '<event-form></event-form><event-preview></event-preview>', ),
            true
        );
    }

    public function shortcodeTag()
    {
        return 'EEJS_SIMPLE_EVENT';
    }

}
<?php

namespace Eejsapi;

class Loader
{
    /**
     * @var EejsApiShortcodeInterface[]
     */
    private $shortcode_classes;

    public function __construct()
    {
        $this->registerShortcodeClasses();
        add_action('wp_enqueue_scripts', array( $this, 'registerShortcodeScripts'));
        $this->registerShortcodes();
    }


    protected function registerShortcodeClasses()
    {
        $shortcode_class_names = $this->getShortcodeClassnames();
        foreach ($shortcode_class_names as $class_name) {
            $this->shortcode_classes[$class_name] = new $class_name();
        }
    }


    public function registerShortcodeScripts()
    {
        foreach ($this->shortcode_classes as $shortcode_class) {
            if ($shortcode_class instanceof ShortcodeInterface) {
                $shortcode_class->registerScripts();
            }
        }
    }


    protected function registerShortcodes()
    {
        foreach ($this->shortcode_classes as $shortcode_class) {
            if ($shortcode_class instanceof ShortcodeInterface) {
                add_shortcode(
                    $shortcode_class->shortcodeTag(),
                    function () use ($shortcode_class) {
                        return $shortcode_class->shortcodeContent();
                    }
                );
            }
        }
    }


    protected function getShortcodeClassnames()
    {
        $shortcodes_to_register = glob(EEJS_EXAMPLE_PLUGIN_DIR . 'src/shortcodes/*');
        $shortcode_class_names = array();
        if ($shortcodes_to_register) {
            foreach ($shortcodes_to_register as $shortcode_to_register) {
                $shortcode_class_names[] = $this->getClassNameFromFileName($shortcode_to_register);
            }
        }
        return $shortcode_class_names;
    }


    protected function getClassNameFromFileName($filename)
    {
        return 'Eejsapi\\shortcodes\\' . str_replace(EEJS_EXAMPLE_PLUGIN_DIR . 'src/shortcodes/', '', str_replace('.php', '', $filename));
    }
}
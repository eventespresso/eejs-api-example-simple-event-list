<?php
namespace EEJSAPI;

interface EejsApiShortcodeInterface
{
    public function registerScripts();
    public function shortcodeContent();
    public function shortcodeTag();
}

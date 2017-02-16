<?php
namespace Eejsapi;

interface ShortcodeInterface
{
    public function registerScripts();
    public function shortcodeContent($attributes);
    public function shortcodeTag();
}

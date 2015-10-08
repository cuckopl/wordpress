<?php

namespace Share\Main\Examples\SiteParser;

class SiteParserLoader extends \Share\Includes\Plugin\PluginLoader
{

    public function __construct()
    {
        $baseHandler = new SiteParserHandler();
        $this->add_action('admin_menu', $baseHandler, 'createMenu');
    }
}
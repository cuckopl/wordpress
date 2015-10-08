<?php

namespace Share\Main\Examples\SiteParser;

class SiteParser extends \Share\Includes\Plugin\PluginManager
{

    public function __construct()
    {
        $this->addLoader(new SiteParserLoader());
    }
}
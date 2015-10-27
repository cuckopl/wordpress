<?php

namespace App;

class WordSynomPlugin extends \Includes\Plugin\PluginManager
{

    const PLUGIN_NAME='WordSynomPlugin_';

    public function __construct()
    {
        $this->addLoader(new Admin\AdminLoader());
    }

    public function onActivate()
    {
        
    }

    public function onDeactivate()
    {
        
    }

    public function onDelete()
    {

    }
}
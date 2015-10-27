<?php

namespace App\Admin;

class AdminLoader extends \Includes\Plugin\PluginLoader
{

    public function __construct()
    {
        $menuHandler = new MenuSettingsHandler();

        $this->addMenuSettingsActions($menuHandler);
    }

    private function addMenuSettingsActions($menuHandler)
    {
        $this->add_action('admin_menu', $menuHandler, 'addMenu');
        $this->add_action('admin_init',$menuHandler,'registerOptions');
    }
}
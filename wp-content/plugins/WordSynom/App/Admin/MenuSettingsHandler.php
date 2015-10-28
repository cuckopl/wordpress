<?php

namespace App\Admin;

class MenuSettingsHandler
{
    private $formFields      = array(
        'min' => 'min',
        'max' => 'max',
        'anchor' => 'anchor',
        'password' => 'password',
        'login' => 'login',
        'api' => 'api_key',
    );
    private static $menuSlug = 'SpinnerMenuHandler';

    public function registerOptions()
    {
        foreach ($this->formFields as $field) {
            register_setting(\App\WordSynomPlugin::PLUGIN_NAME, $field);
        }
    }

    public function addMenu()
    {
        add_menu_page("Word Spinner", "Word Spinner", 0, self::$menuSlug,
            array($this, 'displayMain'));
        $spinnerChef = new \App\SpinnerChief\SpinnerChief();

        add_submenu_page("SpinnerMenuHandler", "My Submenu2", "My Submenu2", 1,
            "my-submenu-slug", array($spinnerChef, 'testConnection'));
    }

    public function displayMain()
    {

        echo \Includes\View\ViewRenderFactory::create('admin/main-menu.php',
            array(
            'formFields' => $this->formFields,
        ));
    }

    public function test()
    {
        echo'test';
    }
}
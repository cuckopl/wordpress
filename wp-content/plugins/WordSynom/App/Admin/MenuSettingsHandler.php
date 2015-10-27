<?php

namespace App\Admin;

class MenuSettingsHandler
{
    private $formFields      = array(
        'min' => 'min',
        'max' => 'max'
    );
    private static $menuSlug = __FILE__.'MenuHandler';

    public function registerOptions()
    {
//        foreach ($this->formFields as $field) {
//            register_setting(\App\WordSynomPlugin::PLUGIN_NAME, $field);
//        }

         register_setting('asdsadsadsadasd-as-dsa-dsa-d-sad-sa', 'min');
         register_setting('asdsadsadsadasd-as-dsa-dsa-d-sad-sa', 'max');
    }

    public function addMenu()
    {
        add_menu_page('My Plugin Options', 'My Plugin', 'manage_options',
            self::$menuSlug, array($this, 'displayMain'));
    }

    public function displayMain()
    {
        echo \Includes\View\ViewRenderFactory::create('admin/main-menu.php',
            array(
            'formFields' => $this->formFields,
        ));
    }
}
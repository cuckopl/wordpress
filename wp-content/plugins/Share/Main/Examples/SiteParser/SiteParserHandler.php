<?php

namespace Share\Main\Examples\SiteParser;

use Share\Includes\Config\Config;

class SiteParserHandler
{
    public $menuSlug = 'asdsadsads';

    public function startMenu()
    {
        add_action('admin_menu', $this, 'boj_menuexample_create_menu');
    }

    public function createMenu()
    {

        //create custom top-level menu
        add_menu_page('My Plugin Settings Page', 'Site Parser',
            'manage_options', $this->menuSlug, array($this, 'menu'),
            plugins_url('/images/wp-icon.png', $this->menuSlug));
        // add_menu_page(
        // $page_title, ->
        // $menu_title, ->
        // $capability,-> Uprawnienie potrzebne do wejśca do tej opcji. manage_options
        //  $menu_slug, -> 
        //   $function = '',
        //   $icon_url = '',
        //    $position = null
        //     );
        add_submenu_page($this->menuSlug, 'PAGE TITLE', "MENU_TITLE",
            'manage_options', 'menu_slug', array($this, 'subMenuYouTube'));
    }

    public function subMenuYouTube()
    {
        echo 'YouTube';
    }

    public function menu()
    {
        $view = \Share\Includes\View\ViewRenderFactory::create(PLUGIN_RESOURCE_PATH.'/site-parser/settings/settings-general.php');
        $view->display();
    }
}
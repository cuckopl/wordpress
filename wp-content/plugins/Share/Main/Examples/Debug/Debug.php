<?php

namespace Share\Main\Examples\Debug;

use Share\Includes\View\ViewRenderFactory;
use Share\Includes\Plugin\PluginLoader;

class Debug extends \Share\Includes\Plugin\PluginLoader {

    public function __construct() {
        $this->add_action('init', $this, 'startDebug');
    }

    public function startDebug() {
        if ($this->checkPrivilages()) {
            PluginLoader::create()->add_action('wp_footer', $this, 'displayInfo')->run();
        }
    }

    public function checkPrivilages() {
        $can = false;
        if (current_user_can('manage_options')) {
            if (!defined('SAVEQUERIES'))
                define('SAVEQUERIES ', true);
            $can = true;
        }
        return $can;
    }

    public function displayInfo() {
        global $wpdb;
        echo "<pre>";
        var_dump($wpdb->queries);
        echo "</pre>";
    }

    public static function startPlugin() {
        $plugin = new self;
        return $plugin->run();
    }

}

<?php

namespace Share\Main\Examples\RssWidget;

class RssLoader extends \Share\Includes\Plugin\PluginLoader {

    public function __construct() {
//        add_action('widgets_init', function() {
//            register_widget('\\Share\\Main\\RssWidget');
//        });
        $this->add_action('widgets_init', $this, 'addWidget');
    }

    public function addWidget() {
        return register_widget('\\Share\\Main\\Examples\\RssWidget\\RssWidget');
    }

}

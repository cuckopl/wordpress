<?php

namespace Share\Main\Examples\RssWidget;

class MetaBoxLoader extends \Share\Includes\Plugin\PluginLoader {

    public function __construct() {
        $this->add_action('add_meta_boxes', new MetaBoxe(), 'loadDependencies');
        $this->add_action('save_post', new MetaBoxe(), 'save');
    }

}

<?php

namespace Share\Main\Examples\UnusedTags;

class UnusedTagsPluginLoader extends \Share\Includes\Plugin\PluginLoader {

    public function __construct() {
        $unusedTags = new UnusedTags();
        $this->add_action('admin_menu', $unusedTags, 'loadDependices');
        $this->add_action('admin_init', $unusedTags, 'unusedTagsDoAction');
    }



}

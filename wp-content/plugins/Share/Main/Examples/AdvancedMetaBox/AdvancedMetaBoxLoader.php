<?php

namespace Share\Main\Examples\AdvancedMetaBox;

class AdvancedMetaBoxLoader extends \Share\Includes\Plugin\PluginLoader {

    public function __construct() {
        $metaBox = new AdvancedMetaBox();
        $this->add_action('add_meta_boxes', $metaBox, 'loadDependencies');
        $this->add_action('save_post', $metaBox, 'save');
        $this->add_action('admin_print_scripts-post.php', $metaBox, 'loadScripts');
        $this->add_action('admin_print_scripts-post-new.php', $metaBox, 'loadScripts');
    }

}

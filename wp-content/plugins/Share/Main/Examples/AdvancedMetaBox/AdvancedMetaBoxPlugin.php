<?php

namespace Share\Main\Examples\AdvancedMetaBox;

class AdvancedMetaboxPlugin extends \Share\Includes\Plugin\PluginManager {

    public function __construct() {
        $this->addLoader(new AdvancedMetaBoxLoader());
    }

}

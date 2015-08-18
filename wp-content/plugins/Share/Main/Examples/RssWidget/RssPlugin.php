<?php

namespace Share\Main\Examples\RssWidget;

class RssPlugin extends \Share\Includes\Plugin\PluginManager {

    public function __construct() {
        $this->addLoader(new RssLoader());
        $this->addLoader(new MetaBoxLoader());
    }

}

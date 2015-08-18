<?php

namespace Share\Main\Examples\UnusedTags;

class UnusedTagsPlugin extends \Share\Includes\Plugin\PluginManager {

    public function __construct() {
        $this->addLoader(new UnusedTagsPluginLoader());
    }

}

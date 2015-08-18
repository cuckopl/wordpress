<?php

namespace Share\Main\Examples\DashboardWidget;

class DashboardWidgetPlugin extends \Share\Includes\Plugin\PluginManager {

    public function __construct() {
        $this->addLoader(new DashboardWidgetPluginLoader());
    }

}

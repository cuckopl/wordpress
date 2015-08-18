<?php

namespace Share\Main\Examples\DashboardWidget;

class DashboardWidgetPluginLoader extends \Share\Includes\Plugin\PluginLoader {

    public function __construct() {
//        add_action('widgets_init', function() {
//            register_widget('\\Share\\Main\\RssWidget');
//        });
        $this->add_action('wp_dashboard_setup', $this, 'addWidget');
    }

    public function addWidget() {
        $dashboardWidget= new DahsboardWidget();
        return wp_add_dashboard_widget('dashboard_widget_1',
                'Some info ',
                array($dashboardWidget,'add'),
                array($dashboardWidget,'setup'));
    }

}

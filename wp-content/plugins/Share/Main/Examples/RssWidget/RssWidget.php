<?php

namespace Share\Main\Examples\RssWidget;

class RssWidget extends \Share\Includes\Widget\AbstractWidget {

    public function __construct($id_base = '', $name = '', $widget_options = array(), $control_options = array()) {
        return parent::__construct('RssWidget', 'Advanced Rss Widget', array('classname' => "\\Share\\Main\\Examples\\RssWidget\\RssWidget",
                    'description' => 'ALA MA KOTA'), $control_options);
    }

    public function form($instance) {
        $defaults = array(
            'title' => 'RSS FEEDS',
            'rss_feed' => 'adres url rss',
            'rss_items' => 2
        );
        $instance = wp_parse_args((array) $instance, $defaults);
        extract($instance);
        echo $this->renderView(PLUGIN_PATH . '/resources/rss-widget-form.php', array_merge($instance, array('widget' => $this)));
    }

    public function update($newInstance, $oldInstance) {
        $instance = $oldInstance;
        $instance['title'] = strip_tags($newInstance['title']);
        $instance['rss_feed'] = strip_tags($newInstance['rss_feed']);
        $instance['rss_items'] = strip_tags($newInstance['rss_items']);
        $instance['rss_date'] = strip_tags($newInstance['rss_date']);
        $instance['rss_summary'] = strip_tags($newInstance['rss_summary']);

        return $instance;
    }

    public function widget($args, $instance) {
        extract($args);
        echo $before_widget;
//load the widget settings
        $title = apply_filters('widget_title', $instance['title']);
        $rss_feed = empty($instance['rss_feed']) ? '' :
                $instance['rss_feed'];
        $rss_items = empty($instance['rss_items']) ? 2 :
                $instance['rss_items'];
        $rss_date = empty($instance['rss_date']) ? 0 : 1;
        $rss_summary = empty($instance['rss_summary']) ? 0 :
                1;
        if (!empty($title)) {
            echo $before_title . $title .
            $after_title;
        };
        if ($rss_feed) {
//display the RSS feed
            wp_widget_rss_output(array(
                'url' => $rss_feed,
                'title' => $title,
                'items' => $rss_items,
                'show_summary' => $rss_summary,
                'show_author' => 0,
                'show_date' => $rss_date
            ));
        }
        echo $after_widget;
    }

}

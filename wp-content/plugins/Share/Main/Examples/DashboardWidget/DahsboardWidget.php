<?php

namespace Share\Main\Examples\DashboardWidget;

class DahsboardWidget {

    public function display() {
//load our widget option
        $boj_option = get_option('boj_dashboard_widget_rss ');
//if option is empty set a default
        $boj_rss_feed = ( $boj_option ) ? $boj_option :
                'http://wordpress.org/news/feed/';
//retrieve the RSS feed and display it
        echo '<div class="rss-widget">';
        wp_widget_rss_output(array(
            'url' => $boj_rss_feed,
            'title' => 'RSS Feed News',
            'items' => 2,
            'show_summary' => 1,
            'show_author' => 0,
            'show_date' => 1
        ));
        echo '</div>';
    }

    public function setup() {

//check if option is set before saving
        if (isset($_POST['boj_rss_feed'])) {
//retrieve the option value from the form
            $boj_rss_feed = esc_url_raw($_POST['boj_rss_feed']);
//save the value as an option
            update_option('boj_dashboard_widget_rss', $boj_rss_feed);
        }
//load the saved feed if it exists
        $boj_rss_feed = get_option('boj_dashboard_widget_rss ');
        ?>
        <label for="feed">
            RSS Feed URL:  <input type="text"
                                 name="boj_rss_feed" id="boj_rss_feed"
                                 value="<?php echo esc_url($boj_rss_feed); ?>"
                                 size="50" />
        </label>
        <?php
    }

}

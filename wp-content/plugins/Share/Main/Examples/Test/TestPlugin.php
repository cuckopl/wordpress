<?php

namespace Share\Main\Examples\Test;

use Share\Includes\View\ViewRenderFactory;

class TestPlugin extends \Share\Includes\Plugin\PluginLoader {

    public function __construct() {
        //add_filter('posts_results', array($this,'boj_custom_home_page_posts'));
        $this->add_filter('comment_text', $this, 'commetHook');
        $this->add_filter('single_template', $this, 'template');
        $this->add_action('admin_menu', $this, 'commentMenu');
        $this->add_action('admin_menu', $this, 'addMenu');
    }

    public function template($template) {
        var_dump($template);
    }

    /**
     * 
     * @global type $comment
     * @param string $text
     * @return string
     */
    public function addMenu() {
        add_menu_page('My Plugin Settings', 'Plugin Styling', 'manage_options', __FILE__, array($this, 'PluginSettingsMenu'));
    }

    public function PluginSettingsMenu() {
        echo ViewRenderFactory::create(PLUGIN_RESOURCE_PATH . '/plugin-settings/main.php', array())
                ->render();
    }

    public function commetHook($text) {
        $this->loadCommentScript();
        global $comment;

        if ($comment->user_id != 0) {
            $user = new \WP_User($comment->id);

            if (is_array($user->roles)) {
                $text.= '<p> User Role:' . $user->roles[0] . '</p>';
            }
        }
        return $text;
    }

    public function commentMenu() {
//        add_menu_page('Post Rate Settings', 'Menu Example Settings', 'manage_options', __FILE__, 'boj_menuexample_settings_page', plugins_url('/images/wp-icon.png', __FILE__));
//        //create submenu items
//        add_submenu_page(__FILE__, 'About My Plugin', 'About', 'manage_options', __FILE__ . '_about', boj_menuexample_about_page);
//        add_submenu_page(__FILE__, 'Help with My Plugin', 'Help', 'manage_options', __FILE__ . '_help', boj_menuexample_help_page);
//        add_submenu_page(__FILE__, 'Uninstall My Plugin', 'Uninstall', 'manage_options', __FILE__ . '_uninstall', boj_menuexample_uninstall_page);
    }

    private function loadCommentScript() {
        wp_enqueue_script('comment_text', '/wp-content/plugins/share/resources/js/help/rate.js', array('jquery', 'media-upload', 'thickbox'));
    }

    /**
     * 
     * @global type $wpdb
     * @global type $wp_query
     * @param type $results
     * @return type array
     */
    public function boj_custom_home_page_posts($results) {
        global $wpdb, $wp_query;

        /* Check if viewing the home page. */
        if (is_home()) {
            /* Posts per page. */
            $per_page = get_option('posts_per_page');

            /* Get the current page. */
            $paged = get_query_var('paged');

            /* Set the $page variable. */
            $page = (( 0 == $paged || 1 == $paged ) ? 1 : absint($paged) );

            /* Set the number of posts to offset. */
            $offset = ($page - 1) * $per_page . ', ';

            /* Set the limit by the $offset and number of posts to show. */
            $limits = 'LIMIT ' . $offset . $per_page;

            /* Get results from the database. */
            $results = $wpdb->get_results("
                    SELECT SQL_CALC_FOUND_ROWS $wpdb->posts.*
                    FROM $wpdb->posts
                    AND post_type = 'page'
                    AND post_status = 'publish'
                    ORDER BY post_title ASC
                    $limits
                ");
        }
        return $results;
    }

    public static function startPlugin() {
        $plugin = new self;
        return $plugin->run();
    }

}

<?php
$resourceFolder = 'resources/';
define("PLUGIN_PATH", __DIR__);
define("PLUGIN_RESOURCE_PATH", __DIR__ . '/' . $resourceFolder);
//start auto loader
require_once __DIR__ . '/Includes/autoload.php';

/**
 * @package Share
 */
/*
  Plugin Name: RSS PARSER
  Plugin URI: RSS PARSER
  Description: RSS PARSER
  Author: RSS PARSER
  Author URI: RSS PARSER
  License: RSS PARSER
  Text Domain: RSS PARSER
 */




Share\PluginFactory\RssPluginFactory::make()->run();
Share\PluginFactory\DashboardWidgetFactory::make()->run();
Share\PluginFactory\AdvancedMetaBoxFactory::make()->run();
Share\PluginFactory\UnusedTagsFactory::make()->run();
\Share\Main\Examples\Test\TestPlugin::startPlugin();
\Share\Main\Examples\Debug\Debug::startPlugin();
\Share\Main\Examples\YouTubeParser\YouTubeParser::startPlugin();


add_action('plugins_loaded', 'boj_footer_message_plugin_setup');

function boj_footer_message_plugin_setup() {
    add_action('wp_footer', 'boj_example_footer_message', 100);
}

function boj_example_footer_message() {

    if (current_user_can('install_plugsins')) {
        wp_die('Insufficient permissions');
    }
    echo 'to jest test';
}
?>







<?php
/*
  Plugin Name: Settings API example
  Plugin URI: http://example.com/
  Description: A complete and practical example of use of the Settings API
  Author: WROX
  Author URI: http://wrox.com
 */
// Add a menu for our option page
add_action('admin_menu', 'boj_myplugin_add_page');

function boj_myplugin_add_page() {
    add_options_page('My Plugin', 'My Plugin', 'manage_options', 'boj_myplugin', 'boj_myplugin_option_page'
    );
}

// Draw the option page
function boj_myplugin_option_page() {
    ?>
    <div class="wrap">
        <?php screen_icon(); ?>
        <h2>My plugin</h2>
        <form action="options.php" method="post">
            <?php settings_fields('boj_myplugin_options'); ?>
            <?php do_settings_sections('boj_myplugin'); ?>
            <input name="Submit" type="submit" value="Save Changes"/>
        </form>
    </div>
    <?php
}

// Register and define the settings
add_action('admin_init', 'boj_myplugin_admin_init');

function boj_myplugin_admin_init() {
    register_setting('boj_myplugin_options', 'boj_myplugin_options', 'boj_myplugin_validate_options');
    add_settings_section('boj_myplugin_main', 'My Plugin Settings', 'boj_myplugin_section_text', 'boj_myplugin');
    add_settings_field('boj_myplugin_text_string', 'Enter text here', 'boj_myplugin_setting_input', 'boj_myplugin', 'boj_myplugin_main');
    add_settings_field('boj_myplugin_text_string', 'Second Input', 'boj_myplugin_setting_input', 'boj_myplugin', 'boj_myplugin_main');
}

// Draw the section header
function boj_myplugin_section_text() {
    echo ' <p>Enter your settings here.</p> ';
}

// Display and fill the form field
function boj_myplugin_setting_input() {
// get option 'text_string' value from the database
    $options = get_option('boj_myplugin_options');
    $text_string = $options['text_string'];
// echo the field
    echo " <input id='text_string' name='boj_myplugin_options[text_string]'
                            type='text' value='$text_string' / > ";
}

// Validate user input (we want text only)
function boj_myplugin_validate_options($input) {
    $valid = array();
    $valid['text_string'] = preg_replace(
            '/[^a-zA-Z]/', '', $input['text_string']);
    return $valid;
}
?>
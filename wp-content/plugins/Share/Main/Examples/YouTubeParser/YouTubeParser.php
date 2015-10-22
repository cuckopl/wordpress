<?php

namespace Share\Main\Examples\YouTubeParser;

use Share\Includes\View\ViewRenderFactory;
use Share\Includes\Interfaces\ActionHandlerInterface;

class YouTubeParser extends \Share\Includes\Plugin\PluginLoader {

    private $actionHandler = null;

    const PLUGIN_NAME = 'Share/Main/Examples/YouTubeParser/YouTubeParser';
    const PLUGIN_PREFIX = 'pcp_uniq_';

    public function __construct() {
        $this->actionHandler = ActionHandler::create();
        $this->add_action('admin_menu', $this, 'addMenu');
        $this->add_action('admin_init', $this, 'postActions');
    }

    public function addMenu() {
        add_menu_page('Parser Settings', 'Video Site Parser', 'manage_options', __FILE__, array($this, 'pluginSettingsMenu'));
    }

    public function pluginSettingsMenu() {
        $html = ViewRenderFactory::create(PLUGIN_RESOURCE_PATH . '/parser/main.php', array(
                    'actionName' => self::PLUGIN_NAME,
                ))
                ->render();
        $html = apply_filters('pol_parser', $html);

        echo $html;
    }

    public function postActions() {
        if (!$this->checkRequest(self::PLUGIN_NAME)) {
            return false;
        }

        $action = $this->checkRequest(self::PLUGIN_NAME);
        $postData = (object) $_REQUEST;
        $result = $this->handleAction($action, $postData);
    }

    public static function startPlugin() {
        $plugin = new self;
        return $plugin->run();
    }

    /*
     * Check variable exists in REQUEST
     */

    private function checkRequest($name) {

        if (!isset($_REQUEST[$name])) {
            return false;
        }

        return $_REQUEST[$name];
    }

    /*
     * Handle user privilage
     */

    private function checkUserPrivilages($privilage) {

        if (!current_user_can($privilage)) {
            throw new EnoughtPrivilagesException();
        }

        return true;
    }

    /*
     * Handle action 
     */

    protected function handleAction($action, \stdClass $parameter) {

        if (!$this->actionHandler instanceof ActionHandlerInterface) {
            throw new \InvalidArgumentException('ActionHandler must be instance of ActionHandlerInterface');
        }

        return $this->actionHandler->$action($parameter);
        //  return call_user_func(array($this->actionHandler, $action), $parameter);
    }

}

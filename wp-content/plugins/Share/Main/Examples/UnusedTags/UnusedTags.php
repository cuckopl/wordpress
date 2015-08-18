<?php

namespace Share\Main\Examples\UnusedTags;

use Share\Includes\Exception\EnoughtPrivilagesException;
use Share\Includes\Interfaces\ActionHandlerInterface;
use \Share\Includes\View\ViewRenderFactory;

class UnusedTags {
    /*
     * Load Dependencies for this plugin
     */

    const ACTION = 'unusedTagAction';

    private $actionHandler = null;

    public function __construct() {
        $this->actionHandler = UnusedTagsActionHandler::create();
    }

    public function loadDependices() {
        add_posts_page('Unused Tags', 'Unused Tags', 'manage_options', 'pol_unused_tags', array($this, 'polCreateOptionPage'));
    }

    public function unusedTagsDoAction() {
        if (!$this->checkRequest(self::ACTION)) {
            return false;
        }
        $this->checkUserPrivilages('manage_options');
        $action = $this->checkRequest(self::ACTION);
        check_admin_referer('ala');
        $postData = (object) $_REQUEST;
        $result = $this->handleAction($action, $postData);

        if ($result) {
            add_action('admin_notices', array($this->actionHandler, 'done'));
        } else {
            add_action('admin_notices', array($this->actionHandler, 'error'));
        }

    }

    public function polCreateOptionPage() {

//        utags-option-page-main
        $termsTable = new \Share\Includes\Model\TermsTable();
        $vars['UnusedTags'] = $termsTable->fetchUnusedTags();
        $vars['actionName'] = self::ACTION;
        echo ViewRenderFactory::create(PLUGIN_RESOURCE_PATH . '/unused-tags/utags-option-page-main.php', $vars)
                ->render();
    }

    /*
     * Check variable exists in REQUEST
     */

    private function checkRequest($name) {
        if (!isset($_REQUEST[$name])) {
            return false;
        }

        return $_REQUEST[$name];
//        filter_input($type, $variable_name);
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
            throw new \InvalidArgumentException('actionHandler must be instance of ActionHandlerInterface');
        }
        return $this->actionHandler->$action($parameter);
        //  return call_user_func(array($this->actionHandler, $action), $parameter);
    }

}

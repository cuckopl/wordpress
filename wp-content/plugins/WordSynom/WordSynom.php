<?php //
/**
 * @package Share
 */
/*
  Plugin Name: WordSynom
  Plugin URI: WordSynom
  Description: WordSynom
  Author: RSS WordSynom
  Author URI: WordSynom
  License: WordSynom
  Text Domain: WordSynom
 */



$resourceFolder = 'resources/';
define("PLUGIN_PATH", __DIR__);
define("PLUGIN_RESOURCE_PATH", __DIR__.'/'.$resourceFolder);
//start auto loader
require_once __DIR__.'/Includes/autoload.php';
require_once __DIR__.'/Includes/config.php';
$plugin = new App\WordSynomPlugin();


//add activation and deactivation hooks
$plugin->run();

?>




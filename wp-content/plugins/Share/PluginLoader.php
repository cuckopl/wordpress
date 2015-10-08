<?php
$resourceFolder = 'resources/';
define("PLUGIN_PATH", __DIR__);
define("PLUGIN_RESOURCE_PATH", __DIR__.'/'.$resourceFolder);
//start auto loader
require_once __DIR__.'/Includes/autoload.php';
require_once __DIR__.'/Includes/config.php';


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

$sitePraser = new Share\Main\Examples\SiteParser\SiteParser();

$sitePraser->run();


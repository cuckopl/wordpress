<?php
spl_autoload_register('autoload_function');

function autoload_function($classname)
{
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $classname);

    // create the actual filepath
    $filePath = WP_PLUGIN_DIR.DIRECTORY_SEPARATOR.$class.'.php';

    // check if the file exists
    if (file_exists($filePath)) {
        // require once on the file
        require_once $filePath;
    }
}

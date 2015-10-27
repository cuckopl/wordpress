<?php

namespace Includes\View;

class ViewRenderFactory
{
    protected static $viewRenderer = false;

    public static function create($template, $args = array())
    {
        return new ViewRendererClass(PLUGIN_RESOURCE_PATH.$template, $args);
    }
}
<?php

namespace Share\Includes\View;

class ViewRenderFactory
{
    protected static $viewRenderer = false;

    public static function create($template, $args = array())
    {
        return new ViewRendererClass($template, $args);
    }
}
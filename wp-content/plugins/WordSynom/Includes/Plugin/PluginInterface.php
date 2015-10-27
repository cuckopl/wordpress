<?php

namespace Includes\Plugin;

interface PluginInterface
{

    public function onActivate();

    public function onDeactivate();

    public function onDelete();
}
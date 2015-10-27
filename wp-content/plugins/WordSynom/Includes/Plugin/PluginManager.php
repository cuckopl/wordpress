<?php

namespace Includes\Plugin;

abstract class PluginManager implements PluginInterface
{
    private $loaders = array();

    public function addLoader(\Includes\Interfaces\LoaderInterface $loader)
    {
        $this->loaders[] = $loader;
        return $this;
    }

    private function loadLoaders()
    {
        foreach ($this->loaders as $loader) {
            $loader->run();
        }
    }

    public function run()
    {
        $this->loadLoaders();
    }
}
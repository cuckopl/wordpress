<?php

namespace Share\Includes\Plugin;

class PluginManager {

    protected $loaders;


    public function addLoader(\Share\Includes\Interfaces\LoaderInterface $loader) {
        $this->loaders[] = $loader;
        return $this;
    }

    private function loadLoaders() {
        foreach ($this->loaders as $loader) {
            $loader->run();
        }
    }

    protected function loadDependiences() {
        $this->loadLoaders();
    }

    public function run() {
        $this->loadDependiences();
    }

}

<?php

namespace Share\Includes\Plugin;

class PluginLoader implements \Share\Includes\Interfaces\LoaderInterface {

    protected $actions = array();
    protected $filters = array();

//make this better
    public function add_action($hook, $component, $callback) {
        $this->actions = $this->add($this->actions, $hook, $component, $callback);
        return $this;
    }

    public function add_filter($hook, $component, $callback) {
        $this->filters = $this->add($this->filters, $hook, $component, $callback);
        return $this;
    }

    private function add($hooks, $hook, $component, $callback) {

        $hooks[] = array(
            'hook' => $hook,
            'component' => $component,
            'callback' => $callback
        );

        return $hooks;
    }

    public function run() {

        foreach ($this->filters as $hook) {
            add_filter($hook['hook'], array($hook['component'], $hook['callback']));
        }

        foreach ($this->actions as $hook) {
            add_action($hook['hook'], array($hook['component'], $hook['callback']));
        }
    }

    public static function create() {
        return new self;
    }

}

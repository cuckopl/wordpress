<?php

namespace Share\Includes\Widget;

abstract class AbstractWidget extends \WP_Widget implements \Share\Includes\Widget\Interfaces\WidgetInterface {

    protected $viewRenderer = null;

    public function form($instance) {
        throw new \Exception('This method must be overwritten');
    }

    public function update($newInstance, $oldInstance) {
        throw new \Exception('This method must be overwritten');
    }

    public function widget($arg, $instance) {
        throw new \Exception('This method must be overwritten');
    }

    protected function renderView($file, array $vars) {
        $this->viewRenderer = new \Share\Includes\View\ViewRendererClass($file, $vars);
        return $this->viewRenderer->render();
    }

}

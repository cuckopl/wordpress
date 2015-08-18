<?php

namespace Share\Includes\Widget\Interfaces;

interface WidgetInterface {

     public function form($instance);

     public function update($newInstance, $oldInstance);

     public function widget($arg, $instance);
}

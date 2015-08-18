<?php

namespace Share\Includes\View;

class ViewRendererClass {

    /**
     * Template being rendered.
     */
    protected $template = null;
    protected $vars = array();

    /**
     * Initialize a new view context.
     */
    public function __construct($template, array $vars = array()) {
        $this->template = $template;
        $this->vars = $vars;
    }

    /**
     * Safely escape/encode the provided data.
     */
    public function h($data) {
        return htmlspecialchars((string) $data, ENT_QUOTES, 'UTF-8');
    }

    public function addVariables(array $variables) {
        $this->vars = array_merge($variables, $this->vars);
        return $this;
    }

    /**
     * 
     * @param type $template path to template
     */
    public function addTemplate($template) {
        $this->template = $template;
    }

    /**
     * Render the template, returning it's content.
     * @param array $data Data made available to the view.
     * @return string The rendered template.
     */
    public function render() {
        ob_start();
        extract($this->vars);
        include($this->template);
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}

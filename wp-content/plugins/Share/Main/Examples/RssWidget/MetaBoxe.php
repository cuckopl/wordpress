<?php

namespace Share\Main\Examples\RssWidget;

class MetaBoxe extends \Share\Includes\MetaBox\SimpleMetaBox {

    const META_PREFIX = 'boj_mbe_';

    protected $formFields = array(
        self::META_PREFIX . 'name',
        self::META_PREFIX . 'costume',
    );
    protected $template = '/meta-box-content.php';

    public function __construct($template = null) {
        if ($template) {
            $this->template = $template;
        }
    }

    /**
     * Load all dependencies 
     */
    public function loadDependencies() {
        add_meta_box('boj-meta', 'My Custom Meta Box', array($this, 'create'), 'post', 'normal', 'high');
    }

}

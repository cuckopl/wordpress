<?php

namespace Share\Main\Examples\AdvancedMetaBox;

class AdvancedMetaBox extends \Share\Includes\MetaBox\SimpleMetaBox {

    const META_PREFIX = 'pol_mbe_';

    private $formFields = array(
        self::META_PREFIX . 'image',
    );
    protected $template = '/advanced-meta-box/meta-box-content.php';

    public function loadDependencies() {
        add_meta_box('pol-image-mate', 'Set Image', array($this, 'create'), 'post', 'normal', 'high');
    }

    public function loadScripts() {
        wp_enqueue_script('boj-image-upload', '/wp-content/plugins/share/resources/js/advanced-metabox/gallery.js', array('jquery', 'media-upload', 'thickbox')
        );
    }

}

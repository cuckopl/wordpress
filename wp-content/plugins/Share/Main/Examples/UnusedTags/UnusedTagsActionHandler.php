<?php

namespace Share\Main\Examples\UnusedTags;

class UnusedTagsActionHandler implements \Share\Includes\Interfaces\ActionHandlerInterface {

    public function done() {
        echo'Akcja wykonana poprawnie';
    }
    
    public function error() {
        echo'wystąpił błąd podczas przetwarzania.';
    }

    public function rename($params) {
        $newtag = array('name' => $params->name, 'slug' =>
            $params->name);
        return  wp_update_term($params->id, 'post_tag', $newtag);
       
    }

    public function delete($params) {
        return wp_delete_term($params->id, 'post_tag');
    }

    public static function create() {
        return new self;
    }

}

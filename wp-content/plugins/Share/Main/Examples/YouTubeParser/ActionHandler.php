<?php

namespace Share\Main\Examples\YouTubeParser;

class ActionHandler implements \Share\Includes\Interfaces\ActionHandlerInterface {

    public function done() {
        echo'Akcja wykonana poprawnie';
    }

    public function error() {
        echo'Wystąpił błąd podczas przetwarzania.';
    }

    public function startParse($data) {

        $postTable = new \Share\Includes\Model\PostTable();
//         normal parse url and find
        $postTable->insertPost([]);
        $site = file_get_contents('http://youtube.com');

        preg_match_all('/http:\/\/([^\s]+)/', $site, $match);



        add_filter('pol_parser', function($html) use ($match) {
            return $html . 'Parsowanie Rozpoczęte';
        });
        
        $options = ['color'=>'red','type'=>'ana'];
        update_option('pawel_module2', $options);
        
        
        
    }

    public static function create() {
        return new self;
    }

}

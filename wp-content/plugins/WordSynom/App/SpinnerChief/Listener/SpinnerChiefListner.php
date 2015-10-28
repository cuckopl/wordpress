<?php

namespace App\SpinnerChief\Listener;

class SpinnerChiefListner extends \Includes\Listener\Listener
{

    public function addMenu()
    {
        add_submenu_page('SpinnerMenuHandler', "My Submenu", "My Submenu",
            'manage_options', "manage_options", array($this, 'testConnection'));
    }

    public function listen()
    {
         header("Location: ".$_SERVER["HTTP_REFERER"]);
    }
}
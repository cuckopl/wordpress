<?php

namespace App\SpinnerChief;

class SpinnerChief
{

    private function getConnectionData()
    {
        $this->password = get_settings('password');
        $this->login    = get_option('login');
        $this->apiKey   = get_option('api_key');
    }

    public function testConnection()
    {
        $this->getConnectionData();

        $url  = sprintf('http://api.spinnerchief.com:8000/apikey=%s&username=%s&password=%s',
            $this->apiKey, $this->login, $this->password);
        $data = array('hello this is test');

// use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
//                'header' => "Content-type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'timeout' => 1,
                'content' => http_build_query($data),
            ),
        );
        $context = stream_context_create($options);
        @$result  = file_get_contents($url, false, $context);
        if ($result) {
            echo '<h1>Test successfully finished</h1> ';
        } else {
            echo '<h1>Test faild</1>';
        }

        var_dump(base64_decode($result));

        echo $this->max;
        ?>

        <a href="/wp-admin/admin.php?page=SpinnerMenuHandler"><button>Powrót</button></a>

        <?php
    }
}
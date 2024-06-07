<?php

function dump($data) {
    echo '<pre>';

    var_dump($data);

    echo '<pre>';
}

function dd($data){

    dump($data);
    die;
}


function abort($code = 404){
    http_response_code($code);
    require VIEWS . "/errors/{$code}.php";
    die;
}

function getIp() {
    $keys = [
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'REMOTE_ADDR'
    ];
    foreach ($keys as $key) {
        if (!empty($_SERVER[$key])) {
            $ip = trim(end(explode(',', $_SERVER[$key])));
            if (filter_var($ip, FILTER_VALIDATE_IP)) {
                return $ip;
            }
        }
    }
}

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

function load_form($fillable = [], $post = true){
    $load_data = $_POST ? $_POST : $_GET;
    $data = [];
    foreach ($fillable as $name){
        if(isset($load_data[$name])){
            if(!is_array($load_data[$name])){
                $data[$name] = trim($load_data[$name]);
            } else {
                $data[$name] = $load_data[$name];
            }
        } else {
            $data[$name] = '';
        }
    }
    foreach ($load_data as $key => $value){
        if(in_array($key, $fillable)){
            $data[$key] = trim($value);
        }
    }
    return $data;
}

function redirect ($url = '') {
    if($url){
        $redirect = $url;
    } else {
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }

    header("Location: {$redirect}");
    die;
}

function get_file_extetion ($file_name){
    $file_ext = explode('.', $file_name);
    return end($file_ext);
}

function old ($fieldname) {
    return isset($_POST[$fieldname]) ? $_POST[$fieldname] : '';
}

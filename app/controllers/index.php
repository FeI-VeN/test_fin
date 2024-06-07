<?php

/**
 * @var Db $db
*/
$utm_source = $ip_user = '';
if($_GET['utm_source']) {
    require MODELS . '/tracker.php';
    traсkerSource();
    $utm_source = htmlspecialchars($_GET['utm_source'], ENT_QUOTES);
    $ip_user = getIp();
}



$offers = $db->query("SELECT * FROM offers")->findAll();

require_once VIEWS . '/index.php';

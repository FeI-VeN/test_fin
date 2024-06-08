<?php

if($_GET['offer_id']){
    if (isset($_SERVER['HTTP_REFERER'])) {
        $url = $_SERVER['HTTP_REFERER'];
        $parsedUrl = parse_url($url);
        $queryString = $parsedUrl['query'] ? $parsedUrl['query'] : '';
        parse_str($queryString, $queryParams);
        $offer_id = $_GET['offer_id'] ? (int)$_GET['offer_id'] : null;
        $utm = $queryParams['utm_source'] ? htmlspecialchars($queryParams['utm_source'], ENT_QUOTES) : null;
        if ($offer_id !== null) {
            $url_prev = $db->query("
                    SELECT 
                        url_offer
                    FROM 
                        offers
                    WHERE 
                        id = {$offer_id}")->find();
            if(!empty($url_prev)){
                if($utm !== null){
                    $ip_user = getIp();
                    $clicks = $db->query("SELECT * FROM click_id WHERE `ip_user` = '{$ip_user}' AND `time_click` >= NOW() - INTERVAL 1 DAY AND source = '{$utm}' AND `type_el` = 'offer'")->findAll();
                    if(empty($clicks) || count($clicks) < 20){
                        $data_click = [];
                        $data_click['type_el'] = 'offer';
                        $data_click['offer_id'] = $offer_id;
                        $data_click['ip_user'] = $ip_user;
                        $data_click['source'] = $utm;
                        $db->query("INSERT INTO click_id (`type_el`, `offer_id`, `ip_user`, `source`) VALUES(:type_el, :offer_id, :ip_user, :source)", $data_click);
                    }
                }
                redirect($url_prev['url_offer']);
            } else {
                redirect($url);
            }
        } else {
            redirect($url);
        }
    } else {
        redirect('/');
    }
} else {
    redirect('/');
}
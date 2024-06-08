<?php
if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
    return;
}

// Сниппет будет обрабатывать не один вид запросов, поэтому работать будем по запрашиваемому действию
// Если в массиве POST нет действия - выход
if (empty($_POST['action'])) {
    return;
}

$res = new StdClass();
$res->status = "error";
$is_error = 0;
$action = $_POST['action'];
switch ($action) {
    // создать объявление
    case 'deleteOffer':
        if (isset($_POST['id_offer']) && (int)$_POST['id_offer'] > 0) {
            $id_offer = $_POST['id_offer'];
        } else {
            $is_error = 1;
            $res->text = 'Задано не верное значение id';
        }
        if (!$is_error) {
            $offers = $db->query("SELECT * FROM offers WHERE id = {$id_offer}")->find();

            if(!empty($offers)){
                $del_offer = $db->query("DELETE FROM offers WHERE id = {$id_offer}");
                if ($del_offer && $del_offer->rowCount() > 0) {
                    $res->status = 'success';
                    $res->text = 'Успех';
                } else {
                    $res->text = 'При удалении возникла ошибка';
                }
            } else{
                $res->text = 'Оффера с заданным id не существует';
            }
        }

        echo json_encode($res);
    break;

    case 'trackerSource':
        if (isset($_POST['utm_source']) && $_POST['utm_source'] != '' && $_POST['utm_source'] != 'undefined') {
            $utm_source = htmlspecialchars($_POST['utm_source'], ENT_QUOTES);
        } else {
            $is_error = 1;
            $res->text = 'Не найден источник';
        }
        if (!$is_error) {
            $ip_user = getIp();
            $clicks = $db->query("SELECT * FROM click_id WHERE `ip_user` = '{$ip_user}' AND `time_click` >= NOW() - INTERVAL 1 DAY AND source = '{$utm_source}' AND `type_el` = 'source'")->findAll();
            if(empty($clicks) || count($clicks) < 20){
                $data_click = [];
                $data_click['type_el'] = 'source';
                $data_click['ip_user'] = $ip_user;
                $data_click['source'] = $utm_source;
                $db->query("INSERT INTO click_id (`type_el`, `ip_user`, `source`) VALUES(:type_el, :ip_user, :source)", $data_click);
                $res->status = 'success';
                $res->text = 'Успех';
            } else {
                $res->text = 'Скликивание';
            }
        }

        echo json_encode($res);
    break;
}
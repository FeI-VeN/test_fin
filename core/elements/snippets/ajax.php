<?php
if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] != 'XMLHttpRequest') {
    return;
}
// Если в массиве POST нет действия - выход
if (empty($_POST['action'])) {
    return;
}
$res = new StdClass();
$res->status = "error";
$is_error = 0;
$action = $_POST['action'];
switch ($action) {
    case 'test':
        if (isset($_POST['info']) && $_POST['info'] != '') {
            $info = (int)$_POST['info'];
            $res->info_text =$info;
            $res->status = 'success';
        } else {
            $res->text = 'Ошибка';
        }
        echo json_encode($res);
    break;
}

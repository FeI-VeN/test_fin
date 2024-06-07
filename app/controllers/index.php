<?php

/**
 * @var Db $db
*/

$offers = $db->query("SELECT * FROM offers")->findAll();

require_once VIEWS . '/index.php';

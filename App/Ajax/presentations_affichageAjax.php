<?php

define('ROOT', "../..");
define('CONFIG', ROOT . '/Config');
define('APP', ROOT . '/App');

require_once CONFIG . "/config.php";
require_once "../Classe/Database/Bootstrap.php";

$tabData = json_decode(file_get_contents("php://input"), true);
$user_id = $tabData['user_id'];

$tabPresentations = Presentation::where('user_id', $user_id)
    ->get();

echo json_encode($tabPresentations);
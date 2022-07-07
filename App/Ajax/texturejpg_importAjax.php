<?php

const ROOT = "../..";
const CONFIG = ROOT . '/Config';
const APP = ROOT . '/App';

require_once CONFIG . "/config.php";

$tabData = json_decode(file_get_contents("php://input"), true);
$id = intval($tabData['idUser']);

$img = $_FILES["img"]["name"];

if (!is_dir(APP . "/../uploads/" . $id)) {
    mkdir(APP . "/../uploads/" . $id, 0755);
}
move_uploaded_file($_FILES["img"]["tmp_name"], APP . "/../uploads/" . $id . "/" . $img);

<?php

const ROOT = "../..";
const CONFIG = ROOT . '/Config';
const APP = ROOT . '/App';

$tabData = json_decode(file_get_contents("php://input"), true);
$id = intval($tabData['idUser']);

if (!is_dir(APP . "/../uploads/" . $id)) {
    mkdir(APP . "/../uploads/" . $id, 0755);
}
$out = [];
foreach (glob(APP . "/../uploads/" . $id . "/*.html") as $filename) {
    $p = pathinfo($filename);
    $out[] = $p;
}
echo json_encode($out);
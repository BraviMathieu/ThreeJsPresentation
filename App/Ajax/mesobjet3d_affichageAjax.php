<?php

define('ROOT', "../..");
define('CONFIG', ROOT . '/Config');
define('APP', ROOT . '/App');
$out = array();
$id = $_POST["idUser"];
if (!is_dir(APP . "/../uploads/" . $id)) {
    mkdir(APP . "/../uploads/" . $id, 0755);
}
foreach (glob(APP . "/../uploads/" . $id . "/*.html") as $filename) {
    $p = pathinfo($filename);
    $out[] = $p;
}
echo json_encode($out);
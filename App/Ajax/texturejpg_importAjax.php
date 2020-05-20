<?php
define('ROOT', "../..");
define('CONFIG', ROOT . '/Config');
define('APP', ROOT . '/App');

require_once CONFIG."/config.php";

$id = $_POST["idUser"];
if(!is_dir(APP."/../uploads/".$id)){
    mkdir( APP."/../uploads/".$id, 0755);
}
$img = $_FILES["img"]["name"];
move_uploaded_file(  $_FILES["img"]["tmp_name"], APP."/../uploads/".$id."/".$img);

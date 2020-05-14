<?php
define('ROOT', "../..");
define('CONFIG', ROOT . '/Config');
define('APP', ROOT . '/App');

require_once CONFIG."/config.php";

$img = $_FILES["img"]["name"];
move_uploaded_file(  $_FILES["img"]["tmp_name"], APP."/../uploads/" . $img);

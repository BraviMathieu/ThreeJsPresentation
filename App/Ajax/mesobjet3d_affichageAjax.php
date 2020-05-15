<?php
define('ROOT', "../..");
define('CONFIG', ROOT . '/Config');
define('APP', ROOT . '/App');
$out = array();
foreach (glob(APP."/../uploads/*.html") as $filename){
    $p= pathinfo($filename);
    $out[] = $p;
}
echo json_encode($out);
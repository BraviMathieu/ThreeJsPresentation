<?php
define('ROOT', "../..");
define('CONFIG', ROOT . '/Config');
define('APP', ROOT . '/App');

require_once CONFIG."/config.php";
require_once "../Classe/Database/Bootstrap.php";

$user_id = $_POST['user_id'];
$new_presentation = $_POST['new_presentation'];

$id = $new_presentation[0]['id'];
$titre = $new_presentation[0]['title'];
$desc = $new_presentation[0]['description'];
$contents = $new_presentation[0]['contents'];
$thumbcontents = $new_presentation[0]['thumbcontents'];

$presentation = Presentation::where('id',$id)
  ->first();


if($presentation == null){

  $presentationobj = new Presentation;
  $presentationobj->title = $titre;
  $presentationobj->description = $desc;
  $presentationobj->contents = $contents;
  $presentationobj->thumbcontents = $thumbcontents;
  $presentationobj->user_id = $user_id;
  $presentationobj->save();

  echo 1;
}else{
  $presentation->title = $titre;
  $presentation->description = $desc;
  $presentation->contents = $contents;
  $presentation->thumbcontents = $thumbcontents;
  $presentation->user_id = $user_id;
  $presentation->save();

echo 2;
}




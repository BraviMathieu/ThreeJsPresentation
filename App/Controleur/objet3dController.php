<?php
use App\Session;

$user_id = Session::read('User.id');

$theme_editor = Configuration::where('code',"EDITOR_THEME")
  ->where('user_id',$user_id)
  ->first();

if($path == "/objet3d_creation"){
  $title = "Création d'objet 3D";

  include_once VUE . '/objet3d/objet3d_creation.php';
}
if($path == "/objet3d_import"){

    $file = $_FILES["objet"]["name"];
    move_uploaded_file(  $_FILES["objet"]["tmp_name"], APP."/../uploads/" . $file);
}
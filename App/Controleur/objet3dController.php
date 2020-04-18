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
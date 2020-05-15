<?php
use App\Session;

$user_id = Session::read('User.id');

$theme_editor = Configuration::where('code',"EDITOR_THEME")
  ->where('user_id',$user_id)
  ->first();

if($path == "/main_configuration"){
  $title = "Configuration";
  $user_id = Session::read('User.id');

  if(isset($_POST['envoyer'])){
    $theme = $_POST['theme'];
    $theme_editor->value = $theme;
    $theme_editor->save();
  }
  include_once VUE . "/configuration.php";
}
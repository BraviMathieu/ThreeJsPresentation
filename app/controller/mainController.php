<?php
use App\Session;

if($path == "/main_dashboard"){
  $title = "Dashboard";
  $user_id = Session::read('User.id');

  $tabPresentations = Presentation::where('user_id',$user_id)
    ->get();

  include_once VUE . '/home.php';

}elseif ($path == "/main_configuration"){
  $title = "Configuration";

  if(isset($_POST['envoyer'])){
    $theme = $_POST['theme'];
  }
  include_once VUE . '/configuration.php';
}
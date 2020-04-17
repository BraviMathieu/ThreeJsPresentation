<?php

use App\Alert;
use App\Session;

if($path == "/login"){
  if(isset($_POST['c_user'], $_POST['c_mdp'])){

    $user = $_POST['c_user'];
    $password = $_POST['c_mdp'];

    $user = User::where('name',$user)
      ->where('password',$password)
      ->first();

      if($user == null ){
        Alert::getInstance()->error("Identifiant ou mot de passe non valide");
      }else{
        Session::write('User', $user);
        Alert::getInstance()->success('Vous êtes connecté');
      }

      redirect('/public/main_dashboard');
  }
  include_once VUE . '/login.php';
}
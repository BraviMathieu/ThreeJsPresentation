<?php

use App\Alert;
use App\Model\Table\UserTable;
use App\Session;

if($path == "/login"){
  if(isset($_POST['user'], $_POST['password'])){

      $user = $_POST['user'];
      $password = $_POST['password'];
      $UserTable = new UserTable();
      $user = $UserTable->getUser($user, $password);
      if ($user){
          Session::write('User', $user);
          Alert::getInstance()->success('Vous êtes connecté');
      }else{
          Alert::getInstance()->error("Identifiant ou mot de passe non valide");
      }
      redirect('/public/main_dashboard');
  }

  include_once VUE . '/login.php';
}
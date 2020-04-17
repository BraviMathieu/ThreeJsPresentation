<?php

use App\Alert;
use App\Session;

if($path == "/login"){
  //LOGIN
  if(isset($_POST['c_user'], $_POST['c_mdp'])){

    $user = $_POST['c_user'];
    $password = $_POST['c_mdp'];

    $user = User::where('name',$user)
      ->where('password',$password)
      ->first();

      if($user == null ){
        Alert::getInstance()->error("Identifiant ou mot de passe non valide.");
      }else{
        Session::write('User', $user);
        Alert::getInstance()->success('Vous êtes connecté.');
      }

      redirect('/public/main_dashboard');
  }
  //REGISTER
  if(isset($_POST['r_user'], $_POST['r_mdp'], $_POST['r_mdp_bis'])){

    $user_name    = trim($_POST['r_user']);
    $password     = $_POST['r_mdp'];
    $password_bis = $_POST['r_mdp_bis'];

    if($password != $password_bis){
      Alert::getInstance()->error("Les mots de passe sont différents.");
      redirect('/public/login');
    }

    //Vérification si utilisateur existe deja
    $user = User::where('name',$user)
      ->first();

    if($user != null){
      Alert::getInstance()->error("Identifiant déjà utilisé.");
      redirect('/public/login');
    }

    //Création de l'utilisateur
    User::Create(['name' => $user_name, 'password' => $password]);
    Alert::getInstance()->success("Utilisateur créé.");

  }
  include_once VUE . '/login.php';
}

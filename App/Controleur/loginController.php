<?php

use App\Alert;
use App\Session;

if($path == "/login"){
  //REDIRECTION SI CONNECTÉ
  if(Session::read('User') != null) redirect('presentation_creation');

  //LOGIN
  if(isset($_POST['c_user'], $_POST['c_mdp'])){

    //Récupération des variables
    $user = $_POST['c_user'];
    $password = $_POST['c_mdp'];

    // Vérification du mot de passe
    $pepper = PASSWORD_PEPPER;
    $pwd_peppered = hash_hmac("sha256", $password, $pepper);

    $user = User::where('name',$user)
      ->first();

    if(password_verify($pwd_peppered, $user->password)) {
      Session::write('User', $user);
      Alert::getInstance()->success('Vous êtes connecté.');
      redirect('presentation_creation');
    }else{
      Alert::getInstance()->error("Identifiant ou mot de passe non valide.");
      redirect('login');
    }
  }

  //REGISTER
  if(isset($_POST['r_user'], $_POST['r_mdp'], $_POST['r_mdp_bis'])){

    //Récupération des variables
    $user_name    = trim($_POST['r_user']);
    $password     = $_POST['r_mdp'];
    $password_bis = $_POST['r_mdp_bis'];

    if($password != $password_bis){
      Alert::getInstance()->error("Les mots de passe sont différents.");
      redirect('login');
    }

    //Vérification si utilisateur déjà existant
    $user = User::where('name',$user_name)
      ->first();
    if($user != null){
      Alert::getInstance()->error("Utilisateur déjà existant.");
      redirect('login');
    }

    //Chiffrement du mot de passe
    $pepper = PASSWORD_PEPPER;
    $pwd_peppered = hash_hmac("sha256", $password, $pepper);
    $pwd_hashed = password_hash($pwd_peppered, PASSWORD_ARGON2ID);

    //Création de l'utilisateur
    User::Create(['name' => $user_name, 'password' => $pwd_hashed]);
    Alert::getInstance()->success("Utilisateur créé.");
    redirect('login');
  }
  include_once VUE . '/login.php';
}

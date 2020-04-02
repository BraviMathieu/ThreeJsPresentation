<?php

use App\Alert;
use App\Session;


$user_id = Session::read('User.id');

//Récupération du theme
$theme_editor = Configuration::where('code',"EDITOR_THEME")
  ->where('user_id',$user_id)
  ->first();


if($path == "/presentation_visualisation"){
  $title = "Visualisation d'une présentation";

  $presentation_id = $_GET['presentation_id'];
  $titre = $_GET['title'];


  //Vérification si le user a le droit a la ressource
  $presentation = Presentation::where('user_id',$user_id)
    ->where('id',$presentation_id)
    ->where('title',$titre)
    ->first();

  if($presentation == null){
      Alert::getInstance()->error("Ressource non autorisée !");
      redirect('/public/main_dashboard');
  }else{
      $pathToPresentation = "/Presentation/$user_id/$titre.html";
      include_once VUE . '/Presentation/presentation_visualisation.php';
  }

}elseif($path == "/presentation_suppression"){

  $presentation_id = $_GET['presentation_id'];
  $titre = $_GET['title'];

  //Vérification si le user a le droit a la ressource
  $presentation = Presentation::where('user_id',$user_id)
    ->where('id',$presentation_id)
    ->where('title',$titre)
    ->first();

  if($presentation == null){
      Alert::getInstance()->error("Ressource non autorisée.");
      redirect('/public/main_dashboard');
  }else{
    //Suppression dans la BDD et du fichier
    $presentation = Presentation::where('user_id',$user_id)
      ->where('id',$presentation_id)
      ->where('title',$titre)
      ->delete();

      unlink(APP . "/../Presentation/$user_id/$titre.html");

      Alert::getInstance()->success('La présentation à été supprimée.');
      redirect('/public/main_dashboard');
  }

}elseif($path == "/presentation_creation"){
  $title = "Création d'une présentation";

  $pathToPresentation = "/Presentation/template.html";

  //Si envoi de fichier
  if(isset($_POST['envoyer'])){
    $code = $_POST['code'];

    $titre = $_POST['titre'];
    //Eviter de sortir du dossier
    $charToReplace = ['/','\\'];
    $titre = str_replace($charToReplace,"",$titre);

    //Vérification si le fichier existe
    if(file_exists( "../presentation/".$user_id."/".$titre.".html")){
        Alert::getInstance()->error('La présentation éxiste déjà.');
        redirect('/public/Presentation/presentation_creation');
    }

    $pathToNewPresentation = "/Presentation/".$user_id."/".$titre.".html";

    $checkWrite = file_put_contents("../".$pathToNewPresentation, $code);
    if($checkWrite === false){
        Alert::getInstance()->error('Veuillez entrer un titre sans caractères spéciaux.');
        redirect('/public/Presentation/presentation_creation');
    }

    $user = Presentation::Create(['title' => $titre, 'user_id' => $user_id]);
    Alert::getInstance()->success('Présentation créée.');
    redirect('/public/main_dashboard');
  }
  $contenuFichier = file_get_contents("../".$pathToPresentation);
  include_once VUE . '/Presentation/presentation_creation.php';

}elseif($path == "/presentation_modification"){
  $title = "Modification d'une présentation";

  $presentation_id = $_GET['presentation_id'];
  $titre = $_GET['title'];

  //Vérification si le user a le droit a la ressource
  $presentation = Presentation::where('user_id',$user_id)
    ->where('id',$presentation_id)
    ->where('title',$titre)
    ->first();

  //Récupération du theme
  $theme_editor = Configuration::where('code',"EDITOR_THEME")
    ->where('user_id',$user_id)
    ->first();


  if($presentation == null){
      Alert::getInstance()->error("Ressource non autorisée.");
      redirect('/public/main_dashboard');
  }else{
      $pathToPresentation = "/Presentation/$user_id/$titre.html";

      //Si envoi de fichier
      if(isset($_POST['envoyer'])){
          $code = $_POST['code'];
          file_put_contents("../".$pathToPresentation, $code);
      }
      $contenuFichier = file_get_contents("../".$pathToPresentation);
      include_once VUE . '/Presentation/presentation_modification.php';
  }
}
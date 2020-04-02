<?php

use App\Alert;
use App\Model\Table\PresentationTable;
use App\Session;

if($path == "/presentation_visualisation"){
  $title = "Visualisation d'une présentation";

  $presentation_id = $_GET['presentation_id'];
  $titre = $_GET['title'];
  $user_id = Session::read('User.id');

  //Vérification si le user a le droit a la ressource
  $presentationTable = new PresentationTable();
  $result = $presentationTable->getByUserId($user_id, $presentation_id);

  if($result->nb == 0){
      Alert::getInstance()->error("Ressource non autorisée !");
      redirect('/public/main_dashboard');
  }else{
      $pathToPresentation = "/presentation/$user_id/$titre.html";
      include_once VUE . '/presentation_visualisation.php';
  }

}elseif($path == "/presentation_suppression"){

  $presentation_id = $_GET['presentation_id'];
  $titre = $_GET['title'];
  $user_id = Session::read('User.id');

  //Vérification si le user a le droit a la ressource
  $presentationTable = new PresentationTable();
  $result = $presentationTable->getByUserId($user_id, $presentation_id);

  if($result->nb == 0){
      Alert::getInstance()->error("Ressource non autorisée.");
      redirect('/public/main_dashboard');
  }else{
      //Suppression dans la BDD et du fichier
      $presentationTable->deleteOne($user_id, $presentation_id);
      unlink(APP . "/../presentation/$user_id/$titre.html");

      Alert::getInstance()->success('La présentation à été supprimée.');
      redirect('/public/main_dashboard');
  }
}elseif($path == "/presentation_creation"){
  $title = "Création d'une présentation";

  $user_id = Session::read('User.id');

  $pathToPresentation = "/presentation/template.html";
  //Si envoi de fichier
  if(isset($_POST['envoyer'])){
      $presentationTable = new PresentationTable();
      $titre = $_POST['titre'];

      //Eviter de sortir du dossier
      $charToReplace = ['/','\\'];
      $titre = str_replace($charToReplace,"",$titre);

      $code = $_POST['code'];
      if(file_exists( "../presentation/".$user_id."/".$titre.".html")){
          Alert::getInstance()->error('La présentation éxiste déjà.');
          redirect('/public/presentation_creation');
      }
      $pathToNewPresentation = "/presentation/".$user_id."/".$titre.".html";
      $checkWrite = file_put_contents("../".$pathToNewPresentation, $code);
      if($checkWrite === false){
          Alert::getInstance()->error('Veuillez entrer un titre sans caractères spéciaux.');
          redirect('/public/presentation_creation');
      }
      $presentationTable->insertPresentation($user_id,$titre);
      redirect('/public/main_dashboard');
  }

  $contenuFichier = file_get_contents("../".$pathToPresentation);
  include_once VUE . '/presentation_creation.php';

}elseif($path == "/presentation_modification"){
  $title = "Modification d'une présentation";

  $presentation_id = $_GET['presentation_id'];
  $titre = $_GET['title'];
  $user_id = Session::read('User.id');

  //Vérification si le user a le droit a la ressource
  $presentationTable = new PresentationTable();
  $result = $presentationTable->getByUserId($user_id, $presentation_id);

  if($result->nb == 0){
      Alert::getInstance()->error("Ressource non autorisée !");
      redirect('/public/main_dashboard');
  }else{
      $pathToPresentation = "/presentation/$user_id/$titre.html";

      //Si envoi de fichier
      if(isset($_POST['envoyer'])){
          $code = $_POST['code'];
          file_put_contents("../".$pathToPresentation, $code);
      }
      $contenuFichier = file_get_contents("../".$pathToPresentation);
      include_once VUE . '/presentation_modification.php';
  }
}
<?php

use App\Alert;
use App\Session;

$user_id = Session::read('User.id');

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

}elseif($path == "/presentation_creation_old"){
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

    Presentation::Create(['title' => $titre, 'user_id' => $user_id]);
    Alert::getInstance()->success('Présentation créée.');
    redirect('/public/main_dashboard');
  }
  $contenuFichier = file_get_contents("../".$pathToPresentation);
  include_once VUE . '/Presentation/presentation_creation.php';

}elseif($path == "/presentation_creation"){

  $night_mode = Configuration::where('code',"NIGHT")
    ->where('user_id',$user_id)
    ->first();

  $title = "Création d'une présentation";
  include_once VUE . '/presentation/presentation_main.php';

}elseif($path == "/presentation_modification"){
  $title = "Modification d'une présentation";

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
    $pathToPresentation = "/Presentation/$user_id/$titre.html";
    $contenuFichier = file_get_contents("../".$pathToPresentation);
    include_once VUE . '/Presentation/presentation_modification.php';
  }

}elseif($path == "/presentation_modification_ajax"){

  $presentation_id = $_GET['presentation_id'];
  $titre = $_GET['title'];

  $pathToPresentation = "/Presentation/$user_id/$titre.html";

  //Si envoi de fichier
  $code = $_POST['data'];
  file_put_contents("../".$pathToPresentation, $code);

  $contenuFichier = file_get_contents("../".$pathToPresentation);

  return $contenuFichier;

}elseif($path == "/presentation_suppression_ajax"){

  $presentation_id = intval($_POST['presentation_id']);

  //Vérification si le user a le droit a la ressource
  $presentation = Presentation::where('user_id',$user_id)
    ->where('id',$presentation_id)
    ->first();

  if($presentation == null){
    return false;
  }else{
    //Suppression dans la BDD et du fichier
    Presentation::where('user_id',$user_id)
      ->where('id',$presentation_id)
      ->delete();

    $titre = $presentation->title;

    unlink(APP . "/../Presentation/$user_id/$titre.html");
    return true;
  }
}elseif($path == "/presentation_modification_ajout"){
    $presentation_id = $_GET['presentation_id'];
    $titre = $_GET['title'];

    // Nom du fichier à ouvrir
    $fichier = file("..\..\Presentation\\" + $presentation_id + "\\" + $titre);
    // Nombre total de ligne du fichier
    $total = count($fichier);

    for($i = 0; $i < $total; $i++) {
        // On affiche ligne par ligne le contenu du fichier
        // avec la fonction nl2br pour ajouter les sauts de lignes
        echo nl2br($fichier[$i]);
    }

    // OU en ayant les numéros de ligne et l'ajout des sauts de lignes

    // Affiche toute les lignes du tableau
    // avec les numéros de ligne
    foreach ($fichier as $line_num => $line) {
        echo "Ligne #<b>{$line_num}</b> : " . htmlspecialchars($line) .
            "<br />\n";
    }

}
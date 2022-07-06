<?php

use App\Alert;
use App\Session;

$user_id = Session::read('User.id');

$theme_editor = Configuration::where('code', "EDITOR_THEME")
    ->where('user_id', $user_id)
    ->first();

if ($path == "/presentation_creation") {
    if ($user_id == null) {
        Session::destroy();
    }


    $night_mode = Configuration::where('code', "NIGHT")
        ->where('user_id', $user_id)
        ->first();

    $title = "Création d'une présentation";
    include_once VUE . '/presentation/presentation_main.php';
} elseif ($path == "/presentation_modification") {
    $title = "Modification d'une présentation";

    $presentation_id = $_GET['presentation_id'];
    $titre = $_GET['title'];

    //Vérification si le user a le droit a la ressource
    $presentation = Presentation::where('user_id', $user_id)
        ->where('id', $presentation_id)
        ->where('title', $titre)
        ->first();

    if ($presentation == null) {
        Alert::getInstance()->error("Ressource non autorisée.");
        redirect('main_dashboard');
    } else {
        $pathToPresentation = "/Presentation/$user_id/$titre.html";
        $contenuFichier = file_get_contents("../" . $pathToPresentation);
        include_once VUE . '/Presentation/presentation_modification.php';
    }
} elseif ($path == "/presentation_telecharger") {
    $ficher_nom = pathinfo($_GET['nom_ficher']);

    header("Content-type: application/zip");
    header("Content-Disposition: attachment; filename=" . $ficher_nom['filename'] . ".tmp");
    header("Pragma: no-cache");
    header("Expires: 0");
    readfile(sys_get_temp_dir() . DIRECTORY_SEPARATOR . $ficher_nom['basename']);
    die();
}
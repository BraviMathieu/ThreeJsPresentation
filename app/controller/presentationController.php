<?php

use App\Alert;
use App\Model\Table\PresentationTable;
use App\Session;

if($path == "/presentation_visualisation"){

    $presentation_id = $_GET['presentation_id'];
    $user_id = Session::read('User.id');

    //Vérification si le user a le droit a la ressource
    $presentationTable = new PresentationTable();
    $result = $presentationTable->getByUserId($user_id, $presentation_id);

    if($result->nb == 0){
        Alert::getInstance()->error("Ressource non autorisée !");
        redirect('/public/main_dashboard');
    }else{
        $pathToPresentation = "/presentation/$user_id/$presentation_id.html";
        include_once VUE . '/presentation_visualisation.php';
    }

}elseif($path == "/presentation_suppression"){

    $presentation_id = $_GET['presentation_id'];
    $user_id = Session::read('User.id');

    //Vérification si le user a le droit a la ressource
    $presentationTable = new PresentationTable();
    $result = $presentationTable->getByUserId($user_id, $presentation_id);

    if($result->nb == 0){
        Alert::getInstance()->error("Ressource non autorisée !");
        redirect('/public/main_dashboard');
    }else{
        //Suppression dans la BDD et du fichier
        $presentationTable->deleteOne($user_id, $presentation_id);
        unlink(APP . "/../presentation/$user_id/$presentation_id.html");

        Alert::getInstance()->success('La présentation à été supprimée.');
        redirect('/public/main_dashboard');
    }
}elseif($path == "/presentation_creation"){

    $user_id = Session::read('User.id');
    $pathToPresentation = "/presentation/template.html";

    //Si envoi de fichier
    if(isset($_POST['envoyer'])){
        /*
        $code = $_POST['code'];
        file_put_contents("../".$pathToPresentation, $code);
        */
    }

    $contenuFichier = file_get_contents("../".$pathToPresentation);
    include_once VUE . '/presentation_creation.php';

}elseif($path == "/presentation_modification"){

    $presentation_id = $_GET['presentation_id'];
    $user_id = Session::read('User.id');

    //Vérification si le user a le droit a la ressource
    $presentationTable = new PresentationTable();
    $result = $presentationTable->getByUserId($user_id, $presentation_id);

    if($result->nb == 0){
        Alert::getInstance()->error("Ressource non autorisée !");
        redirect('/public/main_dashboard');
    }else{
        $pathToPresentation = "/presentation/$user_id/$presentation_id.html";

        //Si envoi de fichier
        if(isset($_POST['envoyer'])){
            $code = $_POST['code'];
            file_put_contents("../".$pathToPresentation, $code);
        }
        $contenuFichier = file_get_contents("../".$pathToPresentation);
        include_once VUE . '/presentation_modification.php';
    }
}
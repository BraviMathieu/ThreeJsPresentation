<?php

use App\Alert;
use App\Model\Table\PresentationTable;
use App\Session;

if($path == "/presentation_visualisation"){

    $presentation_id = $_GET['presentation_id'];
    $user_id = Session::read('User.id');

    //TODO Vérifier si user_id = user_id connecté + si droit a la presentation_id
    $presentationTable = new PresentationTable();
    $result = $presentationTable->getByUserId($presentation_id);
    if ($result[0]->nb == 0){
        Alert::getInstance()->error("ressource non autrisé !");
        header('Location: /public/main_dashboard');
    }
    $pathToPresentation = "/presentation/$user_id/$presentation_id.html";
    include_once VUE . '/presentation_visualisation.php';

}elseif($path == "/presentation_suppression"){

    $presentation_id = $_GET['presentation_id'];
    $user_id = Session::read('User.id');

    //TODO Vérifier si user_id = user_id connecté + si droit a la suppression de  presentation_id



    $presentationTable = new PresentationTable();

    $result = $presentationTable->getByUserId($presentation_id);
    if ($result[0]->nb == 0){
        Alert::getInstance()->error("ressource non autrisé !");
        header('Location: /public/main_dashboard');
    }
    else {
        //Suppression dans la BDD et du fichier
        $presentationTable->deleteOne($presentation_id);
        unlink(APP . "/../presentation/$user_id/$presentation_id.html");

        Alert::getInstance()->success('La présentation à été supprimée.');

        header('Location: /public/main_dashboard');
        exit;
    }
}elseif($path == "/presentation_creation"){

    include_once VUE . '/presentation_creation.php';

}
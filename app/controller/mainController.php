<?php
use App\Model\Table\PresentationTable;

if($path == "/main_dashboard"){
    $presentationTable          = new PresentationTable();
    $tabPresentationsEnCours    = $presentationTable->getEnCours();
    $tabPresentationsAll        = $presentationTable->getAll();
    include_once VUE . '/home.php';
}
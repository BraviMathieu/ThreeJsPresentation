<?php
use App\Model\Table\PresentationTable;
use App\Session;

if($path == "/main_dashboard"){
    $presentationTable  = new PresentationTable();
    $tabPresentations   = $presentationTable->getAll();

    $user_id = Session::read('User.id');
    include_once VUE . '/home.php';
}
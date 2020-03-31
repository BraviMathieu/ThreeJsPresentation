<?php
use App\Model\Table\PresentationTable;
use App\Session;

if($path == "/main_dashboard"){

    $user_id = Session::read('User.id');

    $presentationTable  = new PresentationTable();
    $tabPresentations   = $presentationTable->getAll($user_id);

    include_once VUE . '/home.php';
}
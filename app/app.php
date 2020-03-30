<?php
namespace App;


require ROOT .'/vendor/autoload.php'; // on charge l'autoloader de Composer

$db = Database::getInstance();

ob_start();

$path = (isset($_SERVER['PATH_INFO']))?$_SERVER['PATH_INFO']:'/';

if($path != '/login'){
    if(!Session::read('User.id')){
        header("Location: /public/login"); // redirection si l'utilisateur n'est pas connecté
        exit();
    }
    include APP . '/template/inc/nav_menu.php';
}

echo Alert::display();

if(startsWith($path,"/main_")){
    include_once CONTROLLER . '/mainController.php';
}
elseif(startsWith($path,"/presentation_")){
    include_once CONTROLLER . '/presentationController.php';
}
elseif(startsWith($path,"/login")){
    include_once CONTROLLER . '/loginController.php';
}
elseif(startsWith($path,"/logout")){
    include_once CONTROLLER . '/logoutController.php';
}

if($path != '/login'){
    include APP . '/template/inc/footer.php';
}
//TODO On pourra inclure des conditions pour afficher une page 404 en cas de page inexistante.

$content = ob_get_clean();
include ROOT . '/app/template/default.php';
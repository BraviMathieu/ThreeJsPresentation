<?php
namespace App;

// cet autoloader a été désactivé car on utilisera l'autoloader fournis par Composer
spl_autoload_register(function ($class){
    $class = str_replace('\\', '/', $class);
    if(preg_match("/App/", $class)){
        include APP . '/class/' . str_replace('App/', '', $class) . '.php';
    }else{
        include ROOT . '/' . $class . '.php';
    }

});

require ROOT .'/vendor/autoload.php'; // on charge l'autoloader de Composer

$db = Database::getInstance();

ob_start();

$path = (isset($_SERVER['PATH_INFO']))?$_SERVER['PATH_INFO']:'/';

if($path != '/login'){
    if(!Session::read('User.id')){
        header("Location: /public/login"); // redirection si l'utilisateur n'est pas connecté
        exit();
    }
    include APP . '/template/inc/header.inc.php';
    include APP . '/template/inc/nav_menu.inc.php';
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

//TODO On pourra inclure des conditions pour afficher une page 404 en cas de page inexistante.

if($path != '/login'){
    include APP . '/template/inc/footer.inc.php';
}

$content = ob_get_clean();

include ROOT . '/app/template/default.php';
<?php
namespace App;

ob_start();

$path = (isset($_SERVER['PATH_INFO']))?$_SERVER['PATH_INFO']:'/';

if($path != '/login' && $path != '/presentation_visualisation'){
  if(!Session::read('User.id')){
    header("Location: /public/login"); // redirection si l'utilisateur n'est pas connecté
    exit();
  }
  include_once APP . '/Template/inc/nav_menu.php';
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
elseif(startsWith($path,"/objet3d_")){
  include_once CONTROLLER . '/objet3dController.php';
}


if($path != '/login' && $path != '/presentation_visualisation'){
  include_once APP . '/Template/inc/footer.php';
}
//TODO On pourra inclure des conditions pour afficher une page 404 en cas de page inexistante.

$content = ob_get_clean();

if($path != '/login') {
  include_once APP . '/Template/default.php';
}else{
  include_once APP . '/Template/inc/default_login.php';
}
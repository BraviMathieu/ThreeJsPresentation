<?php
namespace App;

ob_start();

$path = (isset($_SERVER['PATH_INFO']))?$_SERVER['PATH_INFO']:'/';

if($path != '/login' && $path != '/presentation_visualisation' && $path != '/presentation_creation_new' && !strpos($path, 'ajax')){
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


if($path != '/login' && $path != '/presentation_visualisation' && $path != '/presentation_creation_new' && !strpos($path, 'ajax')){
  include_once APP . '/Template/inc/footer.php';
}

$content = ob_get_clean();

if($path == '/presentation_creation_new'){
  include_once APP . '/Template/default_presentation.php';
}elseif($path == '/login'){
  include_once APP . '/Template/default_login.php';
}elseif($path != '/login' && !strpos($path, 'ajax')) {
  include_once APP . '/Template/default.php';
}
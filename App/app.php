<?php

namespace App;

ob_start();

$path = $_SERVER['REDIRECT_URL'] ?? "/presentation_creation";

$path = str_replace("/ThreeJS_Presentation", "", $path);

if ($path != '/login' && $path != '/logout' && $path != '/presentation_creation' && !strpos($path, 'ajax')) {
    if (!Session::read('User.id')) {
        redirect("login"); // redirection si l'utilisateur n'est pas connecté
        exit();
    }
}

if (startsWith($path, "/main_")) {
    include_once CONTROLLER . '/mainController.php';
} elseif (startsWith($path, "/presentation_")) {
    include_once CONTROLLER . '/presentationController.php';
} elseif (startsWith($path, "/login")) {
    include_once CONTROLLER . '/loginController.php';
} elseif (startsWith($path, "/logout")) {
    include_once CONTROLLER . '/logoutController.php';
}

$content = ob_get_clean();

if ($path == '/presentation_creation') {
    include_once APP . '/Template/template_presentation.php';
} elseif ($path == '/login') {
    include_once APP . '/Template/template_login.php';
} elseif ($path != '/login' && !strpos($path, 'ajax')) {
    include_once APP . '/Template/template_presentation.php';
}
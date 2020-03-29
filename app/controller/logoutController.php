<?php
use App\Session;

if($path == "/logout"){
    Session::destroy(); // La page logout n'aura pas d'affichage et redirigera automatiquement sur l'accueil après la destruction de la session
}

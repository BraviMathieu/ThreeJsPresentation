<?php
define('ROOT', "../..");
define('CONFIG', ROOT . '/Config');
define('APP', ROOT . '/App');

require_once CONFIG."/config.php";
require_once "../Classe/Database/Bootstrap.php";

$presentation_id = intval($_POST['presentation_id']);

//Vérification si le user a le droit a la ressource
$presentation = Presentation::where('id',$presentation_id)
->first();

if($presentation == null){
  echo 0;
}else{
  //Suppression dans la BDD et du fichier
  Presentation::where('id', $presentation_id)
    ->delete();
  //unlink(APP . "/../Presentation/$user_id/$titre.html");
  echo 1;
}
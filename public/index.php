<?php

define('ROOT', dirname(__DIR__));
define('WEBROOT', ROOT . '/public');
define('CONFIG', ROOT . '/Config');
define('APP', ROOT . '/App');
define('VUE', APP . '/Vue');
define('CONTROLLER', APP . '/Controleur');

require_once CONFIG."/config.php";
require_once CONFIG."/utils.php";
require_once APP . "/Classe/Database/Bootstrap.php";
require_once APP ."/app.php";
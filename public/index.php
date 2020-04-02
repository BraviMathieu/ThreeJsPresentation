<?php

define('ROOT', dirname(__DIR__));
define('WEBROOT', ROOT . '/public');
define('CONFIG', ROOT . '/config');
define('APP', ROOT . '/App');
define('VUE', APP . '/vue');
define('CONTROLLER', APP . '/controller');

require_once CONFIG."/config.php";
require_once CONFIG."/utils.php";
require_once APP . "/Class/Database/Bootstrap.php";
require_once APP ."/app.php";
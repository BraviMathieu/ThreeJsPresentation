<?php

define('ROOT', dirname(__DIR__));
define('WEBROOT', ROOT . '/public');
define('APP', ROOT . '/app');
define('VUE', ROOT . '/app/vue');
define('CONTROLLER', ROOT . '/app/controller');
define('LIB', ROOT . '/public/lib');

require_once(ROOT."/config/config.php");
require_once(ROOT."/config/utils.php");
require_once APP . '/app.php';

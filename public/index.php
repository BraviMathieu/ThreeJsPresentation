<?php

define('ROOT', dirname(__DIR__));
define('APP', ROOT . '/app');
define('WEBROOT', ROOT . '/public');
define('VUE', ROOT . '/app/vue');
define('CONTROLLER', ROOT . '/app/controller');

require_once(ROOT."/config/config.php");
require_once(ROOT."/config/utils.php");
require_once APP . '/app.php';

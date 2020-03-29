<?php

define('ROOT', dirname(__DIR__));
define('APP', ROOT . '/App');
define('WEBROOT', ROOT . '/public');

require_once(ROOT."/config/config.php");
require_once(ROOT."/config/utils.php");
require_once APP . '/app.php';

<?php

require ROOT . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    "driver" => MSQL_DB_DRIVER,
    "host" => MSQL_DB_HOST,
    "database" => MSQL_DB_NAME,
    "username" => MSQL_DB_USER,
    "password" => MSQL_DB_PASSWORD
]);

//Make this Capsule instance available globally.
$capsule->setAsGlobal();

// Setup the Eloquent ORM.
$capsule->bootEloquent();

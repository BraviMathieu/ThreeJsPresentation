<?php

require ROOT . '/vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('presentations', function ($table) {
  $table->increments('id');
  $table->integer('user_id')->unsigned();
  $table->string('title');
  $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

});
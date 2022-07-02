<?php

use App\Session;

$user_id = Session::read('User.id');

$theme_editor = Configuration::where('code', "EDITOR_THEME")
    ->where('user_id', $user_id)
    ->first();


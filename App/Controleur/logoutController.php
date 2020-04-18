<?php
use App\Session;

if($path == "/logout"){
  Session::destroy();
}

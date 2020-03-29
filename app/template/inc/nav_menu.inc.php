<?php
use App\Session;
?>
<aside>
    <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered">
                <a href="#"><img src="/public/.<?= Session::read("User.avatar") ?>" class="img-circle" width="80"></a>
            </p>
            <h5 class="centered"><?= Session::read('User.name') ?></h5>
            <li class="mt">
                <a href="/public/">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="mt">
                <a href="/public/todo-list">
                    <i class="fa fa-list"></i>
                    <span>TODO Présentation</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
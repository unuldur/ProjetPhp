<?php


    require_once(__DIR__.'/Config/config.php');
    include_once (__DIR__.'/Config/Autoload.php');
    Autoload::charger();
    Autoload::_autoload('FrontController');


    session_start();
    Autoload::_autoload('ModeleAdmin');
    Autoload::_autoload('Validation');
    $admin = ModeleAdmin::isAdmin();

    $cont = new FrontController($admin);

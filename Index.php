<?php


    require_once(__DIR__.'/Config/config.php');
    include_once (__DIR__.'/Config/Autoload.php');
    Autoload::charger();
    Autoload::_autoload('FrontController');
    $cont = new FrontController();

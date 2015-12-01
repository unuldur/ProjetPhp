<?php

    require_once(__DIR__.'/Config/config.php');
    include_once (__DIR__.'/Config/Autoload.php');
    Autoload::charger();
    $cont = new controlleur();
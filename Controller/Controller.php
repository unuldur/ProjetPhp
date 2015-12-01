<?php

/**
 * Created by PhpStorm.
 * User: PAYS
 * Date: 01/12/2015
 * Time: 12:35
 */
class Controller
{

    function __construct()
    {
        Autoload::_autoload('Validation');
        Autoload::_autoload('News');
        try{
            $action = $_REQUEST['action'];

        }catch (Exception $e)
        {
            $erreur[]="Erreur ! Un probleme est survenu";
            $vues['']
        }
    }
}
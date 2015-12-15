<?php

/**
 * Created by PhpStorm.
 * User: PAYS
 * Date: 15/12/2015
 * Time: 08:25
 */
class FrontController
{
    function __construct()
    {
        session_start();
        Autoload::_autoload("Controller");
        $actionVisiteur = ["toFormulaire","toNew"];
        $actionAdmin=[];

        try{
            if(isset($_REQUEST['action']))
                $action = $_REQUEST['action'];
            else
                $action = NULL;

            if(in_array($action,$actionAdmin))
            {

            }
            else
            {
                if(in_array($action,$actionVisiteur) || $action==NULL)
                {
                    new Controller();
                }
                else
                {
                    $tabError[]="Error 404 page not found";
                    require(__DIR__."/../Vue/Erreur.php");
                }
            }

        }catch (Exception $e)
        {
            $tabError[]=$e->getMessage();
            require(__DIR__."/../Vue/Erreur.php");
        }
    }

}
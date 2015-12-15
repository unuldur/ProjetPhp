<?php

/**
 * Created by PhpStorm.
 * User: PAYS
 * Date: 15/12/2015
 * Time: 08:25
 */
class FrontController
{
    function __construct($admin)
    {
        Autoload::_autoload("Controller");
        Autoload::_autoload("ControllerAdmin");
        $actionVisiteur = ["toFormulaire","toNew","connection","addCom"];
        $actionAdmin=["addNew","toCreerNew","deconnection"];
        Autoload::_autoload('Modele');

        try{

            if(isset($_REQUEST['action']))
                $action = $_REQUEST['action'];
            else
                $action = NULL;

            if(in_array($action,$actionAdmin))
            {
                if($admin)
                    new ControllerAdmin();
                else
                    require (__DIR__."/../Vue/Formulaire.php");
            }
            else
            {
                if(in_array($action,$actionVisiteur) || $action==NULL)
                {
                    new Controller($admin);
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
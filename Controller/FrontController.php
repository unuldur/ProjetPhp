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
        Autoload::_autoload("ControllerAdmin");
        Autoload::_autoload('Modele');
        Autoload::_autoload('ModeleAdmin');
        Autoload::_autoload('ModeleCommentaires');
        Autoload::_autoload('Validation');

        $mod = new Modele();
        $moda = new ModeleAdmin();
        $modc = new ModeleCommentaires();

        $actionVisiteur = ["toFormulaire","toNew","connection","addCom"];
        $actionAdmin=["addNew","toCreerNew","deconnection","delNew"];


        try{

            if(isset($_REQUEST['action']))
                $action = $_REQUEST['action'];
            else
                $action = NULL;

            $admin = ModeleAdmin::isAdmin();

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
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
        global $rep,$vues;
        session_start();

        Autoload::_autoload('Validation');
        Autoload::_autoload('Modele');
        try{
            if(isset($_REQUEST['action']))
                $action = $_REQUEST['action'];
            else
                $action = NULL;
            switch($action)
            {
                case NULL:
                    $this->Accueil();
                    break;
                case "toFormulaire":
                    $this->toFormulaire();
                    break;
                case "toCreerNew":
                    $this->toCreerNew();
                    break;
                case "toNew":
                    $this->toNew();
                    break;
                default:
                    $tabError[]="Erreur 404! Page Not Found";
                    require(__DIR__."/../Vue/Erreur.php");
                    break;
            }
        }catch (Exception $e)
        {
            $tabError[]="Erreur ! Un probleme est survenu";
            require(__DIR__."/../Vue/Erreur.php");
        }
    }

    function Accueil()
    {
        $mod = new Modele();
        $newsTab = $mod->allNews();
        require(__DIR__."/../Vue/Accueil.php");

    }

    function toFormulaire()
    {
        require(__DIR__."/../Vue/Formulaire.php");
    }

    function toCreerNew()
    {
        require(__DIR__."/../Vue/CreerNew.php");
    }

    function toNew()
    {
        $mod = new Modele();
        if(!isset($_REQUEST['page']))
            $idNew = 1;
        else
            $idNew = $_REQUEST['page'];
        if(!Validation::validateItem($idNew,'int'))
        {
            $tabError[]="Erreur 404! Page Not Found";
            require(__DIR__."/../Vue/Erreur.php");
        }
        else
        {
            $idNew = Validation::SanitizeItem($idNew,'int');
            $new = $mod->findOneNews($idNew);
            if(isset($new)) {
                require(__DIR__ . "/../Vue/New.php");
            }
            else
            {
                $tabError[]="Erreur 404! Page Not Found";
                require(__DIR__."/../Vue/Erreur.php");
            }
        }

    }
}
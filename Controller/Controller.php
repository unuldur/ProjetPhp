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

        Autoload::_autoload('Validation');
        Autoload::_autoload('Modele');
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
                case "addNew":
                    $this->addnew();
                    break;
                default:
                    $tabError[]="Erreur 404! Page Not Found";
                    require(__DIR__."/../Vue/Erreur.php");
                    break;
            }
    }

    function Accueil()
    {
        if(!isset($_REQUEST['page']))
            $pageActuelle = 1;
        else
            $pageActuelle = $_REQUEST['page'];
        $mod = new Modele();
        $nbNew = $mod->nbNews();
        $nbPage = ceil($nbNew/5);
        $newsTab = $mod->findNews(5,($pageActuelle-1)*5);
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

    function addNew()
    {
        $image = Validation::SanitizeItem($_POST["image"],'string');
        $titre = Validation::SanitizeItem($_POST["titre"],'string');
        $texte = Validation::SanitizeItem($_POST["texte"],'string');

        if(empty($titre) || empty($texte))
        {
            $oktitre = !empty($titre);
            $oktexte = !empty($texte);
            require(__DIR__."/../Vue/CreerNew.php");
        }
        else
        {
            $mod = new Modele();
            $mod->addNew($titre, $image, $texte);
            require(__DIR__."/../Vue/Valide.php");
        }
    }
}
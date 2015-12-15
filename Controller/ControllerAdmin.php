<?php

/**
 * Created by PhpStorm.
 * User: PAYS
 * Date: 15/12/2015
 * Time: 08:25
 */
class ControllerAdmin
{
    function __construct()
    {
        global $rep,$vues;



        if(isset($_REQUEST['action']))
            $action = $_REQUEST['action'];
        else
            $action = NULL;


        switch($action)
        {
            case "toCreerNew":
                $this->toCreerNew();
                break;
            case "addNew":
                $this->addnew();
                break;
            case "deconnection":
                $this->deconnection();
                break;
            default:
                $tabError[]="Erreur 404! Page Not Found";
                require(__DIR__."/../Vue/Erreur.php");
                break;
        }
    }

    function deconnection()
    {
        ModeleAdmin::deconnection();
        Controller::Accueil(false);
    }

    function toCreerNew()
    {
        $admin =true;
        require(__DIR__."/../Vue/CreerNew.php");
    }


    function addNew()
    {
        $admin = true;
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
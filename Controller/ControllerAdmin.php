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
            case "delNew":
                $this->delNew();
                break;
            case "delCom":
                $this->delCom();
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
        Controller::Accueil();
    }

    function toCreerNew()
    {
        if(!isset($oktitre)) $oktitre = true;
        if(!isset($oktexte)) $oktexte = true;
        if(!isset($titre)) $titre = "";
        if(!isset($texte)) $texte = "";
        $admin = true;
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
            Modele::addNew($titre, $image, $texte);
            require(__DIR__."/../Vue/Valide.php");
        }
    }

    function delNew()
    {
        $admin = true;
        $idNew = -1;
        if(isset($_REQUEST['id']))
            $idNew = $_REQUEST['id'];
        try{
            Modele::delNews($idNew);
            Controller::Accueil();
        }catch(Exception $e)
        {
            $tabError[]="Erreur lors de la suppression de la new !";
            require(__DIR__."/../Vue/Erreur.php");
        }
    }

    function delCom()
    {
        $admin = true;
        $idCom = -1;
        if(isset($_REQUEST['idCom']))
            $idCom = $_REQUEST['idCom'];
        try{
            ModeleCommentaires::delCom($idCom);
            header($_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
        }catch(Exception $e)
        {
            $tabError[]="Erreur lors de la suppression du commentaire !";
            require(__DIR__."/../Vue/Erreur.php");
        }
    }
}
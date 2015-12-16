<?php

/**
 * Created by PhpStorm.
 * User: PAYS
 * Date: 01/12/2015
 * Time: 12:35
 */
class Controller
{

    function __construct($admin)
    {
        global $rep,$vues;
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
                case "toNew":
                    $this->toNew();
                    break;
                case "connection":
                    $this->connection();
                    break;
                case "addCom":
                    $this->addCom();
                    break;
                default:
                    $tabError[]="Erreur 404! Page Not Found";
                    require(__DIR__."/../Vue/Erreur.php");
                    break;
            }
    }

    function connection()
    {
        $admin=false;
        $pseudo = Validation::SanitizeItem($_POST["pseudo"],'string');
        $mdp = Validation::SanitizeItem($_POST["mdp"],'string');
        if(empty($pseudo) || empty($mdp))
        {
            $okpseudo = !empty($pseudo);
            $okmdp = !empty($mdp);
            require(__DIR__."/../Vue/Formulaire.php");
        }
        else{
            ModeleAdmin::connection($pseudo,$mdp);
            if(ModeleAdmin::isAdmin())
                $this->Accueil();
            else
            {
                $okpseudo = false;
                $okmdp = false;
                require(__DIR__."/../Vue/Formulaire.php");
            }

        }
    }

    static function Accueil()
    {
        $admin = ModeleAdmin::isAdmin();
        if(!isset($_REQUEST['page']))
            $pageActuelle = 1;
        else
            $pageActuelle = $_REQUEST['page'];
        $nbNew = Modele::nbNews();
        $nbPage = ceil($nbNew/5);
        $newsTab = Modele::findNews(5,($pageActuelle-1)*5);
        require(__DIR__."/../Vue/Accueil.php");

    }

    function toFormulaire()
    {
        $admin = ModeleAdmin::isAdmin();
        $okpseudo =true;
        $okmdp = true;
        $pseudo ="";
        require(__DIR__."/../Vue/Formulaire.php");
    }

    function toNew()
    {
        $admin = ModeleAdmin::isAdmin();
        if(!isset($okpseeudo)) $okpseudo = true;
        if(!isset($oktexte)) $oktexte = true;
        if(!isset($pseudo)) $pseudo = "";
        if(!isset($texte)) $texte = "";
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
            $new = Modele::findOneNews($idNew);
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

    function addCom()
    {
        $admin = ModeleAdmin::isAdmin();
        $okpseudo =true;
        $oktexte = true;
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
            $new = Modele::findOneNews($idNew);
            if(!isset($new))
            {
                $tabError[]="Erreur 404! Page Not Found";
                require(__DIR__."/../Vue/Erreur.php");
            }
        }
        $pseudo = Validation::SanitizeItem($_POST["pseudo"],'string');
        $texte = Validation::SanitizeItem($_POST["texte"],'string');
        $infos = "Des infos";//TODO: Faire les infos
        if(empty($pseudo) || empty($texte))
        {
            $okpseudo = !empty($pseudo);
            $oktexte = !empty($texte);
        }
        else
        {
            ModeleCommentaires::addCom($pseudo, $infos, $texte, $idNew);
        }
        $this->toNew();
    }

}
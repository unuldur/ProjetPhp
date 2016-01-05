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

        $nbNew = Modele::nbNews();
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
            if(ModeleAdmin::isAdmin()) {
                $text = " Vous êtes connecté sous le pseudo " . $pseudo;
                require(__DIR__ . "/../Vue/Valide.php");
            }
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

        $nbNew = Modele::nbNews();
        $admin = ModeleAdmin::isAdmin();
        $okpseudo =true;
        $okmdp = true;
        $pseudo ="";
        require(__DIR__."/../Vue/Formulaire.php");
    }

    function toNew($okpseudo=true, $oktexte=true, $texte = "", $pseudo = "")
    {
        if(empty($pseudo) && isset($_COOKIE['pseudo']) && Validation::validateItem($_COOKIE['pseudo'],'pseudo'))
        {
            $pseudo = $_COOKIE['pseudo'];
        }

        $nbNew = Modele::nbNews();
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

        $nbNew = Modele::nbNews();
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
        if(isset($_COOKIE['nbCom']) && Validation::validateItem($_COOKIE['nbCom'], "int"))
        {
            $nbCom = $_COOKIE['nbCom'] +1;
            setcookie('nbCom',$nbCom,time()+2*12*31*24*3600);
        }
        else
        {
            $nbCom = 1;
            setcookie('nbCom',$nbCom,time()+2*12*31*24*3600);
        }
        $infos = "Le ".date("Y/m/d")." à ".date("H\hi:s")." Commentaires postés : ".$nbCom;
        $okpseudo = !empty($pseudo);
        $oktexte = !empty($texte);
        if($okpseudo && $oktexte)
        {
            if((!isset($_COOKIE['pseudo'])) || ($pseudo != Validation::SanitizeItem($_COOKIE['pseudo'], 'string')))
            {
                setcookie('pseudo',$pseudo,time()+31*24*3600);
            }
            ModeleCommentaires::addCom($pseudo, $infos, $texte, $idNew);
            $texte = "";
        }
        else
        {
            $nbCom --;
            setcookie('nbCom',$nbCom,time()+2*12*31*24*3600);
        }
        $this->toNew($okpseudo, $oktexte, $texte, $pseudo);
    }

}
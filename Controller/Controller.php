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
        session_start();

        Autoload::_autoload('Validation');
        Autoload::_autoload('News');
        try{

            $action = "toNew";
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
            }
        }catch (Exception $e)
        {
            $erreur[]="Erreur ! Un probleme est survenu";
        }
    }

    function Accueil()
    {
        $newsTab = [new News("News1", "Vue/Image/PlayerIl.png", "12/11/1996", "Un contenu certe un peu long mais c'est juste un test pour voir si celui ci marche ne serait ce que'un petit peu voila maintenat je suis content j'erit avec plein de fautes et beaucoup"
            , 1), new News("News2", "Vue/Image/", "45/45/45", "ahzcouaecauevuc", 2)];
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
        $newsTab = [new News("News1","Vue/Image/PlayerIl.png","12/11/1996","Un contenu certe un peu long mais c'est juste un test pour voir si celui ci marche ne serait ce que'un petit peu voila maintenat je suis content j'erit avec plein de fautes et beaucoup"
        ,1),new News("News2","Image/","45/45/45","ahzcouaecauevuc",2), new News("Titre de la new","Vue/Image/PlayerIl.png","10/01/2015","Paragraphe de l'article",3)];
        if(!isset($_GET['page']))
            $idNew = 1;
        else
            $idNew = $_GET['page'];
        $idNew = Validation::SanitizeItem($idNew,'int');
        if($idNew < 1)
            $idNew = 1;
        if($idNew > count($newsTab))
            $idNew = count($newsTab);
        $new = $newsTab[$idNew-1];
        require(__DIR__."/../Vue/New.php");
    }
}
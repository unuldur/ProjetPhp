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
        Autoload::_autoload('Validation');
        Autoload::_autoload('New');
        try{
            $action = $_REQUEST['action'];
            switch($action)
            {
                case 'NULL':
                    $this->Accueil();
                    break;
            }
        }catch (Exception $e)
        {
            $erreur[]="Erreur ! Un probleme est survenu";
        }
    }

    function Accueil()
    {
        $newsTab = [new News("News1", "Image/PlayerIl.png", "12/11/1996", "Un contenu certe un peu long mais c'est juste un test pour voir si celui ci marche ne serait ce que'un petit peu voila maintenat je suis content j'erit avec plein de fautes et beaucoup"
            , 1), new News("News2", "Image/", "45/45/45", "ahzcouaecauevuc", 2)];

        if (!empty($rep)) {
            if (!empty($vues)) {
                require($rep.$vues['Accueil']);
            }
        }
    }
}
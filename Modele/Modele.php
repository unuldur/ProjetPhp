<?php

/**
 * Created by PhpStorm.
 * User: PAYS
 * Date: 02/12/2015
 * Time: 14:17
 */
class Modele
{
    function __construct()
    {
        require_once(__DIR__ . '/../lib/vendor/doctrine/Doctrine.php');
        spl_autoload_register(array('Doctrine', 'autoload'));
        Autoload::_autoload('News');
        Autoload::_autoload('Commentaires');
        $dsn = 'mysql://root@localhost/projetphp';
        $connexion = Doctrine_Manager::connection($dsn);
    }

    function findNews($nbNews,$aPartirDe)
    {
        return Doctrine_Query::create()
            ->from('News')
            ->orderBy('date DESC')
            ->limit($nbNews)
            ->offset($aPartirDe)
            ->execute();
    }

    function findOneNews($id)
    {
        return Doctrine_Core::getTable('News')->find($id);
    }

    function nbNews()
    {
        return Doctrine_Core::getTable('News')->count();
    }

    public static function getResumer($text)
    {
        $positionDernierEspace = 0;
        if( strlen($text) >= 100 )
        {
            $text= substr($text,0,100);
            $positionDernierEspace = strrpos($text,' ');
            $text = substr($text,0,$positionDernierEspace).'...';
        }
        return $text;
    }

    function addNew($titre, $image, $texte)
    {
        $new = new News();
        $new->titre = $titre;
        $new->image = "Vue/Image/".$image;
        $new->contenu = $texte;
        $new->date = date("Y-m-d");
        $new->save();
    }

    function findComs($id)
    {
        return Doctrine_Query::create()
            ->from('News n')
            ->where('n.id == ?', $id)
            ->leftJoin('n.commentaires c')
            ->orderBy('id ASC')
            ->execute();
    }
}
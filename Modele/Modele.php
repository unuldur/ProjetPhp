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

        //Creation de la table new et de la table commentaire
        /*
        try {
            $table = Doctrine_Core::getTable('News'); // On récupère l'objet de la table.
            $connexion->export->createTable($table->getTableName(), $table->getColumns()); // Puis, on la crée.
            echo 'La table a bien été créée';
        }
        catch(Doctrine_Connection_Exception $e) { // Si une exception est lancée.
            echo $e->getMessage(); // On l'affiche.
        }

        try {
            $table = Doctrine_Core::getTable('Commentaires'); // On récupère l'objet de la table.
            $connexion->export->createTable($table->getTableName(), $table->getColumns()); // Puis, on la crée.
            echo 'La table a bien été créée';
        }
        catch(Doctrine_Connection_Exception $e) { // Si une exception est lancée.
            echo $e->getMessage(); // On l'affiche.
        }*/
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

    function addCom($pseudo, $infos, $texte)
    {
        $com = new Commentaires();
        $com->pseudo = $pseudo;
        $com->infos = $infos;
        $com->contenu = $texte;
        $com->id_new = $id;
    }
}
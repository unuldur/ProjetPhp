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

    static function delNews($id)
    {
        $new = self::findOneNews($id);

        foreach($new->commentaires as $com)
        {
            ModeleCommentaires::delCom($com->id);
        }
        $new->delete();
    }

    static function findNews($nbNews,$aPartirDe)
    {
        return Doctrine_Query::create()
            ->from('News')
            ->orderBy('date DESC')
            ->limit($nbNews)
            ->offset($aPartirDe)
            ->execute();
    }

    static function findOneNews($id)
    {
        return Doctrine_Core::getTable('News')->find($id);
    }

    static function nbNews()
    {
        return Doctrine_Core::getTable('News')->count();
    }

    static function addNew($titre, $image, $texte)
    {
        $new = new News();
        $new->titre = $titre;
        $new->image = "Vue/Image/".$image;
        $new->contenu = $texte;
        $new->date = date("Y-m-d");
        $new->save();
    }

    static function findComs($id)
    {
        return Doctrine_Query::create()
            ->from('News n')
            ->where('n.id == ?', $id)
            ->leftJoin('n.Commentaires c')
            ->orderBy('id ASC')
            ->execute();
    }

}
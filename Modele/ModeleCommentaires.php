<?php

/**
 * Created by PhpStorm.
 * User: PAYS
 * Date: 16/12/2015
 * Time: 12:47
 */
class ModeleCommentaires
{
    function __construct()
    {
        require_once(__DIR__ . '/../lib/vendor/doctrine/Doctrine.php');
        spl_autoload_register(array('Doctrine', 'autoload'));
        $dsn = 'mysql://root@localhost/projetphp';
        //Ou (pour l'iut) :
        //$dsn = 'mysql://codemontgo:thebigboss@hina/dbcodemontgo';
        $connexion = Doctrine_Manager::connection($dsn);

        //Creation de la table commentaires
        /*
        try
        {
                $table = Doctrine_Core::getTable('Commentaires'); // On récupère l'objet de la table.
                $connexion->export->createTable($table->getTableName(), $table->getColumns()); // Puis, on la crée.
                echo 'La table a bien été créée';
        } catch(Doctrine_Connection_Exception $e) { // Si une exception est lancée.
            echo $e->getMessage(); // On l'affiche.
        }*/
    }

    static function addCom($pseudo, $infos, $texte, $idNew)
    {
        $com = new Commentaires();
        $com->pseudo = $pseudo;
        $com->infos = $infos;
        $com->contenu = $texte;
        $com->id_new = $idNew;
        $com->save();
    }

    static function findCom($id)
    {
        return Doctrine_Core::getTable('Commentaires')->find($id);
    }

    static function delCom($id)
    {
        $com = self::findCom($id);
        $com->delete();
    }
}
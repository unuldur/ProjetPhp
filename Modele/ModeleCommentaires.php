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
        Autoload::_autoload('Commentaires');
        $dsn = 'mysql://root@localhost/projetphp';
        $connexion = Doctrine_Manager::connection($dsn);
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
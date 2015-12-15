<?php

/**
 * Created by PhpStorm.
 * User: PAYS
 * Date: 15/12/2015
 * Time: 08:10
 */
class ModeleAdmin
{
    function __construct()
    {
        require_once(__DIR__ . '/../lib/vendor/doctrine/Doctrine.php');
        spl_autoload_register(array('Doctrine', 'autoload'));
        Autoload::_autoload('Admin');
        $dsn = 'mysql://root@localhost/projetphp';
        $connexion = Doctrine_Manager::connection($dsn);

        //creation de la table admin
        /*
        try {
            $table = Doctrine_Core::getTable('Admin'); // On récupère l'objet de la table.
            $connexion->export->createTable($table->getTableName(), $table->getColumns()); // Puis, on la crée.
            echo 'La table a bien été créée';
        }
        catch(Doctrine_Connection_Exception $e) { // Si une exception est lancée.
            echo $e->getMessage(); // On l'affiche.
        }*/
    }

    static function connection($login, $mdp)
    {
        $login = Validation::SanitizeItem($login, 'string');
        $mdp = Validation::SanitizeItem($mdp, 'string');
        $result = Doctrine_Query::create()
            ->from("Admin")
            ->where("pseudo LIKE ?", $login)
            ->andWhere("mdp LIKE ?", $mdp)
            ->execute();

        if (count($result) == 1) {

            $_SESSION['role'] = 'admin';
            $_SESSION['login'] = $login;
        }
    }

    static function deconnection()
    {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }

    static function isAdmin()
    {
        if (isset($_SESSION['login']) && isset($_SESSION['role']))
            return true;
        return false;
    }
}
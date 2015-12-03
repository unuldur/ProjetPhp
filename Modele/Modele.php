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

    }

    function allNews()
    {
        return Doctrine_Core::getTable('News')->findAll();
    }

    function findOneNews($id)
    {
        return Doctrine_Query::create()->from('new')->where($id == 'id')->execute();
        //return Doctrine_Core::getTable('News')->find($id);
    }
}
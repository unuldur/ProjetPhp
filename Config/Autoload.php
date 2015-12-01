<?php

/**
 * Created by PhpStorm.
 * User: PAYS
 * Date: 01/12/2015
 * Time: 12:52
 */
class Autoload
{
    private static $_instance = null;

    public static function charger()
    {
        if(null != self::$_instance){
            throw new RuntimeException(sprintf('%s execite deja',__CLASS__));
        }
        self::$_instance = new self();
    }

    public static function  _autoload($class)
    {
        global $rep;
        $filename = $class.'.php';
        $dir= ['Modele/','./','Config/','Controller/'];
        foreach ($dir as $d)
        {
            $file = $rep.$d.$filename;
                if(file_exists($file)){
                    include ("$file");
                }
        }
    }
}
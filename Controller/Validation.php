<?php

/**
 * Created by PhpStorm.
 * User: PAYS
 * Date: 25/11/2015
 * Time: 14:35
 */
class Validation
{
    /**
     * @param $value valeur à valider
     * @param $type type de la valeur
     */
    public static function validateItem($value,$type)
    {
        if(!isset($value)) return false;
        switch($type)
        {
            case 'pseudo':
            return filter_var($value,FILTER_VALIDATE_REGEXP,["options"=>["regexp"=>"/^[a-zA-Z0-9_]{3,15}$/"]]);
            break;
            case 'mdp':
                return filter_var($value,FILTER_VALIDATE_REGEXP,["options"=>["regexp"=>"/^[a-zA-Z0-9*-/#_+]{5,15}$/"]]);
                break;
        }
        return false;
    }

    /**
     * @param $value valeur à valider
     * @param $type type de la valeur
     */
    public static function SanitizeItem($value,$type)
    {
        if(!isset($value) || empty($value)) return "";
        switch($type)
        {
            case 'string':
                return filter_var($value,FILTER_SANITIZE_STRING);
                break;
            case 'int':
                return filter_var($value,FILTER_VALIDATE_INT);
            break;
        }
        return "";
    }
}
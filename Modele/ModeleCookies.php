<?php
class ModeleCookies
{
    static function getCookie($nom, $type)
    {
    	if(isset($_COOKIE[$nom]) && Validation::validateItem($_COOKIE[$nom], $type))
    	{
    		return Validation::SanitizeItem($_COOKIE[$nom], $type);
    	}
    	return "";
    }
        
    static function setCookie($nom, $val)
    {
    	setcookie($nom,$val,time()+31*24*3600);
    }
}
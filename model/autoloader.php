<?php
class Auto
{
    static function register()
    {
        //var_dump(__CLASS__);
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($className)
    {
        //var_dump($className);
        include "model/" . $className . ".php";
    }
}

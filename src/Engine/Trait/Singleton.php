<?php
namespace JFileExplorer\Engine\Trait;

/**
 * Singleton : make class available as singleton object
 */
trait Singleton
{
    //Attribute
    private static $Obj         = null;                         //private variable instance of class
    //Methode
    private function __CLONE()
    {

    }

    private function __WAKEUP()
    {

    }

    //function gateway to get the instance class
    public static function Obj()
    {
        if( self::$Obj === null){
            self::$Obj = new self();
        }
        return self::$Obj;
    }
}

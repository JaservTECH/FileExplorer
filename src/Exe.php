<?php
namespace JFileExplorer;
/*
Declare By      : Jafar Abdurrahman Albasyir
Email           : jafarabdurrahmanal-basyir@hotmail.com
Description     : Main class to execute the whole system file
*/
class Exe 
{
    //=====>define variable
    private static $Obj = null;                         //private variable instance of class
    
    //=====>define methode
    /*
    disable free instance
    make this class singleton by access function static Obj
    */
    private function __CONSTRUCT()
    {

    }

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
            self::$Obj = new Exe();
        }
        return self::$Obj;
    }
    public function test()
    {
        return "hello";
    }
}
?>
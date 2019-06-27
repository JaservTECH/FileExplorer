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
    private static $Obj         = null;                         //private variable instance of class
    private $Configuration      = null;
    //=====>define methode
    /*
    disable free instance
    make this class singleton by access function static Obj
    */
    private function __CONSTRUCT()
    {
        $this->Configuration    = (Object)[
            "Root"          => (Object)[
                "Directory"         => __DIR__."../JFileExplorer"
            ]
        ];
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
            self::$Obj->Initial();
        }
        return self::$Obj;
    }

    private function Initial()
    {
        if( !is_dir( $this->Configuration->Root->Directory ) )
        {
            mkdir( $this->Configuration->Root->Directory );
        }
    }

    public function Set( $target = null , $value = null )
    {
        //filter param
        if( !is_string( $target ) ) 
            return false;
        if( !is_string( $value ) ) 
            return false;
        //bussiness logic
        switch( $target )
        {
            case "ConfRootDir"          : $this->Configuration->Root->Directory = $value; break;
        }
    }
    public function test()
    {
        return "hello";
    }
}
?>
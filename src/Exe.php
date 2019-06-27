<?php
namespace JFileExplorer;
use Exception;
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
            "Directory"             => (Object)[
                "Root"                  => __DIR__."../../JFileExplorer",
                "Space"                  => "",
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
        if( !is_dir( $this->Configuration->Directory->Root ) && !file_exists( $this->Configuration->Directory->Root ) )
        {
            mkdir( $this->Configuration->Directory->Root );
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
            case "ConfRootDir"          : $this->Configuration->Directory->Root = $value; break;
        }
    }
    public function test()
    {
        return "hello";
    }
    private function CheckSession()
    {
        if( $this->Configuration->Directory->Space == "" ) return;
        if( !is_string( $this->Configuration->Directory->Space ) ) throw new Exception\Space("You inserted space not as a string", 1);
        if( $this->Configuration->Directory->Space[0] != "/" && $this->Configuration->Directory->Space[0] != "\\" ) throw new Exception\Space("your string name of space must have symbol '\\' or '/' as postfix on space name exp:'/spaceone' ", 1);
        
        if( !is_dir( $this->Configuration->Directory->Root.$this->Configuration->Directory->Space ) && !file_exists( $this->Configuration->Directory->Root.$this->Configuration->Directory->Space ) )
        {
            mkdir( $this->Configuration->Directory->Root.$this->Configuration->Directory->Space );
        }
    }

    public function AddFile( $path , $source )
    {  
       try
       {
            $this->CheckSession();
       }
       catch( Exception\Space $err )
       {
           //error on space
       }
    }
}
?>
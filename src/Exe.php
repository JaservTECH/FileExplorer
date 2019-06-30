<?php
namespace JFileExplorer;
use Exception;
use Engine;
/*
Declare By      : Jafar Abdurrahman Albasyir
Email           : jafarabdurrahmanal-basyir@hotmail.com
Description     : Main class to execute the whole system file
*/
class Exe 
{
    //define trait
    //make singleton
    use Engine\Traits\Singleton;
    //=====>define variable
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
                "Space"                 => "",
            ]
        ];
        //building default configuration
        $this->Initial();
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
        if( !is_string( $this->Configuration->Directory->Space ) ) throw new Exception\SpaceException("You inserted space not as a string", 1);
        if( $this->Configuration->Directory->Space[0] != "/" && $this->Configuration->Directory->Space[0] != "\\" ) throw new Exception\SpaceException("your string name of space must have symbol '\\' or '/' as postfix on space name exp:'/spaceone' ", 1);
        
        if( !is_dir( $this->Configuration->Directory->Root.$this->Configuration->Directory->Space ) && !file_exists( $this->Configuration->Directory->Root.$this->Configuration->Directory->Space ) )
        {
            mkdir( $this->Configuration->Directory->Root.$this->Configuration->Directory->Space );
        }
    }

    public function AddFile( $path = null , $source , $overwrite = false )
    {  
        $target_dir = $this->Configuration->Directory->Root.$this->Configuration->Directory->Space.$path;
        $File = null;
        try
        {
            $this->CheckSession();
            $File = Engine\Files::Obj()->GetDetailFileUpload( $source );
        }
        catch( Exception\SpaceException $err )
        {
            //error on space
            return [];
        }
        catch( Exception\FilesException $err )
        {
            //error on space
           return [];
        }
        //uploading
       


        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
}
?>
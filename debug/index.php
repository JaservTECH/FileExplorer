<?php
require_once __DIR__."/vendor/autoload.php";
$rest = JFileExplorer\Exe::Obj()->AddFile( [
    "path"=>"/test/gggg" , 
    "source"=>"file" , 
    "overwrite"=>true,
    "name"=>"nama baru",            //must be string, with or eithout format exp. <nama_baru> or <nama_baru>.<extension> extension must be like file that upload, if do not know left it blank


    "allowType"=>".mp4|.mkv|.3gp",  //extension that allow
    "maxSize" => null,              //must be integer in KB default 0KB
    "minSize" => null,              //must be integer in KB default 0KB
    //only for Image
    "maxResolution"=>"2300x7899",   //must be string format <width>x<height>
    "minResolution"=>"678x246",     //must be string format <width>x<height>
    "mustSquare" => false,          //must be Boolean true or false
    
] );

var_dump($rest);
<?php
require_once __DIR__."/vendor/autoload.php";
$rest = JFileExplorer\Exe::Obj()->AddFile( [
    "path"=>"/test/gggg" , 
    "source"=>"file" , 
    "overwrite"=>true,
    "name"=>"nama baru",
    "allowType"=>".mp4|.mkv|.3gp"
] );

var_dump($rest);
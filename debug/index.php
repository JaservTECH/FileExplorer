<?php
require_once __DIR__."/vendor/autoload.php";
echo JFileExplorer\Exe::Obj()->AddFile( ["path"=>"/test/gggg" , "source"=>"file" , "overwrite"=>true] );
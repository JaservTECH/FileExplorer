<?php
namespace JFileExplorer\Engine;
use JFileExplorer\Exception\FilesException;
use JFileExplorer\Engine\Traits\Singleton;
class Files {
    use Singleton;
    public function GetDetailFileUpload( $source = null )
    {
        if( is_null($source) ) throw new FilesException(json_encode( [ "callback" => __FUNCTION__ , "message" => "Source belum dimasukan" ] ), 1);
        if( !is_string($source) ) throw new FilesException(json_encode( [ "callback" => __FUNCTION__ , "message" => "Source harus dalam bentuk string" ] ), 1);
        if( !isset( $__FILES[ $source ] ) ) throw new FilesException(json_encode( [ "callback" => __FUNCTION__ , "message" => "Source tidak ditemukan" ] ), 1);
        
        
    }     
}
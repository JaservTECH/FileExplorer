<?php
namespace JFileExplorer\Engine;
use JFileExplorer\Exception\FilesException;
class Files {
    use Traits\Singleton;
    public function GetDetailFileUpload( $source = null )
    {
        if( is_null($source) ) throw new FilesException(json_encode( [ "callback" => __FUNCTION__ , "message" => "Source belum dimasukan" ] ), 1);
        if( !is_string($source) ) throw new FilesException(json_encode( [ "callback" => __FUNCTION__ , "message" => "Source harus dalam bentuk string" ] ), 1);
        if( !isset( $_FILES[ $source ] ) ) throw new FilesException(json_encode( [ "callback" => __FUNCTION__ , "message" => "Source tidak ditemukan" ] ), 1);
        if( empty($_FILES[ $source ]) ) throw new FilesException(json_encode( [ "callback" => __FUNCTION__ , "message" => "Data tidak ditemukan" ] ), 1);
        $file = new \StdClass();
        foreach( $_FILES[ $source ] as $key => $value )
        {
            $key        = \strtolower( $key );
            $file->$key = \strtolower( $value );
        }
        return $file;
    }     
}
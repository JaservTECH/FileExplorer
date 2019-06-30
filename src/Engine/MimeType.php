<?php
namespace JFileExplorer\Engine;

/**
 * Singleton : make class available as singleton object
 */

namespace JFileExplorer\Engine\Traits\Singleton;
use JFileExplorer\Exception\MimeTypeException;
class MimeType {
    //
    use Singleton;
    private $library = null;
    private function __CONSTRUCT()
    {
        //methode
        $this->library = [
            "audio/aac"                                                                     => [ ".aac" , ".ACC" ] , //AAC audio
            "application/x-abiword"                                                         => [ ".abw" , ".ABW" ] , //AbiWord document
            "application/x-freearc"                                                         => [ ".arc" ] , //Archive document (multiple files embedded)
            "video/x-msvideo"                                                               => [ ".avi" ] , //AVI: Audio Video Interleave
            "application/vnd.amazon.ebook"                                                  => [ ".azw" ] , //Amazon Kindle eBook format
            "application/octet-stream"                                                      => [ ".bin" ] , //Any kind of binary data
            "image/bmp"                                                                     => [ ".bmp" ] , //Windows OS/2 Bitmap Graphics
            "application/x-bzip"                                                            => [ ".bz" ] , //BZip archive
            "application/x-bzip2"                                                           => [ ".bz2" ] , //BZip2 archive	"
            "application/x-csh"                                                             => [ ".csh" ] , //C-Shell script	"
            "text/css"                                                                      => [ ".css" ] , //Cascading Style Sheets (CSS)	"
            "text/csv"                                                                      => [ ".csv" ] , //Comma-separated values (CSV)	"
            "application/msword"                                                            => [ ".doc" ] , //Microsoft Word	"
            "application/vnd.openxmlformats-officedocument.wordprocessingml.document"       => [ ".docx" ] , //	Microsoft Word (OpenXML)	"
            "application/vnd.ms-fontobject"                                                 => [ ".eot" ] , //	MS Embedded OpenType fonts	"
            "application/epub+zip"                                                          => [ ".epub" ] , //	Electronic publication (EPUB)	"
            "image/gif"                                                                     => [ ".gif" ] , //	Graphics Interchange Format (GIF)	"
            "text/html"                                                                     => [ ".html .htm" ] , //	HyperText Markup Language (HTML)	"
            "image/vnd.microsoft.icon"                                                      => [ ".ico" ] , //	Icon format"
            "text/calendar"                                                                 => [ ".ics" ] , //	iCalendar format"
            "application/java-archive"                                                      => [ ".jar" ] , //	Java Archive (JAR)	"
            "image/jpeg"                                                                    => [ ".jpeg" , ".jpg" ] , //	JPEG images"
            "text/javascript"                                                               => [ ".js" , ".mjs" ] , //	JavaScript	"
            "application/json"                                                              => [ ".json" ] , //	JSON format	"
            "application/ld+json"                                                           => [ ".jsonld" ] , //	JSON-LD format	"
            "audio/midi"                                                                    => [ ".mid" , ".midi" ] , //	Musical Instrument Digital Interface (MIDI)	"
            "audio/x-midi"                                                                  => [ ".mid" , ".midi" ] , //	Musical Instrument Digital Interface (MIDI)	"
            "audio/mpeg"                                                                    => [ ".mp3" ] , //	MP3 audio	"
            "video/mpeg"                                                                    => [ ".mpeg" ] , //	MPEG Video	"
            "application/vnd.apple.installer+xml"                                           => [ ".mpkg" ] , //	Apple Installer Package	"
            "application/vnd.oasis.opendocument.presentation"                               => [ ".odp" ] , //	OpenDocument presentation document	"
            "application/vnd.oasis.opendocument.spreadsheet"                                => [ ".ods" ] , //	OpenDocument spreadsheet document	"
            "application/vnd.oasis.opendocument.text"                                       => [ ".odt" ] , //	OpenDocument text document	"
            "audio/ogg"                                                                     => [ ".oga" ] , //	OGG audio	"
            "video/ogg"                                                                     => [ ".ogv" ] , //	OGG video	"
            "application/ogg"                                                               => [ ".ogx" ] , //	OGG	"
            "font/otf"                                                                      => [ ".otf" ] , //	OpenType font	"
            "image/png"                                                                     => [ ".png" ] , //	Portable Network Graphics	"
            "application/pdf"                                                               => [ ".pdf" ] , //	Adobe Portable Document Format (PDF)	"
            "application/vnd.ms-powerpoint"                                                 => [ ".ppt" ] , //	Microsoft PowerPoint	"
            "application/vnd.openxmlformats-officedocument.presentationml.presentation"     => [ ".pptx" ] , //	Microsoft PowerPoint (OpenXML)	"
            "application/x-rar-compressed"                                                  => [ ".rar" ] , //	RAR archive	"
            "application/rtf"                                                               => [ ".rtf" ] , //	Rich Text Format (RTF)	"
            "application/x-sh"                                                              => [ ".sh" ] , //	Bourne shell script	"
            "image/svg+xml"                                                                 => [ ".svg" ] , //	Scalable Vector Graphics (SVG)	"
            "application/x-shockwave-flash"                                                 => [ ".swf" ] , //	Small web format (SWF) or Adobe Flash document	"
            "application/x-tar"                                                             => [ ".tar" ] , //	Tape Archive (TAR)	"
            "image/tiff"                                                                    => [ ".tiff" , ".tif" ] , //	Tagged Image File Format (TIFF)	"
            "video/mp2t"                                                                    => [ ".ts" ] , //	MPEG transport stream	"
            "font/ttf"                                                                      => [ ".ttf" ] , //	TrueType Font	"
            "text/plain"                                                                    => [ ".txt" ] , //	Text, (generally ASCII or ISO 8859-n)	"
            "application/vnd.visio"                                                         => [ ".vsd" ] , //	Microsoft Visio	"
            "audio/wav"                                                                     => [ ".wav" ] , //	Waveform Audio Format	"
            "audio/webm"                                                                    => [ ".weba" ] , //	WEBM audio	"
            "video/webm"                                                                    => [ ".webm" ] , //	WEBM video	"
            "image/webp"                                                                    => [ ".webp" ] , //	WEBP image	"
            "font/woff"                                                                     => [ ".woff" ] , //	Web Open Font Format (WOFF)	"
            "font/woff2"                                                                    => [ ".woff2" ] , //	Web Open Font Format (WOFF)	"
            "application/xhtml+xml"                                                         => [ ".xhtml" ] , //	XHTML	"
            "application/vnd.ms-excel"                                                      => [ ".xls" ] , //	Microsoft Excel	"
            "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"             => [ ".xlsx" ] , //	Microsoft Excel (OpenXML)	"
            "application/xml"                                                               => [ ".xml" ] , //	XML"
            "text/xml"                                                                      => [ ".xml" ] , //	XML	"
            "application/vnd.mozilla.xul+xml"                                               => [ ".xul" ] , //	XUL"
            "application/zip"                                                               => [ ".zip" ] , //	ZIP archive"
            "video/3gpp"                                                                    => [ ".3gp" ] , //	3GPP video container"
            "audio/3gpp"                                                                    => [ ".3gp" ] , //	3GPP audio container"
            "video/3gpp2"                                                                   => [ ".3g2" ] , //	3dpp2 video container"
            "audio/3gpp2"                                                                   => [ ".3g2" ] , //	3dpp2 video container"
            "application/x-7z-compressed"                                                   => [ ".7z" ] , //	7-zip archive	"
        ];
    }
    public function IsTypeInTheList( $type = null)
    {
        if( is_null( $type ) ) throw new MimeTypeException(json_encode( [ "callback" => __FUNCTION__ , "message" => "Type belum dimasukan" ] ), 1);
        if( !is_string( $type ) ) throw new MimeTypeException(json_encode( [ "callback" => __FUNCTION__ , "message" => "Type harus berupa string" ] ), 1);
        if( array_key_exists( $type , $this->library ) ) return true;
        foreach( $this->library as $value )
        {
            foreach( $value as $target ){
                if( $target == $type ) return true;
            }
        }
        return false;
    }
    /*
        Function        : IsContainType 
        Description     :
        Input           : <string>
        Output          : 
        =>true              ::: Type file
        =>false             ::: false <boolean>
        =>param trouble     ::: Throw error
    */
    public function IsContainType( $nameFile = null )
    {
        if( is_null( $nameFile ) ) throw new MimeTypeException(json_encode( [ "callback" => __FUNCTION__ , "message" => "Nama file belum dimasukan" ] ), 1);
        if( !is_string( $nameFile ) ) throw new MimeTypeException(json_encode( [ "callback" => __FUNCTION__ , "message" => "Nama file harus berupa string" ] ), 1);
        $nameFile = explode(".", $nameFile);
        if( \count($nameFile) < 2) return false;
        return ".".$nameFile[\count($nameFile) - 1];
    }
    public function GetTypeTranslateFormat( $type = null )
    {
        if( is_null( $type ) ) throw new MimeTypeException(json_encode( [ "callback" => __FUNCTION__ , "message" => "Type belum dimasukan" ] ), 1);
        if( !is_string( $type ) ) throw new MimeTypeException(json_encode( [ "callback" => __FUNCTION__ , "message" => "Type harus berupa string" ] ), 1);
        if( !array_key_exists( $type , $this->library ) ) return false;
        $cache = $this->library[ $type ];
        //return last index of format that type contain or have
        return $cache[ \count($cache) -1 ]; 
    }
}

?>
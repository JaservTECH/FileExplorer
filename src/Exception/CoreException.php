<?php
namespace JFileExplorer\Exception;
class CoreException extends \Exception{
    public function errorMessage()
    {
        //error message
        $errorMsg = 'Error on line '.$this->getLine().' in '.$this->getFile()
        .': <b>'.$this->getMessage().'</b> is not a valid E-Mail address';
        return $errorMsg;
    }
  public function GetOnlyMessage()
  {
    $tempErrorMessage = json_decode( $this->getMessage() );
    return $tempErrorMessage->message;
  }
}
?>

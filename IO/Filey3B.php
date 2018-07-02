<?php
//simple class
class FileyB{
  //file properties
  public $filename;
  private $filesize;
  //constructor
  public function __construct($fn){
    $this->filename = $fn;
    //initialize filesize - in bytes
    $this->filesize = filesize($this->filename);
  }
  public function getSize(){
    return $this->filesize;
  }
  public function someka(){
    return (is_readable($this->filename)) ? 'Yes' : 'No';
  }
  public function kwandika(){
    return (is_writable($this->filename)) ? 'Yes' : 'No';
  }
}
$filey = new FileyB('cow.txt');
echo "<p>File name : {$filey->filename}</p>";
echo "<p>File size : {$filey->getSize()} bytes</p>";
echo "<p>Readable? {$filey->someka()}</p>";
echo "<p>Writeable? {$filey->kwandika()}</p>";
 ?>

<?php
//Filey3C.php
//simple class - Filey3c
class Filey3C{
//file properties
public $filename;
private $filesize;
//constructor
public function __construct($fn){
  $this->filename = $fn;
  //if the file doesn't exist, create it
  if(!file_exists($this->filename))
    fopen($this->filename, 'w');

  $this->filesize = filesize($this->filename);
}
public function getFileSize(){return $this->filesize;}
}
$filey = new Filey3C('form34b.txt');
echo "<p> File name : {$filey->filename}";
echo "<p> File size : {$filey->getFileSize()} bytes";
?>

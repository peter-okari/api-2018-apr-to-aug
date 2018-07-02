<?php
//class name
class Filey{

  //a class attribute
  public $filename = 'feature-white.txt';
  private $filesize;
  //a simple constructor
  public function __construct($filename){
    if( $filename != "" || $filename != null )
      $this->filename = $filename;
  }

  //check whether a file exists
  public function iko(){
    if( file_exists($this->filename) )
      return true;
    else
      return false;
    //return (file_exists($this->filename)) ? true : false;
  }
  //check whether readable
  public function someka(){
    return is_readable($this->filename);
  }
  //check whether writeable
  public function andikika(){
    return is_writable($this->filename);
  }
  //getting the filesize
  public function getFileSize(){
    if( $this->filesize == "" ){
        $this->setFileSize();
    }
    return $this->filesize;
  }
  //setting the filesize
  public function setFileSize(){
    $this->filesize = filesize($this->filename);
  }
  // Readme
  public function soma(){
    return file_get_contents($this->filename);
  }

  public function andika($content){
    //check whether ina-andikika
    if($this->andikika($this->filename) == false ){
      //change permission then write
      chmod($this->filename,'0755');
    }
    //open
    $f1 = fopen($this->filename, "a");
    //write
    fwrite($f1, $content);
    //close
    fclose($f1);
  }
}
$filey = new Filey('sample.txt');
echo 'Does the filename '.$filey->filename.' exists? '.
$filey->iko();
echo '<br/> My size : '.$filey->getFileSize().' bytes';
echo '<br/>';
echo ($filey->andikika()) ? "I'm writeable!" : "I'm NOT writeable";
echo '<br/>';
echo ($filey->someka()) ? "I'm readable!" : "I'm NOT readable";
echo "<p> This is what I've got....</p>";
echo $filey->soma();
$content = '<h5>Heading five</h5>';
$filey->andika($content);
echo "<p>I got updated!</p>";
echo $filey->soma();
 ?>

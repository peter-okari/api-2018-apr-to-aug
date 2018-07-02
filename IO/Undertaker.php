<?php

class UTaker{

  //class properties
  //@TODO : the prank_directory
  public $prank_directory = __DIR__."/prank";
  //@TODO : the prank_cracker directory
  public $prank_cracker_directory = __DIR__."/prank_cracker";
  public function __construct(){}
  public function decoder(){

    //@TODO : Get all files from a directory
    $file_list = glob($this->prank_directory.'/*');
    echo '<p>---</p>';
    var_dump($file_list);
    echo '<p>---</p>';
    //@TODO : loop through all of them
    foreach($file_list as $file):
    //@TODO : foreach file
      echo "<p> File : {$file}</p>";
      //@TODO : get the name
      
      //@TODO : remove the numbers

      //@TODO : copy file to the new folder
    endforeach;
  }
}
//simple object
$under = new UTaker();
echo "<p>Prank_directory : {$under->prank_directory}</p>";
echo "<p>Prank_cracker : {$under->prank_cracker_directory}</p>";
$under->decoder();
 ?>

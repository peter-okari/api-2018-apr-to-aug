<?php

class zahli{

  //directories
  public $prank_directory = __DIR__.'/prank';
  public $prank_directory_c = __DIR__.'/prank_cracked';

  public function __construct(){
      //echo is_dir($this->prank_directory);
      //echo '<br/>'.__DIR__;
  }

  //decoder
  public function decode_files(){
    //get all the files
    if ($handle = opendir($this->prank_directory)) {
      //loop through the files to get the names
      //$testing12 = scandir($this->prank_directory);
      //var_dump($testing12);
      while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
            //@TODO : remove letter from the filename
            $old_name = $entry;
            $new_name =  preg_replace('/[0-9]+/', '', $entry);
            //@TODO : writeout the file with the new file_name
            //to prank_cracked
          //  echo $old_name. '<br/> <--> '.$new_name.'<br/>';
            $old_file_location = $this->prank_directory.'/'.$old_name;
            $new_file_location = $this->prank_directory_c.'/'.$new_name;
          //  echo "<br/> {$old_file_location}";
          //  echo "<br/> {$new_file_location}<br/>";
            copy($old_file_location,$new_file_location);
        }
    }
      //Close it
     closedir($handle);
    }
  }

}
//a new object
$cracki_no_paye = new zahli();
$cracki_no_paye->decode_files();
?>

<?php

//refer to refs
namespace User;
error_reporting(E_ALL);

use \DB\Database as Uhondo;

require_once 'Datbase_3A.php';

class User{

    private $id;
    private $name;
    private $phone_number;
    private $country_id;


    public static function userList(Uhondo $db){
        return $db->getAll('user')->fetchAll();
    }

    public function getUser(Uhondo $db,string $id){
        return $db->getById('user',"id",$id)->fetchObject(__CLASS__);
    }
}

//var_dump(User::userList(new Uhondo()));
$user = new User();
$user->getUser(new Uhondo(),1);

?>

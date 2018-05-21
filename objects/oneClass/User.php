<?php

namespace Solutions\Users;
require_once 'Database.php';

use DB\Database as Ndata;

class Users{

    private $user_list;
    private $db_instance;
    public function __construct()
    {
        //init db_conn
    }

    public function getDb(){
        if( $this->db_instance != null ){
            return $this->db_instance;
        }else{
            return $this->db_instance = new Ndata();
        }
    }

    public function getUsers(){
        $this->user_list = $this->getDb()->_getAll('user');
    }
}
?>

<?php

# See namespace ref
namespace Solutions;
use \PDO as PDO;

//composer magic!
require_once 'vendor/autoload.php';


class Database{
    const HOST = 'localhost';
    const USERNAME = 'testor';
    const PASSWORD = 'testor';
    const DB_NAME = 'testor';

    //properties
    private $logger;
    private $database_name;
    private $host;
    private $port;
    private $password;
    private $username;
    private $pdo;
    private $is_connected;
    private $parameters;
    //php7 supports type declarations
    public function __construct($host = self::HOST,$database_name = self::DB_NAME, $password = self::PASSWORD,$port = 3306)
    {
        //initialize logger
        $this->logger = new \Katzgrau\KLogger\Logger(__DIR__.'/logs');

        try {
            //initialize class properties
            $this->host = $host;
            $this->database_name = $database_name;
            $this->password = $password;
            $this->port = $port;

            //open connection
            $this->pdo = new PDO("mysql:host={$this->host};dbname={$this->database_name}", $this->username, $this->password);

            //set attributes
            //Error mode is set to exceptions
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->logger->info('.::.Connected.::.');

        }catch (\PDOException $exception){
            $this->logger->error($exception->getMessage().PHP_EOL.$exception->getTraceAsString());
        }
    }

    /**
     * close the database connection
     */
    public function close(){
        $this->pdo = null;
        $this->logger->info('.::.DB Closed.::.');
        $this->logger = null;
    }

    /**
     * Returns last inserted id
     * @return mixed
     */
    public function getLastInsert(){
        return $this->pdo->lastInsertId();
    }

    /**
     * Get list of available drivers
     * @return string
     */
    public static function getAvailableDrivers(){
        return implode(', ', PDO::getAvailableDrivers());
    }

    /**
     * DB Server details
     * @return mixed
     */
    public static function getDbVersion(){
        return PDO::ATTR_SERVER_INFO.' @Version --> '.PDO::ATTR_SERVER_VERSION;
    }
    //@TODO : Write an insert
    public function insert(string $table,array $columns_value){

    }

    /**
     * Return all the rows of a certain table
     * @param string $table
     * @return mixed
     */
    public function _getAll(string $table,$condition = false){
        $sql = "SELECT * FROM {$table}";
        if($condition != false){
            $sql .= " WHERE ".implode(',',$condition);
        }
        $statement = $this->pdo->prepare($sql);
        //execute
        $statement->execute();
        return $statement;
    }


    public function _getRow(string $table,$row_num = false){
        $sql = "SELECT * FROM {$table}";
        $statement = $this->pdo->prepare($sql);
        //execute
        $statement->execute();
        return $statement;
    }

    public function getConnection(){
        return $this->pdo;
    }
}

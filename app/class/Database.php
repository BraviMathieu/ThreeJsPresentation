<?php

namespace App;
use PDO;

class Database
{
    // Hold the class instance.
    private static $instance = null;

    private $host = MSQL_DB_HOST;
    private $user = MSQL_DB_USER;
    private $pass = MSQL_DB_PASSWORD;
    private $name = MSQL_DB_NAME;

    public static function getInstance()
    {
        if(!self::$instance)
        {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    // The db connection is established in the private constructor.
    private function __construct()
    {
        $this->conn = new PDO(
            "mysql:host={$this->host};
            dbname={$this->name}",
            $this->user,
            $this->pass,
            array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
    }

    public function getPdo()
    {
        return $this->conn;
    }


    public function query($req, $params = [], $one = false, $class = null){
        if(count($params) === 0){
            $stmt = $this->getPdo()->query($req);
        }else{
            $stmt = $this->getPdo()->prepare($req);
            $stmt->execute($params);
        }
        if($class){
            $stmt->setFetchMode(PDO::FETCH_CLASS, $class);
        }else{
            $stmt->setFetchMode(PDO::FETCH_OBJ);
        }
        if($one){
            return $stmt->fetch();
        }
        return $stmt->fetchAll();
    }

    public function first($req, $params = [], $class = null){
        return $this->query($req, $params, true, $class);
    }

    public function insert($table,array $values){
        $keys = array_keys($values);
        $fields = implode(', ',$keys);
        $elements = substr(str_repeat('?,',count($keys)),0,-1);
        $req = "INSERT INTO $table ($fields) VALUES ($elements)";
        return $this->query($req, array_values($values));
    }
}
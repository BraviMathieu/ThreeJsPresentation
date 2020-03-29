<?php

namespace App\Model\Table;

use App\Database;

class UserTable
{
    private $db;

    public function __construct(Database $db = null)
    {
        if(!$db){
            $db=Database::getInstance();
        }
        $this->db = $db;
    }

    public function getUser($name, $password){
        return $this->db->first("SELECT * FROM users 
                WHERE name=? AND password=?", [
            $name,
            $password
        ], "App\Model\Entity\UserEntity");
    }

}
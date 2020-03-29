<?php

namespace App\Model\Table;

use App\Session;
use App\Database;

class PresentationTable
{
    private $db;

    public function __construct(Database $db = null)
    {
        if(!$db){
            $db=Database::getInstance();
        }
        $this->db = $db;
    }

    public function getEnCours(){
        return $this->db->query(
            "SELECT * FROM presentations 
                WHERE user_id=?
                AND status=?
                ORDER BY id DESC
                 LIMIT 5",
            [Session::read('User.id'),1], false, "App\Model\Entity\PresentationEntity");
    }

    public function getAll(){
        return $this->db->query(
            "SELECT * FROM presentations 
                WHERE user_id=?
                ORDER BY id DESC
                 LIMIT 5",
            [Session::read('User.id')], false, "App\Model\Entity\PresentationEntity");
    }

}
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

    public function getAll(){
        return $this->db->query(
            "SELECT * FROM presentations 
                WHERE user_id=?
                ORDER BY id DESC
                 LIMIT 5",
            [Session::read('User.id')], false, "App\Model\Entity\PresentationEntity");
    }

    public function deleteOne($presentation_id = null){
        return $this->db->query(
            "DELETE FROM presentations 
                WHERE user_id=? AND id=?
                ORDER BY id DESC
                 LIMIT 5",
            [Session::read('User.id'),$presentation_id], false, "App\Model\Entity\PresentationEntity");
    }

}
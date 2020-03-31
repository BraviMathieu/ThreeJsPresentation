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

    public function getAll($user_id){
        return $this->db->query(
            "SELECT * FROM presentations 
                WHERE user_id=?
                ORDER BY id DESC
                 LIMIT 5",
            [$user_id], false, "App\Model\Entity\PresentationEntity");
    }

    public function deleteOne($user_id, $presentation_id){
        return $this->db->query(
            "DELETE FROM presentations 
                WHERE user_id=? AND id=?
                ORDER BY id DESC
                 LIMIT 5",
            [$user_id, $presentation_id], false, "App\Model\Entity\PresentationEntity");
    }
    public function getByUserId($user_id, $presentation_id){
        return $this->db->query(
            "SELECT COUNT(*) as nb FROM presentations 
                WHERE user_id=?
                AND id=?
                ORDER BY id DESC",
            [$user_id, $presentation_id], true, "App\Model\Entity\PresentationEntity");
    }

}
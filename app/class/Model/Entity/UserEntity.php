<?php
namespace App\Model\Entity;

class UserEntity
{
    public $avatar;

    public function __construct()
    {
        $this->avatar = '/img/users/' . $this->id . '.jpg';
    }

}
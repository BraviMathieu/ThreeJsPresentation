<?php

use Illuminate\Database\Eloquent\Model as Model;

class Presentation extends Model
{

    /**
     * Desactivation du timestamp
     * @var bool
     */
    public $timestamps = false;


    /**
     * Les attributs qui sont assignables
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'content',
        'user_id'
    ];
}
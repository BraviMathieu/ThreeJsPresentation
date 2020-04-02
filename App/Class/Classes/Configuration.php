<?php

use Illuminate\Database\Eloquent\Model as Model;

class Configuration extends Model
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
    'user_id', 'code', 'value'
  ];

}
<?php

use Illuminate\Database\Eloquent\Model as Model;

class User extends Model
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
    'name', 'password'
  ];



  /**
   * Les attributs qui doivent être caché pour les tableaux
   *
   * @var array
   */
  protected $hidden = [
    'password'
  ];


  /**
  * Get Presentations of User
  */
  public function presentation()
  {
    return $this->hasMany('Presentation');
  }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
  public $timestamps = false;
  protected $table = 'professor';
  protected $primaryKey = 'cliente_id';
 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
     'professor_username'
 ];

 /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
 public function cliente() {
     return $this->belongsTo('\App\Cliente', 'cliente_id', 'cliente_id');
 }
}

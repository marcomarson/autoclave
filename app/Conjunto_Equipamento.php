<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conjunto_Equipamento extends Model
{
  public $timestamps = false;
  protected $table = 'conjunto_equipamento';
  protected $primaryKey = 'conjunto_equipamento_id';
 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
      'conjunto_id', 'equipamento_id'
  ];
 /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
 public function conjunto() {
     return $this->belongsTo('\App\Conjunto', 'conjunto_id', 'conjunto_id');
 }
 public function equipamento() {
     return $this->hasMany('\App\Equipamento', 'equipamento_id', 'equipamento_id');
 }
}

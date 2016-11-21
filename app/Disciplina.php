<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
  public $timestamps = false;
  protected $table = 'disciplina';
  protected $primaryKey = 'materia_id';
 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
     'conjunto_id', 'materia_nome', 'ano'
 ];

 /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
 public function conjunto() {
     return $this->belongsTo('\App\Conjunto', 'conjunto_id', 'conjunto_id');
 }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
  public $timestamps = false;
  protected $table = 'disciplina';
  protected $primaryKey = 'disciplina_id';
 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
     'conjunto_id', 'disciplina_nome', 'ano', 'disciplin_ativo'
 ];

 /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
 public function conjunto() {
     return $this->belongsTo('\App\Conjunto', 'conjunto_id', 'conjunto_id');
 }
 public function pessoa_disciplina()
 {
     return $this->hasMany('App\Pessoa_disciplina');
 }
}

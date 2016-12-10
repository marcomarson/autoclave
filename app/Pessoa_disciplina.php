<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa_disciplina extends Model
{
  public $timestamps = false;
  protected $table = 'pessoa_disciplina';
  protected $primaryKey = 'pessoa_disciplina_id';
 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
      'ministra', 'disciplina_id', 'cliente_id'
  ];

 /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
 public function cliente() {
     return $this->belongsTo('\App\Cliente', 'cliente_id', 'cliente_id');
 }
 public function disciplina() {
     return $this->belongsTo('\App\Disciplina', 'disciplina_id', 'disciplina_id');
 }
}

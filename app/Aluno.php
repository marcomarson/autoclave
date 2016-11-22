<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
  public $timestamps = false;
  protected $table = 'aluno';
  protected $primaryKey = 'cliente_id';
  public $incrementing = false;
 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
     'RA', 'Ano'
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

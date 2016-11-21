<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoas_externas extends Model
{
  public $timestamps = false;
  protected $table = 'pessoas_externas';
  protected $primaryKey = 'cliente_id';
 /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
 protected $fillable = [
     'instituicao'
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

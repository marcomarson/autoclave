<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
  protected $table = 'equipamentoodontologico';
  protected $primaryKey = 'equipamento_id';
    //
     public $fillable = [
        'equipamento_nome', 'equipamento_ativo'
   ];
   public $timestamps = false;
   public function conjunto_equipamento()
   {
       return $this->hasMany('App\Conjunto_Equipamento');
   }
}

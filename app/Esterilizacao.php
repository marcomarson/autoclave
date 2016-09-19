<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Esterilizacao extends Model
{
  protected $table = 'esterilizacao';
  protected $primaryKey = 'esterilizacao_id';
    //
     public $fillable = [
        'autoclave_id',
        'equipamento_id',
        'esterilizacao_inf_extra',
        'data_inicio',
        'data_final'
   ];
   public $timestamps = false;

   public function autoclave(){
     return $this->belongsTo('\App\Autoclave', 'autoclave_id');
   }
   public function equipamento(){
     return $this->belongsTo('\App\Equipamento', 'equipamento_id');
   }

}

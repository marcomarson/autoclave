<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
  protected $table = 'equipamentoodontologico';
  protected $primaryKey = 'equipamento_id';
    //
     public $fillable = [
        'equipamento_nome',
        'sala_id'
   ];
   public $timestamps = false;
   public function sala(){
     return $this->belongsTo('\App\Sala', 'sala_id');
   }
}

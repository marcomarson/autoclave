<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
  protected $table = 'sala';
  protected $primaryKey = 'sala_id';
    //
     public $fillable = [
         'descricao',
        'sala_nome',
        'sala_ativo'
   ];
   public $timestamps = false;
   public function conjunto()
   {
       return $this->hasMany('App\Conjunto');
   }
}

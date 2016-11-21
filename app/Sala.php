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
        'sala_nome'
   ];
   public $timestamps = false;
}

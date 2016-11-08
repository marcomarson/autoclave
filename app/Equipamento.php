<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
  protected $table = 'equipamentoodontologico';
  protected $primaryKey = 'equipamento_id';
    //
     public $fillable = [
        'equipamento_nome'
   ];
   public $timestamps = false;
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autoclave extends Model
{
  protected $table = 'sala';
  protected $primaryKey = 'sala_id';
    //
     public $fillable = [
        'descricao'
   ];
   public $timestamps = false;
}

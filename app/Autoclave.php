<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Autoclave extends Model
{
  protected $table = 'autoclave';
  protected $primaryKey = 'autoclave_id';
    //
     public $fillable = [
        'marca',
        'autoclave_inf_extra',
        'manutencao'
   ];
   public $timestamps = false;
}

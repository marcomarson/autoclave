<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
  protected $table = 'turno';
  protected $primaryKey = 'turno_id';
    //
     public $fillable = [
        'turno'
   ];
   public $timestamps = false;
}

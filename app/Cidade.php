<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
  protected $table = 'cidade';
  protected $primaryKey = 'cidade_id';
    //
     public $fillable = [
        'cidade_estado',
        'cidade_nome'
   ];
   public $timestamps = false;
   public function admin()
   {
       return $this->hasMany('App\Admin');
   }
   public function cliente()
   {
       return $this->hasOne('App\Cliente');
   }
}

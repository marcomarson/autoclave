<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
  protected $table = 'telefone';
  protected $primaryKey = 'telefone_id';
    //
     public $fillable = [
        'telefone_ddd',
        'telefone_numero'
   ];
   public $timestamps = false;
   public function cliente()
   {
       return $this->hasOne('App\Cliente');
   }
   public function admin()
   {
       return $this->hasOne('App\Admin');
   }
}

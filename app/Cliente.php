<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
     public $timestamps = false;
     protected $table = 'cliente';
     protected $primaryKey = 'cliente_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'password', 'cidade_id', 'telefone_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token'
    ];
    public function cidade() {
        return $this->belongsTo('\App\Cidade', 'cidade_id', 'cidade_id');
    }
    public function telefone() {
        return $this->belongsTo('\App\Telefone', 'telefone_id', 'telefone_id');
    }
}

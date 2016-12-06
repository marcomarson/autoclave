<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Cliente extends Authenticatable
{
     public $timestamps = false;
     protected $table = 'cliente';
     protected $primaryKey = 'cliente_id';
     protected $guard = 'client';
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
    public function pessoa_disciplina()
    {
        return $this->hasMany('App\Pessoa_disciplina');
    }
    public function esterilizacao()
    {
        return $this->hasMany('App\Esterilizacao');
    }
}

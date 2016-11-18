<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;
    protected $guard = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'password', 'telefone_id', 'cidade_id', 'turno_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function turno() {
        return $this->belongsTo('\App\Turno', 'turno_id', 'turno_id');
    }
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

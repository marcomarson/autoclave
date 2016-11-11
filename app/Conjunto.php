<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Conjunto extends Authenticatable
{
     public $timestamps = false;
     protected $table = 'conjunto';
     protected $primaryKey = 'conjunto_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'conjuntoequipamentos_nome', 'sala_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function sala() {
        return $this->belongsTo('\App\Sala', 'sala_id', 'sala_id');
    }
}

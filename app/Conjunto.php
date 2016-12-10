<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conjunto extends Model
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
        'conjuntoequipamentos_nome', 'sala_id', 'conjunto_ativo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public function sala() {
        return $this->belongsTo('\App\Sala', 'sala_id', 'sala_id');
    }
    public function disciplina()
    {
        return $this->hasMany('App\Disciplina');
    }
    public function conjunto_equipamento()
    {
        return $this->hasMany('App\Conjunto_Equipamento');
    }
    public function esterilizacao()
    {
        return $this->hasMany('App\Esterilizacao');
    }
}

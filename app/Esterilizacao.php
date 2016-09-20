<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Esterilizacao extends Model {

    protected $table = 'esterilizacao';
    protected $primaryKey = 'esterilizacao_id';
    //
    public $fillable = [
        'autoclave_id',
        'sala_id',
        'autoclave_id',
        'equipamento_id',
        'pessoa_id',
        'esterilizacao_inf_extra',
        'data_inicio',
        'data_final',
        'recadastro_id'
    ];
    public $timestamps = false;

    public function autoclave() {
        return $this->belongsTo('\App\Autoclave', 'autoclave_id', 'autoclave_id');
    }

    public function equipamento() {
        return $this->belongsTo('\App\Equipamento', 'equipamento_id', 'equipamento_id');
    }

}

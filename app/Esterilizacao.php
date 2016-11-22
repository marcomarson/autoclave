<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Esterilizacao extends Model {

    protected $table = 'esterilizacao';
    protected $primaryKey = 'esterilizacao_id';
    //
    public $fillable = [
        'autoclave_id',
        'cliente_id',
        'admin_id',
        'conjunto_id',
        'esterilizacao_inf_extra',
        'data_inicio',
        'data_final',
        'data_retirada',
        'Parent_esterilizacao_id',
        'rodada'

    ];
    public $timestamps = false;

    public function autoclave() {
        return $this->belongsTo('\App\Autoclave', 'autoclave_id', 'autoclave_id');
    }

    public function equipamento() {
        return $this->belongsTo('\App\Equipamento', 'equipamento_id', 'equipamento_id');
    }
    public function cliente() {
        return $this->belongsTo('\App\Cliente', 'cliente_id', 'cliente_id');
    }
    public function conjunto() {
        return $this->belongsTo('\App\Conjunto', 'conjunto_id', 'conjunto_id');
    }
    public function admin() {
        return $this->belongsTo('\App\Admin', 'admin_id', 'admin_id');
    }

}

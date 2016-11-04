<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InformacoesController extends Controller
{
    //
    public function index()
    {
     $esterilizacoes = \App\Esterilizacao::where('data_final', '=', NULL)->join('equipamentoodontologico', 'equipamentoodontologico.equipamento_id','=', 'esterilizacao.equipamento_id')->get();
     //dd($esterilizacoes);
     return view('informacoes.informacoes')
     ->with('esterilizacoes', $esterilizacoes);
    }
}

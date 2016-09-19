<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InformacoesController extends Controller
{
    //
    public function index()
    {
     $esterilizacoes = \App\Esterilizacao::all();
     return view('informacoes.informacoes')
     ->with('esterilizacoes', $esterilizacoes);
    }
}

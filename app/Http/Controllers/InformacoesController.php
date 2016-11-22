<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class InformacoesController extends Controller
{
    //
    public function index()
    {
      //Session::flush();
     $esterilizacao = \App\Esterilizacao::where('data_final', NULL)->join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->get();
     //dd($esterilizacoes);
     return view('informacoes.informacoes')
     ->with('esterilizacao', $esterilizacao);
    }
    public function edit($equipamento_id)
    {
     $esterilizacao = \App\Esterilizacao::where('data_final', '=', NULL)->where('esterilizacao_id',$equipamento_id)->get();
     return view('informacoes.informacoes')
     ->with('esterilizacao', $esterilizacao);
    }

    public function destroy($id)
    {
      $current_time = \Carbon\Carbon::now()->toDateTimeString();
     \App\Esterilizacao::where('data_final', '=', NULL)->where('esterilizacao_id',$id)->update([
       'data_final'=>$current_time

     ]);
     $esterilizacao = \App\Esterilizacao::where('data_final', '=', NULL)->join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->get();
     return view('informacoes.informacoes')
     ->with('esterilizacao', $esterilizacao);
    }
    public function show(){

    }
}

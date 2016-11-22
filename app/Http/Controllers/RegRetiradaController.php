<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RegRetiradaController extends Controller
{
    //
    public function index()
    {
     $esterilizacao = \App\Esterilizacao::where('data_retirada', '=', NULL)->where('data_final', '!=', NULL)->join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->get();
     //dd($esterilizacoes);
     return view('retirada.retirada')
     ->with('esterilizacao', $esterilizacao);
    }

    public function destroy($id)
    {
      $current_time = \Carbon\Carbon::now()->toDateTimeString();
     \App\Esterilizacao::where('data_retirada', '=', NULL)->where('data_final', '!=', NULL)->where('esterilizacao_id',$id)->update([
       'data_retirada'=>$current_time

     ]);
     $esterilizacao = \App\Esterilizacao::where('data_retirada', '=', NULL)->where('data_final', '!=', NULL)->join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->get();
     return view('retirada.retirada')
     ->with('esterilizacao', $esterilizacao);
    }
    public function show(){

    }
}

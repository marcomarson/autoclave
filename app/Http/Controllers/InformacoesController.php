<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class InformacoesController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    //
    public function index()
    {
      //Session::flush();
     $esterilizacao = \App\Esterilizacao::where('data_final', NULL)->where('data_retirada', NULL)->join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->get();
     //dd($esterilizacoes);
     return view('informacoes.informacoes')
     ->with('esterilizacao', $esterilizacao);
    }
    public function edit($esterilizacao_id)
    {
      try{




        $current_time = \Carbon\Carbon::now()->toDateTimeString();
       $esterilizacao = \App\Esterilizacao::where('esterilizacao_id',$esterilizacao_id)->first();
       \App\Esterilizacao::where('esterilizacao_id',$esterilizacao_id)->update([
         'data_retirada' => $current_time
       ]);
       \App\Esterilizacao::create([
         'autoclave_id' => $esterilizacao['autoclave_id'],
         'conjunto_id' => $esterilizacao['conjunto_id'],
         'cliente_id' => $esterilizacao['cliente_id'],
         'data_inicio' => $current_time,
         'esterilizacao_inf_extra' => 'teste',
         'admin_id' => Auth::guard('web')->user()->admin_id,
         'rodada'=> $esterilizacao['rodada']+1,
         'Parent_esterilizacao_id'=> $esterilizacao_id
        ]);
      $esterilizacao2 = \App\Esterilizacao::where('data_final', NULL)->where('data_retirada', NULL)->join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->get();
       return view('informacoes.informacoes')
       ->with('esterilizacao', $esterilizacao2);
     } catch (Exception $ex) {
         return 'erro';
     }
    }

    public function destroy($id)
    {
      $current_time = \Carbon\Carbon::now()->toDateTimeString();
     \App\Esterilizacao::where('data_final', '=', NULL)->where('esterilizacao_id',$id)->update([
       'data_final'=>$current_time

     ]);
     $esterilizacao = \App\Esterilizacao::where('data_final', '=', NULL)->where('data_retirada', '=', NULL)->join('cliente', 'cliente.cliente_id','=', 'esterilizacao.cliente_id')->get();
     return view('informacoes.informacoes')
     ->with('esterilizacao', $esterilizacao);
    }
    public function show(){

    }
}

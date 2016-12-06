<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Esterilizacao;
use Illuminate\Support\Facades\Auth;

class RegEsterilizacaoController extends Controller
{
    public function __construct()
   {
       //$this->middleware('client');
       $this->middleware('client');
   }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {


       $autoclave = \App\Autoclave::where('manutencao', 'false')->get();
       $conjunto = \App\Conjunto::all();
       return view('registrar.registrar')
       ->with('autoclave', $autoclave)
       ->with('conjunto', $conjunto);
     }

     public function store(Request $request){
       $this->validate($request, [
         'autoclave_id' => 'required',
         'conjunto_id' => 'required'
    ]);
         try{
           $current_time = \Carbon\Carbon::now()->toDateTimeString();
           $dados=$request->all();
             Esterilizacao::create([
               'autoclave_id' => $dados['autoclave_id'],
               'conjunto_id' => $dados['conjunto_id'],
               'cliente_id' => Auth::guard('client')->user()->cliente_id,
               'data_inicio' => $current_time,
               'esterilizacao_inf_extra' => 'teste',
               'admin_id' => Auth::guard('web')->user()->admin_id,
               'rodada'=> 1
              ]);
               $autoclave = \App\Autoclave::where('manutencao', 'false')->get();
              $conjunto = \App\Conjunto::all();
              //$request->session()->flush();
               return view('registrar.registrar')->with('success','Esterilização cadastrada com sucesso')
                              ->with('autoclave', $autoclave)
                              ->with('conjunto', $conjunto);


         } catch (Exception $ex) {
             return 'erro';
         }

     }
}

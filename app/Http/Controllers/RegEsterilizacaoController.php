<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Esterilizacao;

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


       $autoclave = \App\Autoclave::all();
       $conjunto = \App\Conjunto::all();
       $sala= \App\Sala::all();
       return view('registrar.registrar')
       ->with('autoclave', $autoclave)
       ->with('conjunto', $conjunto);
     }

     public function store(Request $request){
         try{

             $est = new Esterilizacao;
             $est2 = [
                 //'sala_id' => $request->sala,
                 'autoclave_id' => $request->autoclave_id,
                 'conjunto_id' => $request->conjunto,
                 'cliente_id' => Auth::guard('client')->user()->cliente_id,
                 'data_inicio' => date('d/m/y'),
                 'esterilizacao_inf_extra' => 'teste',
                 'admin_id' => Auth::guard('web')->user()->admin_id,
                 'rodada'=> 1
             ];
             $est->create($est2);
             Auth::guard('guard_name')->user()->logout();


         } catch (Exception $ex) {
             return 'erro';
         }

     }
}

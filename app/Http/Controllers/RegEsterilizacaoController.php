<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Esterilizacao;

class RegEsterilizacaoController extends Controller
{
  //public function __construct()
//  {
//      $this->middleware('auth');
//  }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
      $autoclave = \App\Autoclave::all();
      $equipamento = \App\Equipamento::all();
      return view('registrar.registrar')
      ->with('autoclave', $autoclave)
      ->with('equipamento', $equipamento);
     }
     
     public function store(Request $request){
         try{
             
             $est = new Esterilizacao;
             $est2 = [
                 'sala_id' => 1,
                 'autoclave_id' => $request->autoclave_id,
                 'equipamento_id' => $request->equipamento_id,
                 'pessoa_id' => 1,
                 'data_inicio' => date('d/m/y'),
                 'data_final' => date('d/m/y'),
                 'esterilizacao_inf_extra' => 'teste',
                 'recadastro_id' => 1
             ];
             $est->create($est2);
             dd($est2);
             //dd($request->all());
             
         } catch (Exception $ex) {
             return 'erro';
         }
         
     }
}

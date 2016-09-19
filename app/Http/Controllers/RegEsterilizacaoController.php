<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
      $esterilizacoes = \App\Esterilizacao::all();
      $autoclave = \App\Autoclave::all();
      $equipamento = \App\Equipamento::all();
      return view('registrar/registrar')
      ->with('esterilizacao', $esterilizacoes)
      ->with('autoclave', $autoclave)
      ->with('equipamento', $equipamento);
     }
}

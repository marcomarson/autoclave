<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use PDF;

class RelatoriosController extends Controller
{
    public function index(){
      $laboratorista = \App\Admin::all();
      $autoclave = \App\Autoclave::all();
      return view('relatorios.index')->with('laboratorista', $laboratorista)->with('autoclave', $autoclave);
    }

    public function create(){
      $laboratorista = \App\Admin::all();
      $autoclave = \App\Autoclave::all();
      return view('relatorios.index')->with('laboratorista', $laboratorista)->with('autoclave', $autoclave);
    }

    public function store(Request $request){
      $dados=$request->all();
      $esterilizacao = \App\Esterilizacao::all();
      //dd($esterilizacoes);
      if($dados['tipo'] == 1){
        $pdf= PDF::loadView('fail',$dados);
        return $pdf->stream('relatorio.pdf');
      }else {
        $pdf= PDF::loadView('daily',$dados);
        return $pdf->stream('relatorio.pdf');
      }
      //daily vai ser relatório geral
      //fail vai ser relatório de falhas



    }
}

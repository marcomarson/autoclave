<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conjunto;
use App\Sala;
use App\Equipamento;
use App\Conjunto_Equipamento;

use App\Http\Requests;

class ConjuntoController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index(){
        $conjunto = Conjunto::all();
        $sala = Sala::all();
        $equipamento = Equipamento::all();
        return view('conjunto.index')->with('conjunto', $conjunto)->with('sala', $sala)->with('equipamento', $equipamento);
    }

    public function create(){
         $conjunto = Conjunto::all();
         $sala = Sala::all();
         $equipamento = Equipamento::all();
         return view('conjunto.create')->with('conjunto', $conjunto)->with('sala', $sala)->with('equipamento', $equipamento);
    }

    public function update(Request $request, $conjunto_id){


    }

    public function show(){

    }


    public function store(Request $request){

      $this->validate($request, [
        'nome' => 'required|string',
        'equipamento' => 'required'

   ]);
        try{
            $dados=$request->all();
            if(($dados['sala_id'])== ""){
              Conjunto::create([
                'conjuntoequipamentos_nome' => $dados['nome']
              ]);
            }else {

                Conjunto::create([
                  'conjuntoequipamentos_nome' => $dados['nome'],
                  'sala_id' => $dados['sala_id']
                ]);
            }
            $conjunto= \App\Conjunto::where('conjuntoequipamentos_nome', $dados['nome'])->first();
            Conjunto_Equipamento::create([
              'conjunto_id' => $conjunto['conjunto_id'],
              'equipamento_id'=> $dados['equipamento']
            ]);
            if( isset($dados['equipamento1'])){
              Conjunto_Equipamento::create([
              'conjunto_id' => $conjunto['conjunto_id'],
                'equipamento_id'=> $dados['equipamento1']
              ]);
            }
            if( isset($dados['equipamento2'])){
              Conjunto_Equipamento::create([
              'conjunto_id' => $conjunto['conjunto_id'],
                'equipamento_id'=> $dados['equipamento2']
              ]);
            }
            if( isset($dados['equipamento3'])){
              Conjunto_Equipamento::create([
                'conjunto_id' => $conjunto['conjunto_id'],
                'equipamento_id'=> $dados['equipamento3']
              ]);
            }
            if( isset($dados['equipamento4'])){
              Conjunto_Equipamento::create([
                'conjunto_id' => $conjunto['conjunto_id'],
                'equipamento_id'=> $dados['equipamento4']
              ]);
            }
            if( isset($dados['equipamento5'])){
              Conjunto_Equipamento::create([
                'conjunto_id' => $conjunto['conjunto_id'],
                'equipamento_id'=> $dados['equipamento5']
              ]);
            }
            if( isset($dados['equipamento6'])){
              Conjunto_Equipamento::create([
                'conjunto_id' => $conjunto['conjunto_id'],
                'equipamento_id'=> $dados['equipamento6']
              ]);
            }
            if( isset($dados['equipamento7'])){
              Conjunto_Equipamento::create([
                'conjunto_id' => $conjunto['conjunto_id'],
                'equipamento_id'=> $dados['equipamento7']
              ]);
            }
            if( isset($dados['equipamento8'])){
              Conjunto_Equipamento::create([
                'conjunto_id' => $conjunto['conjunto_id'],
                'equipamento_id'=> $dados['equipamento8']
              ]);
            }
            if( isset($dados['equipamento9'])){
              Conjunto_Equipamento::create([
                'conjunto_id' => $conjunto['conjunto_id'],
                'equipamento_id'=> $dados['equipamento9']
              ]);
            }
            if( isset($dados['equipamento10'])){
              Conjunto_Equipamento::create([
                'conjunto_id' => $conjunto['$conjunto_id'],
                'equipamento_id'=> $dados['equipamento10']
              ]);
            }


              return \Redirect::to('conjunto');
        } catch (Exception $ex) {
            return 'erro';
        }
    }

    public function destroy(){

    }
}

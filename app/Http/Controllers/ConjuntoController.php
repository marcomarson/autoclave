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
        return view('conjunto.create')->with('conjunto', $conjunto)->with('sala', $sala)->with('equipamento', $equipamento);
    }

    public function create(){
         $conjunto = Conjunto::all();
        #dd(!$conjunto->isEmpty());
         $sala = Sala::all();
         $equipamento = Equipamento::all();
         return view('conjunto.create')->with('conjunto', $conjunto)->with('sala', $sala)->with('equipamento', $equipamento);
    }

    public function update(Request $request, $conjunto_id){
      $this->validate($request, [
        'nome' => 'required|string',
        'equipamento' => 'required'

   ]);
        try{
            $dados=$request->all();
            if(($dados['sala_id'])== ""){
              Conjunto::where('conjunto_id',$conjunto_id)->update(['conjuntoequipamentos_nome' => $dados['nome']]);
            }else {
              Conjunto::where('conjunto_id',$conjunto_id)->update(['conjuntoequipamentos_nome' => $dados['nome'], 'sala_id' => $dados['sala_id']]);
            }
            $conjunto= \App\Conjunto::where('conjuntoequipamentos_nome', $dados['conjuntoequipamentos_nome'])->first();


            Conjunto_Equipamento::where('conjunto_id',$conjunto_id)->where('equipamento_id',$conjunto['equipamento'])->update(['conjunto_id' => $conjunto['conjunto_id'],'equipamento_id'=> $dados['equipamento']]);

            if( isset($dados['equipamento1'])){
                Conjunto_Equipamento::where('conjunto_id',$conjunto_id)->where('equipamento_id',$conjunto['equipamento1'])->update(['conjunto_id' => $conjunto['conjunto_id'],'equipamento_id'=> $dados['equipamento1']]);

            }
            if( isset($dados['equipamento2'])){
                Conjunto_Equipamento::where('conjunto_id',$conjunto_id)->where('equipamento_id',$conjunto['equipamento2'])->update(['conjunto_id' => $conjunto['conjunto_id'],'equipamento_id'=> $dados['equipamento2']]);
            }
            if( isset($dados['equipamento3'])){
                Conjunto_Equipamento::where('conjunto_id',$conjunto_id)->where('equipamento_id',$conjunto['equipamento3'])->update(['conjunto_id' => $conjunto['conjunto_id'],'equipamento_id'=> $dados['equipamento3']]);
            }
            if( isset($dados['equipamento4'])){
              Conjunto_Equipamento::where('conjunto_id',$conjunto_id)->where('equipamento_id',$conjunto['equipamento4'])->update(['conjunto_id' => $conjunto['conjunto_id'],'equipamento_id'=> $dados['equipamento4']]);
            }
            if( isset($dados['equipamento5'])){
                Conjunto_Equipamento::where('conjunto_id',$conjunto_id)->where('equipamento_id',$conjunto['equipamento5'])->update(['conjunto_id' => $conjunto['conjunto_id'],'equipamento_id'=> $dados['equipamento5']]);
            }
            if( isset($dados['equipamento6'])){
                Conjunto_Equipamento::where('conjunto_id',$conjunto_id)->where('equipamento_id',$conjunto['equipamento6'])->update(['conjunto_id' => $conjunto['conjunto_id'],'equipamento_id'=> $dados['equipamento6']]);
            }
            if( isset($dados['equipamento7'])){
              Conjunto_Equipamento::where('conjunto_id',$conjunto_id)->where('equipamento_id',$conjunto['equipamento7'])->update(['conjunto_id' => $conjunto['conjunto_id'],'equipamento_id'=> $dados['equipamento7']]);
            }
            if( isset($dados['equipamento8'])){
              Conjunto_Equipamento::where('conjunto_id',$conjunto_id)->where('equipamento_id',$conjunto['equipamento8'])->update(['conjunto_id' => $conjunto['conjunto_id'],'equipamento_id'=> $dados['equipamento8']]);
            }
            if( isset($dados['equipamento9'])){
                Conjunto_Equipamento::where('conjunto_id',$conjunto_id)->where('equipamento_id',$conjunto['equipamento9'])->update(['conjunto_id' => $conjunto['conjunto_id'],'equipamento_id'=> $dados['equipamento9']]);
            }
            if( isset($dados['equipamento10'])){
                Conjunto_Equipamento::where('conjunto_id',$conjunto_id)->where('equipamento_id',$conjunto['equipamento10'])->update(['conjunto_id' => $conjunto['conjunto_id'],'equipamento_id'=> $dados['equipamento10']]);
            }


            $conjunto = Conjunto::all();
            $sala = Sala::all();
            $equipamento = Equipamento::all();
            return view('conjunto.create')->with('conjunto', $conjunto)->with('sala', $sala)->with('equipamento', $equipamento)->with('success','Conjunto atualizado com sucesso');
        } catch (Exception $ex) {
            return 'erro';
        }

    }
    public function edit($conjunto_id){
        $sala = Sala::all();
        $equipamento = Equipamento::all();
        $conjunto = Conjunto::where('conjunto_id',$conjunto_id)->first();
        return view('conjunto.edit')->with('conjunto', $conjunto)->with('equipamento', $equipamento)->with('sala', $sala)->with('success','Conjunto atualizado com sucesso');;
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


            $conjunto = Conjunto::all();
            $sala = Sala::all();
            $equipamento = Equipamento::all();
            return view('conjunto.create')->with('conjunto', $conjunto)->with('sala', $sala)->with('equipamento', $equipamento)->with('success','Conjunto criado com sucesso');
        } catch (Exception $ex) {
            return 'erro';
        }
    }

    public function destroy($id){
      $var=Conjunto_Equipamento::where('conjunto_id', $id)->get();

      foreach ($var as $value) {
          Conjunto_Equipamento::where('conjunto_equipamento_id',$value['conjunto_equipamento_id'])->delete();
      }
      $var2=\App\Esterilizacao::where('conjunto_id',$id)->get();
      foreach ($var2 as $value) {
          \App\Esterilizacao::where('esterilizacao_id',$value['esterilizacao_id'])->delete();
      }
        Conjunto::find($id)->disciplina()->delete();
        Conjunto::find($id)->delete();
        $conjunto = Conjunto::all();
        $sala = Sala::all();
        $equipamento = Equipamento::all();
        return view('conjunto.create')->with('conjunto', $conjunto)->with('sala', $sala)->with('equipamento', $equipamento)->with('success','Conjunto deletado com sucesso');
    }
}

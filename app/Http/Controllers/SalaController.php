<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sala;

use App\Http\Requests;

class SalaController extends Controller
{
    public function index(){
        $sala = Sala::all();
        return view('sala.create')->with('sala', $sala);
    }

    public function create(){
         $sala = Sala::all();
        return view('sala.create')->with('sala', $sala);
    }

    public function update(Request $request, $sala_id){
      $sala=$request->all();
      $this->validate($request, [
        'nome' => 'required|string',
        'descricao' => 'required'
      ]);
      try{
          Sala::where('sala_id',$sala_id)->update(['sala_nome' => $sala['nome'], 'descricao' => $sala['descricao']]);
          return redirect()->route('sala.create')
                        ->with('success','Sala atualizada com sucesso');


      } catch (Exception $ex) {
          return 'erro';
      }

    }
    public function edit($sala_id){
      $sala = Sala::where('sala_id',$sala_id)->first();
      return view('sala.edit')->with('sala', $sala);
    }

    public function show(){

    }


    public function store(Request $request){
      $this->validate($request, [
        'nome' => 'required|string',
        'descricao' => 'required'

   ]);
        try{
            $dados=$request->all();

                Sala::create([
                  'sala_nome' => $dados['nome'],
                  'descricao' => $dados['descricao'],
                ]);
                return redirect()->route('sala.create')
                              ->with('success','Sala criada com sucesso');

        } catch (Exception $ex) {
            return 'erro';
        }

    }

    public function destroy($id){
      $varConjunto = \App\Conjunto::where('sala_id', $id)->get();
       foreach ($varConjunto as $value) {
           \App\Conjunto_Equipamento::where('equipamento_id',$value['equipamento_id'])->delete();
       }
       \App\Conjunto::where('sala_id', $id)->delete();
       Sala::where('sala_id', $id)->delete();
      //
      // $var=\App\Conjunto_Equipamento::where('equipamento_id', $id)->get();
        return redirect()->route('sala.create')->with('success','Equipamento deletado com sucesso');
    }
}

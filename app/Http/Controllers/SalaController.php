<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sala;

use App\Http\Requests;

class SalaController extends Controller
{
    public function index(){
        $sala = Sala::orderBy('sala_id', 'desc')->take(7)->get();
        return view('sala.create')->with('sala', $sala);
    }

    public function create(){
         $sala = Sala::orderBy('sala_id', 'desc')->take(7)->get();
        return view('sala.create')->with('sala', $sala);
    }


    public function update(Request $request, $sala_id){
      $sala=$request->all();
      $this->validate($request, [
        'sala_nome' => 'required|string|unique:sala,sala_nome,'.$sala_id.',sala_id',
        'descricao' => 'required'
      ]);
      try{
          Sala::where('sala_id',$sala_id)->update(['sala_nome' => $sala['sala_nome'], 'descricao' => $sala['descricao']]);
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

    public function show($sala_nome){
        $sala = Sala::where('sala_nome', $sala_nome)->get();
        return view('sala.create')->with('sala', $sala);
    }


    public function store(Request $request){
      $this->validate($request, [
        'sala_nome' => 'required|string|unique:sala',
        'descricao' => 'required'

   ]);
        try{
            $dados=$request->all();

                Sala::create([
                  'sala_nome' => $dados['sala_nome'],
                  'descricao' => $dados['descricao'],
                ]);
                $sala = Sala::orderBy('sala_id', 'desc')->take(7)->get();
                return view('sala.create')->with('sala', $sala)->with('success','Sala criada com sucesso');

        } catch (Exception $ex) {
            return 'erro';
        }

    }

    public function destroy($id){
      $var2=\App\Conjunto::where('sala_id', $id)->get();
      foreach ($var2 as $value) {
          \App\Conjunto::find($value['conjunto_id'])->conjunto_equipamento()->delete();
          \App\Conjunto::find($value['conjunto_id'])->disciplina()->delete();
          \App\Conjunto::find($value['conjunto_id'])->esterilizacao()->delete();
          \App\Conjunto::find($value['conjunto_id'])->delete();
      }
       Sala::where('sala_id', $id)->delete();
       $sala = Sala::orderBy('sala_id', 'desc')->take(7)->get();
       return view('sala.create')->with('sala', $sala)->with('success','Sala deletada com sucesso');
    }
}

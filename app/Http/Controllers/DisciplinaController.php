<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conjunto;
use App\Disciplina;

use App\Http\Requests;

class DisciplinaController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index(){
        $conjunto = Conjunto::all();
           $disciplina = Disciplina::all();
        return view('disciplina.create')->with('conjunto', $conjunto)->with('disciplina', $disciplina);
    }

    public function create(){
         $conjunto = Conjunto::all();
         $disciplina = Disciplina::all();
        return view('disciplina.create')->with('conjunto', $conjunto)->with('disciplina', $disciplina);
    }

    public function update(Request $request, $materia_id){
      $this->validate($request, [
        'conjunto_id' => 'required',
        'ano' => 'required|numeric',
        'nome' => 'required|string'

   ]);
        try{
            $dados=$request->all();
              Disciplina::where('materia_id',$materia_id)->update(['conjunto_id' => $dados['conjunto_id'], 'ano' => $dados['ano'], 'materia_nome' => $dados['nome'] ]);
                return redirect()->route('disciplina.create')
                                ->with('success','Disciplina atualizada com sucesso');


        } catch (Exception $ex) {
            return 'erro';
        }

    }
    public function edit($materia_id){
        $conjunto = Conjunto::all();
        $disciplina = Disciplina::where('materia_id',$materia_id)->first();
        return view('disciplina.edit')->with('disciplina', $disciplina)->with('conjunto', $conjunto);
    }

    public function show(){

    }


    public function store(Request $request){

      $this->validate($request, [
        'conjunto_id' => 'required',
        'ano' => 'required|numeric',
        'nome' => 'required|string'

   ]);
        try{
            $dados=$request->all();

                 Disciplina::create([
                  'conjunto_id' => $dados['conjunto_id'],
                  'ano' => $dados['ano'],
                  'materia_nome' => $dados['nome'],
                ]);
                return redirect()->route('disciplina.create')
                                ->with('success','Disciplina cadastrada com sucesso');


        } catch (Exception $ex) {
            return 'erro';
        }
    }

    public function destroy($id){
      $var=\App\Pessoa_disciplina::where('materia_id', $id)->get();

      foreach ($var as $value) {
          \App\Pessoa_disciplina::where('materia_id',$value['materia_id'])->delete();
      }
      Disciplina::find($id)->delete();
       return redirect()->route('disciplina.create')
                       ->with('success','Disciplina deletada com sucesso');
    }
}

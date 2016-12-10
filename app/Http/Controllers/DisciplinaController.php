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
        $disciplina = Disciplina::orderBy('disciplina_id', 'desc')->take(10)->get();
        return view('disciplina.create')->with('conjunto', $conjunto)->with('disciplina', $disciplina);
    }

    public function create(){
         $conjunto = Conjunto::all();
         $disciplina = Disciplina::orderBy('disciplina_id', 'desc')->take(10)->get();
        return view('disciplina.create')->with('conjunto', $conjunto)->with('disciplina', $disciplina);
    }

    public function update(Request $request, $disciplina_id){
      $this->validate($request, [
        'conjunto_id' => 'required',
        'ano' => 'required|numeric',
        'disciplina_nome' => 'required|string'

   ]);
        try{
            $dados=$request->all();
              Disciplina::where('disciplina_id',$disciplina_id)->update(['conjunto_id' => $dados['conjunto_id'], 'ano' => $dados['ano'], 'disciplina_nome' => $dados['disciplina_nome'] ]);
                return redirect()->route('disciplina.create')
                                ->with('success','Disciplina atualizada com sucesso');


        } catch (Exception $ex) {
            return 'erro';
        }

    }
    public function edit($disciplina_id){
        $conjunto = Conjunto::all();
        $disciplina = Disciplina::where('disciplina_id',$disciplina_id)->first();
        return view('disciplina.edit')->with('disciplina', $disciplina)->with('conjunto', $conjunto);
    }

    public function show(){

    }


    public function store(Request $request){

      $this->validate($request, [
        'conjunto_id' => 'required',
        'ano' => 'required|numeric',
        'disciplina_nome' => 'required|string'

   ]);
        try{
            $dados=$request->all();

                 Disciplina::create([
                  'conjunto_id' => $dados['conjunto_id'],
                  'ano' => $dados['ano'],
                  'disciplina_nome' => $dados['disciplina_nome'],
                ]);
                $conjunto = Conjunto::all();
                $disciplina = Disciplina::orderBy('disciplina_id', 'desc')->take(10)->get();
                return view('disciplina.create')->with('conjunto', $conjunto)->with('disciplina', $disciplina)->with('success','Disciplina cadastrada com sucesso');


        } catch (Exception $ex) {
            return 'erro';
        }
    }

    public function destroy($id){
      $var=\App\Pessoa_disciplina::where('disciplina_id', $id)->get();

      foreach ($var as $value) {
          \App\Pessoa_disciplina::where('disciplina_id',$value['disciplina_id'])->delete();
      }
      Disciplina::find($id)->delete();
      $conjunto = Conjunto::all();
      $disciplina = Disciplina::orderBy('disciplina_id', 'desc')->take(10)->get();
      return view('disciplina.create')->with('conjunto', $conjunto)->with('disciplina', $disciplina)->with('success','Disciplina deletada com sucesso');
    }
}

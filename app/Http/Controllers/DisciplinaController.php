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
        return view('disciplina.index')->with('conjunto', $conjunto)->with('disciplina', $disciplina);
    }

    public function create(){
         $conjunto = Conjunto::all();
         $disciplina = Disciplina::all();
        return view('disciplina.create')->with('conjunto', $conjunto)->with('disciplina', $disciplina);
    }

    public function update(Request $request, $conjunto_id){


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
            return \Redirect::to('disciplina');


        } catch (Exception $ex) {
            return 'erro';
        }
    }

    public function destroy(){

    }
}

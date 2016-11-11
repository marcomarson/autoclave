<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conjunto;
use App\Sala;

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
        return view('conjunto.index')->with('conjunto', $conjunto)->with('sala', $sala);
    }

    public function create(){
         $conjunto = Conjunto::all();
         $sala = Sala::all();
        return view('conjunto.create')->with('conjunto', $conjunto)->with('sala', $sala);
    }

    public function update(Request $request, $conjunto_id){


    }

    public function show(){

    }


    public function store(Request $request){

      $this->validate($request, [
        'nome_do_conjunto_de_equipamentos' => 'required|string',
        'sala_id' => 'required'

   ]);
        try{
            $dados=$request->all();

                return Conjunto::create([
                  'conjuntoequipamentos_nome' => $dados['nome_do_conjunto_de_equipamentos'],
                  'sala_id' => $dados['sala_id'],
                ]);
            return \Redirect::to('conjunto');

        } catch (Exception $ex) {
            return 'erro';
        }
    }

    public function destroy(){

    }
}

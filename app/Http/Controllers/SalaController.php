<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sala;

use App\Http\Requests;

class SalaController extends Controller
{
    public function index(){
        $sala = Sala::all();
        return view('sala.index')->with('sala', $sala);
    }

    public function create(){
         $sala = Sala::all();
        return view('sala.create')->with('sala', $sala);
    }

    public function update(Request $request, $sala_id){


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

                return Sala::create([
                  'sala_nome' => $dados['nome'],
                  'descricao' => $dados['descricao'],
                ]);
            return \Redirect::to('sala');

        } catch (Exception $ex) {
            return 'erro';
        }

    }

    public function destroy(){

    }
}

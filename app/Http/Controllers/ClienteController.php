<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

use App\Http\Requests;

class ClienteController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index(){
        $turno = \App\Turno::all();
        $cliente = Cliente::all();
        return view('cliente.index')->with('cliente', $cliente)->with('turno', $turno);
    }

    public function create(){
         $cliente = Cliente::all();
         $turno = \App\Turno::all();
        return view('cliente.create')->with('cliente', $cliente)->with('turno', $turno);
    }

    public function update(Request $request, $cliente_id){


    }

    public function show(){

    }


    public function store(Request $request){

      $this->validate($request, [
        'nome' => 'required|string',
        'email' => 'required|email|max:60|unique:cliente',
        'password' => 'required|confirmed|min:6',
        'password_confirmation' => 'required|same:password',
        'telefone_numero' => 'required|numeric|digits_between:8,9|unique:telefone',
        'telefone_ddd' => 'required|numeric|digits:2',
        'cidade_nome' => 'required'
   ]);
        try{
            $dados=$request->all();
            $cidade= \App\Cidade::where('cidade_nome', strtolower ($dados['cidade_nome']))->first();
            if (is_null($cidade)){
              \App\Cidade::create([
                'cidade_nome' => strtolower($dados['cidade_nome']),
                'cidade_estado' => $dados['cidade_estado']
              ]);
              $cidade= \App\Cidade::where('cidade_nome', strtolower($dados['cidade_nome']))->first();
            }
              \App\Telefone::create([
                'telefone_numero' => $dados['telefone_numero'],
                'telefone_ddd' => $dados['telefone_ddd']
              ]);
              $tel_id= \App\Telefone::where('telefone_numero', $dados['telefone_numero'])->where('telefone_ddd', $dados['telefone_ddd'])->first();

              //dd($tel_id['telefone_id']);
                return Cliente::create([
                  'nome' => $dados['nome'],
                  'email' => $dados['email'],
                  'password' => bcrypt($dados['password']),
                  'cidade_id' => $cidade['cidade_id'],
                  'telefone_id' => $tel_id['telefone_id']
                ]);
            return \Redirect::to('cliente');

        } catch (Exception $ex) {
            return 'erro';
        }
    }

    public function destroy(){

    }
}

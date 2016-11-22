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
       //return view('client.dashboard');
        $turno = \App\Turno::all();
        $cliente = Cliente::all();
        return view('cliente.create')->with('cliente', $cliente)->with('turno', $turno);
    }

    public function create(){
         $cliente = Cliente::all();
         $turno = \App\Turno::all();
        return view('cliente.create')->with('cliente', $cliente)->with('turno', $turno);
    }

    public function update(Request $request, $cliente_id){
      $this->validate($request, [
        'nome' => 'required|string',
        'email' => 'required|email|max:60|unique:cliente',
        'password' => 'required|confirmed|min:6',
        'password_confirmation' => 'required|same:password',
        'telefone_numero' => 'required|numeric|digits_between:8,9|unique:telefone',
        'telefone_ddd' => 'required|numeric|digits:2',
        'cidade_nome' => 'required',
        'ra' => 'numeric|digits_between:8-12|unique:aluno'
   ]);
        try{
            $dados=$request->all();
            Disciplina::where('materia_id',$materia_id)->update(['conjunto_id' => $dados['conjunto_id'], 'ano' => $dados['ano'], 'materia_nome' => $dados['nome'] ]);
            $cidade= \App\Cidade::where('cidade_nome', strtolower ($dados['cidade_nome']))->first();
            if (is_null($cidade)){
              \App\Cidade::create([
                'cidade_nome' => strtolower($dados['cidade_nome']),
                'cidade_estado' => $dados['cidade_estado']
              ]);
              $cidade= \App\Cidade::where('cidade_nome', strtolower($dados['cidade_nome']))->first();
            }
            $clienteupdate= Cliente::where('cliente_id', $cliente_id)->first();
            $tel= \App\Telefone::where('telefone_id',$clienteupdate['telefone_id'])->first();
            if($tel['telefone_numero'] != $dados['telefone_numero']){
                App\Telefone::where('telefone_id',$clienteupdate['telefone_id'])->update(['telefone_numero' => $dados['telefone_numero'], 'telefone_ddd' => $dados['telefone_ddd']]);
            }else {

            }
            $tel= \App\Telefone::where('telefone_id',$dados['telefone_numero'])->first();

              $tel_id= \App\Telefone::where('telefone_numero', $dados['telefone_numero'])->where('telefone_ddd', $dados['telefone_ddd'])->first();

              //dd($tel_id['telefone_id']);
                Cliente::where('cliente_id', $cliente_id)->update([
                  'nome' => $dados['nome'],
                  'email' => $dados['email'],
                  'password' => bcrypt($dados['password']),
                  'cidade_id' => $cidade['cidade_id'],
                  'telefone_id' => $tel['telefone_id']
                ]);
            //return \Redirect::to('cliente');

        } catch (Exception $ex) {
            return 'erro';
        }

    }
    public function edit($cliente_id){
      $turno = \App\Turno::all();
        $cliente = Cliente::where('cliente_id',$cliente_id)->first();
        $tel= \App\Telefone::where('telefone_id', $cliente['telefone_id'])->first();
        $cidade= \App\Cidade::where('cidade_id', $cliente['cidade_id'])->first();
        return view('cliente.edit')->with('cliente', $cliente)->with('turno', $turno)->with('tel',$tel)->with('cidade', $cidade);
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
        'cidade_nome' => 'required',
        'ra' => 'numeric|digits_between:8-12|unique:aluno'
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
               Cliente::create([
                  'nome' => $dados['nome'],
                  'email' => $dados['email'],
                  'password' => bcrypt($dados['password']),
                  'cidade_id' => $cidade['cidade_id'],
                  'telefone_id' => $tel_id['telefone_id']
                ]);
                $clientnovo=Cliente::where('email',$dados['email'])->first();
                if($dados['tipo']=='0'){
                  \App\Aluno::create([
                    'client_id'=>$clientnovo['client_id'],
                    'ra' => $dados['ra']
                  ]);
                }elseif ($dados['tipo']=='1'){
                  \App\Professor::create([
                      'client_id'=>$clientnovo['client_id']
                  ]);
                }elseif ($dados['tipo']=='2'){
                  \App\Pessoas_externas::create([
                      'client_id'=>$clientnovo['client_id']
                  ]);
                }
                return redirect()->route('cliente.create')
                                ->with('success','Cliente cadastrado com sucesso');
            //return \Redirect::to('cliente');

        } catch (Exception $ex) {
            return 'erro';
        }
    }

    public function destroy($cliente_id){
      $clienteupdate= Cliente::where('cliente_id', $cliente_id)->first();
      $varteste=\App\Aluno::where('cliente_id', $cliente_id)->first();
      $varteste2=\App\Professor::where('cliente_id', $cliente_id)->first();
      $varteste3=\App\Pessoas_externas::where('cliente_id', $cliente_id)->first();

      if(!is_null($varteste)){
        \App\Aluno::where('cliente_id', $cliente_id)->delete();
      }elseif(!is_null($varteste2)){
        \App\Professor::where('cliente_id', $cliente_id)->delete();
      }elseif(!is_null($varteste3)){
        \App\Pessoas_externas::where('cliente_id', $cliente_id)->delete();
      }

      Cliente::where('cliente_id', $cliente_id)->delete();
      $tel= \App\Telefone::where('telefone_id',$clienteupdate['telefone_id'])->delete();
      return redirect()->route('cliente.create')
                      ->with('success','Cliente removido com sucesso');


    }
}

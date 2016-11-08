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
        try{
            $cliente = new Cliente;
            $cliente->create($request->all());

            return \Redirect::to('cliente');

        } catch (Exception $ex) {
            return 'erro';
        }
    }

    public function destroy(){

    }
}

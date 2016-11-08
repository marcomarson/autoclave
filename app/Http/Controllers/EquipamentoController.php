<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Equipamento;

use App\Http\Requests;

class EquipamentoController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index(){
        $equip = Equipamento::all();
        return view('equipamento.index')->with('equipamento', $equip);
    }

    public function create(){
         $equip = Equipamento::all();
        return view('equipamento.create')->with('equipamento', $equip);
    }

    public function update(Request $request, $equipamento_id){


    }

    public function show(){

    }


    public function store(Request $request){
        try{
            $equip=$request->all();
            Equipamento::create([
              'equipamento_nome' => $equip['nome']
            ]);

            return \Redirect::to('equipamento');

        } catch (Exception $ex) {
            return 'erro';
        }
    }

    public function destroy(){

    }
}

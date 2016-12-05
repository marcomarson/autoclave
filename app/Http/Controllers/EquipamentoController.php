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
        $equip = Equipamento::orderBy('equipamento_id', 'desc')->take(7)->get();
        return view('equipamento.create')->with('equipamento', $equip);
    }

    public function create(){
        $equip = Equipamento::orderBy('equipamento_id', 'desc')->take(7)->get();
        return view('equipamento.create')->with('equipamento', $equip);
    }

    public function update(Request $request, $equipamento_id){
      $equip=$request->all();
      $this->validate($request, [
        'equipamento_nome' => 'required|string|unique:equipamento'
   ]);
      try{
          Equipamento::where('equipamento_id',$equipamento_id)->update(['equipamento_nome' => $equip['equipamento_nome']]);
          return redirect()->route('equipamento.create')
                        ->with('success','Equipamento atualizado com sucesso');


      } catch (Exception $ex) {
          return 'erro';
      }
    }
    public function edit($equipamento_id){
        $equipamento = Equipamento::where('equipamento_id',$equipamento_id)->first();
        return view('equipamento.edit')->with('equipamento', $equipamento);
    }



    public function show(){

    }


    public function store(Request $request){
      $this->validate($request, [
        'equipamento_nome' => 'required|unique:equipamentoodontologico'
   ]);
        try{
            $equip=$request->all();

            Equipamento::create([
              'equipamento_nome' => $equip['equipamento_nome']
            ]);

            return redirect()->route('equipamento.create')
                            ->with('success','Equipamento cadastrado com sucesso');

        } catch (Exception $ex) {
            return 'erro';
        }
    }

    public function destroy($id){
      $var=Equipamento::find($id)->conjunto_equipamento()->get();
      foreach ($var as $value) {
          \App\Conjunto::where('conjunto_id',$value['conjunto_id'])->first()->conjunto_equipamento()->delete();
          \App\Conjunto::where('conjunto_id',$value['conjunto_id'])->delete();
      }
      Equipamento::find($id)->delete();
       return redirect()->route('equipamento.create')
                       ->with('success','Equipamento deletado com sucesso');
    }
}

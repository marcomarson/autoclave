<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autoclave;

use App\Http\Requests;

class AutoclaveController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function index(){
        $autoclave = Autoclave::all();
        return view('autoclave.create')->with('autoclave', $autoclave);
    }

    public function create(){
      $autoclave = Autoclave::all();
      return view('autoclave.create')->with('autoclave', $autoclave);
    }

    public function update(Request $request, $id){
      $this->validate($request, [
        'marca' => 'required|string',
        'autoclave_inf_extra' => 'string'

   ]);
        try{
            $equip=$request->all();
            Autoclave::where('autoclave_id', $id)->update([
              'autoclave_inf_extra' => $equip['inf'],
              'marca'=>$equip['marca'],
              'manutencao'=>FALSE

            ]);

            return redirect()->route('autoclave.create')
                            ->with('success','Autoclave atualizada com sucesso');

        } catch (Exception $ex) {
            return 'erro';
        }
    }
    public function edit($autoclave_id){
        $autoclave = Autoclave::where('autoclave_id',$autoclave_id)->first();
        return view('autoclave.edit')->with('autoclave', $autoclave);
    }



    public function show(){

    }


    public function store(Request $request){
      $this->validate($request, [
        'marca' => 'required|string',
        'autoclave_inf_extra' => 'string'

   ]);
        try{
            $equip=$request->all();
            if(isset($equip['manutencao'])){
              Autoclave::create([
                'autoclave_inf_extra' => $equip['inf'],
                'marca'=>$equip['marca'],
                'manutencao'=>'true'

              ]);
            }else {
              Autoclave::create([
                'autoclave_inf_extra' => $equip['inf'],
                'marca'=>$equip['marca'],
                'manutencao'=>'false'

              ]);
            }

            return redirect()->route('autoclave.create')
                            ->with('success','Autoclave cadastrada com sucesso');

        } catch (Exception $ex) {
            return 'erro';
        }
    }

    public function destroy($id){
      Autoclave::find($id)->esterilizacao()->delete();
      Autoclave::find($id)->delete();
       return redirect()->route('autoclave.create')
                       ->with('success','Autoclave deletada com sucesso');
    }
}

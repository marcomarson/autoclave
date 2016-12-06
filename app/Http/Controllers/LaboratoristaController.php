<?php

namespace App\Http\Controllers;

use App\Admin;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class LaboratoristaController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    public function index()
    {
    //if (Auth::user()->admin_permissao == true ){
      $turno = \App\Turno::all();
        $Admin = Admin::all();
      return view('laboratorista.create')
      ->with('turno', $turno)->with('admin', $Admin);
    //}
    }
    public function create()
    {
    //if (Auth::user()->admin_permissao == true ){
    $turno = \App\Turno::all();
      $Admin = Admin::all();
    return view('laboratorista.create')
    ->with('turno', $turno)->with('admin', $Admin);
    //}
    }
    public function show(){

    }
    public function update(Request $request, $id){
      $dados=$request->all();
      $clienteupdate= Admin::where('admin_id', $id)->first();
      $tel= \App\Telefone::where('telefone_id',$clienteupdate['telefone_id'])->first();
      $this->validate($request, [
        'nome' => 'required|string',
        'email' => 'required|email|max:60|unique:admin,email,'.$id.',admin_id',
        'password' => 'required|confirmed|min:6',
        'password_confirmation' => 'required|same:password',
        'telefone_numero' => 'required|numeric|digits_between:8,9|unique:telefone,telefone_numero,'.$tel['telefone_id'].',telefone_id',
        'telefone_ddd' => 'required|numeric|digits:2',
        'cidade_nome' => 'required'
   ]);
        try{

            $cidade= \App\Cidade::where('cidade_nome', strtolower ($dados['cidade_nome']))->first();
            if (is_null($cidade)){
              \App\Cidade::create([
                'cidade_nome' => strtolower($dados['cidade_nome']),
                'cidade_estado' => $dados['cidade_estado']
              ]);
              $cidade= \App\Cidade::where('cidade_nome', strtolower($dados['cidade_nome']))->first();
            }
            $clienteupdate= Admin::where('admin_id', $id)->first();
            $tel= \App\Telefone::where('telefone_id',$clienteupdate['telefone_id'])->first();
            if($tel['telefone_numero'] != $dados['telefone_numero']){
                App\Telefone::where('telefone_id',$clienteupdate['telefone_id'])->update(['telefone_numero' => $dados['telefone_numero'], 'telefone_ddd' => $dados['telefone_ddd']]);
            }else {

            }
            $tel2= \App\Telefone::where('telefone_id',$clienteupdate['telefone_id'])->first();
            $tel= \App\Telefone::where('telefone_id',$tel2['telefone_id'])->first();

              $tel_id= \App\Telefone::where('telefone_numero', $dados['telefone_numero'])->where('telefone_ddd', $dados['telefone_ddd'])->first();

              //dd($tel_id['telefone_id']);
                Admin::where('admin_id', $id)->update([
                  'nome' => $dados['nome'],
                  'email' => $dados['email'],
                  'password' => bcrypt($dados['password']),
                  'cidade_id' => $cidade['cidade_id'],
                  'telefone_id' => $tel['telefone_id'],
                  'turno_id'=> $dados['turno_id']
                ]);
                return redirect()->route('laboratorista.create')
                                ->with('success','Laboratorista atualizada com sucesso');
            //return \Redirect::to('cliente');

        } catch (Exception $ex) {
            return 'erro';
        }

    }
    public function edit($id){
      $turno = \App\Turno::all();
        $admin= Admin::where('admin_id',$id)->first();
        $tel= \App\Telefone::where('telefone_id', $admin['telefone_id'])->first();
        $cidade= \App\Cidade::where('cidade_id', $admin['cidade_id'])->first();
        return view('laboratorista.edit')->with('admin', $admin)->with('turno', $turno)->with('tel',$tel)->with('cidade', $cidade);
    }




    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Admin
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'nome' => 'required|string',
        'email' => 'required|email|max:60|unique:admin',
        'password' => 'required|confirmed|min:6',
        'password_confirmation' => 'required|same:password',
        'telefone_numero' => 'required|numeric|digits_between:8,9|unique:telefone',
        'telefone_ddd' => 'required|numeric|digits:2',
        'cidade_nome' => 'required'
   ]);
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
             Admin::create([
                'nome' => $dados['nome'],
                'email' => $dados['email'],
                'password' => bcrypt($dados['password']),
                'cidade_id' => $cidade['cidade_id'],
                'telefone_id' => $tel_id['telefone_id'],
                'turno_id' => $dados['turno_id']
              ]);

              return redirect()->route('laboratorista.create')
                              ->with('success','Laboratorista criada com sucesso');

      }
      public function destroy($id){
        $clienteupdate= Admin::where('admin_id', $id)->first();

        Admin::where('admin_id', $id)->first()->esterilizacao()->delete();

        Admin::where('admin_id', $id)->delete();
        \App\Telefone::where('telefone_id',$clienteupdate['telefone_id'])->delete();
        return redirect()->route('laboratorista.create')
                        ->with('success','Laboratorista removida com sucesso');

}
}

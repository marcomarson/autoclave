<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
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
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
          'nome' => 'required|string',
          'email' => 'required|email|max:60|unique:admin',
          'password' => 'required|confirmed|min:6',
          'password_confirmation' => 'required|same:password',
          'telefone_numero' => 'required|numeric|digits_between:8,9|unique:telefone',
          'telefone_ddd' => 'required|numeric|digits:2'

        ]);
    }

    public function index()
    {
     $cidade = \App\Cidade::all();
     $turno = \App\Turno::all();
     return view('auth.register')
     ->with('cidade', $cidade)
     ->with('turno', $turno);
    }




    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Admin
     */
    protected function create(array $dados)
    {
          $cidade= \App\Cidade::where('cidade_nome', $dados['cidade_nome'])->first();
          if (is_null($cidade)){
            \App\Cidade::create([
              'cidade_nome' => $dados['cidade_nome'],
              'cidade_estado' => $dados['cidade_estado']
            ]);
            $cidade= \App\Cidade::where('cidade_nome', $dados['cidade_nome'])->first();
          }

            \App\Telefone::create([
              'telefone_numero' => $dados['telefone_numero'],
              'telefone_ddd' => $dados['telefone_ddd']
            ]);
            $tel_id= \App\Telefone::where('telefone_numero', $dados['telefone_numero'])->where('telefone_ddd', $dados['telefone_ddd'])->first();
            //dd($tel_id['telefone_id']);
              return Admin::create([
                'nome' => $dados['nome'],
                'email' => $dados['email'],
                'password' => bcrypt($dados['password']),
                'cidade_id' => $cidade['cidade_id'],
                'telefone_id' => $tel_id['telefone_id'],
                'turno_id' => $dados['turno_id']
              ]);


      }
}

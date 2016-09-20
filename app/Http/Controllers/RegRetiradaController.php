<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Esterilizacao;
use App\Http\Requests;

class RegRetiradaController extends Controller
{
    public function index(){
        $est = Esterilizacao::all();
        return view('retirada.index')
                ->with('esterilizacao', $est);
        
    }
    
    
}

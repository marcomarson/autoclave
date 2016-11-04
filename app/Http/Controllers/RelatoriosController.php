<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RelatoriosController extends Controller
{
    //
    public function index(){
        return view('relatorios.index');

    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sala;

use App\Http\Requests;

class SalaController extends Controller
{
    public function index(){
        $sala = Sala::all();
        return view('sala.index')->with('sala', $sala);        
    }
    
    public function create(){
         $sala = Sala::all();
        return view('sala.create')->with('sala', $sala);         
    }
    
    public function update(Request $request, $id_sala){
        
        
    }
    
    public function show(){
        
    }


    public function store(Request $request){
        try{
            $sala = new Sala;
            $sala->create($request->all());
            
            return \Redirect::to('sala');
            
        } catch (Exception $ex) {
            return 'erro';
        }
    }
    
    public function destroy(){
        
    }
}

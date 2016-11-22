<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use PDF;

class PDFController extends Controller
{
    //
    public function index()
    {
     $esterilizacao = \App\Esterilizacao::all();
     //dd($esterilizacoes);
     $pdf= PDF::loadView('daily');
     return $pdf->stream();
     //return $pdf->download('dailyreport.pdf');

    }
    public function index2()
    {
     $esterilizacao = \App\Esterilizacao::all();
     //dd($esterilizacoes);
     $pdf= PDF::loadView('daily');
     return $pdf->stream();
     //return $pdf->download('dailyreport.pdf');

    }
    public function index3()
    {
     $esterilizacao = \App\Esterilizacao::all();
     //dd($esterilizacoes);
     $pdf= PDF::loadView('daily');
     return $pdf->stream();
     //return $pdf->download('dailyreport.pdf');

    }

}

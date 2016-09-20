<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::auth();

Route::get('/', 'HomeController@index');
//Route::get('/', 'regEsterilizacao@registrar');
Route::get('home', function () {
    return view('home'); //tela de entrada deverá ser a de login
});
Route::get('menu', function () {
    return view('menu'); //tela de entrada deverá ser a de login
});

Route::resource('info', 'InformacoesController');
Route::resource('regEsterilizacao', 'RegEsterilizacaoController');
Route::resource('retirada', 'RegRetiradaController');
Route::resource('sala', 'SalaController');


Route::get('regNovamente', function () {
    return 'Registrar Esterilização do Equipamento novamente (Não implementado)';
});
Route::get('Termino', function () {
    return 'Registrar Término da autoclave (Não implementado)';
});
Route::get('Relatorios', function () {
    return 'Mostrar relatórios pertinentes ao uso das autoclaves(Não implementado)';
});

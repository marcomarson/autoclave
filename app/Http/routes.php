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
// Route::auth();
//
// Route::get('/', 'HomeController@index');
// //Route::get('/', 'regEsterilizacao@registrar');
// Route::get('home', function () {
//     return view('home'); //tela de entrada deverá ser a de login
// });
// Route::get('menu', function () {
//     return view('menu'); //tela de entrada deverá ser a de login
// });





Route::get('regNovamente', function () {
    return 'Registrar Esterilização do Equipamento novamente (Não implementado)';
});
Route::get('Termino', function () {
    return 'Registrar Término da autoclave (Não implementado)';
});
Route::get('Relatorios', function () {
    return 'Mostrar relatórios pertinentes ao uso das autoclaves(Não implementado)';
});


Route::group(['middleware' => 'web'], function () {
    Route::resource('sala', 'SalaController');
    Route::resource('cliente', 'ClienteController');
    Route::resource('equipamento', 'EquipamentoController');

    Route::resource('info', 'InformacoesController');
    Route::resource('regEsterilizacao', 'RegEsterilizacaoController');
    Route::resource('retirada', 'RegRetiradaController');
    Route::resource('relatorios', 'RelatoriosController');

    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');

    Route::get('register', 'Auth\AuthController@index');
    Route::post('register', 'Auth\AuthController@register');

    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');

    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');
});

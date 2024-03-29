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

Route::get('register2', 'Auth\AuthController2@index');
Route::post('register2', 'Auth\AuthController2@register');
Route::group(['middleware' => 'web'], function () {
    Route::resource('sala', 'SalaController');
    Route::resource('cliente', 'ClienteController');
    Route::resource('equipamento', 'EquipamentoController');
    Route::resource('conjunto', 'ConjuntoController');
    Route::resource('disciplina', 'DisciplinaController');
    Route::resource('autoclave', 'AutoclaveController');
    Route::resource('laboratorista', 'LaboratoristaController');

    Route::resource('info', 'InformacoesController');
    Route::resource('retirada', 'RegRetiradaController');
    Route::resource('relatorios', 'RelatoriosController');

    Route::get('/pdfdaily','PDFController@index');
    Route::get('/pdfmonth','PDFController@index2');
    Route::get('/pdfyear','PDFController@index3');
    Route::get('/daily','PDFController@controlarelatorio');


    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');

    Route::get('reg', 'ClientAuth\AuthController@logout');
    Route::get('account/sign-out', 'ClientAuth\AuthController@logout');




    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');

    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

    Route::get('/client/login','ClientAuth\AuthController@showLoginForm');
    Route::post('/client/login','ClientAuth\AuthController@login');
    Route::get('/client/logout','ClientAuth\AuthController@logout');


    // Registration Routes...
    Route::get('client/register', 'ClientAuth\AuthController@showRegistrationForm');
    Route::post('client/register', 'ClientAuth\AuthController@register');
    Route::resource('regEsterilizacao', 'RegEsterilizacaoController');
// GET     /users                      index   users.index
// GET     /users/create               create  users.create
// POST    /users                      store   users.store
// GET     /users/{user}               show    users.show
// GET     /users/{user}/edit          edit    users.edit
// PUT     /users/{user}               update  users.update
// DELETE  /users/{user}               destroy users.destroy

});

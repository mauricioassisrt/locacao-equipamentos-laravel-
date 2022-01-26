<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */

Route::get('/', function () {
    return view('auth.login');
});


Auth::routes();

//relatorios

$this->get('relatorioMensal', 'ControlerRelatorio@mensal')->name('mensal');
Route::post('relatorioMensal/relatorioPorPeriodo', 'ControlerRelatorio@emitirmensal');
$this->get('relatorioFaturamento', 'ControlerRelatorio@faturamento')->name('faturamento');
Route::post('relatorioFaturamento/relatorioFaturamento', 'ControlerRelatorio@emitirfaturamento');
$this->get('relatorioFaturamentoEquip', 'ControlerRelatorio@faturamentoEquip')->name('faturamentoEquip');
Route::post('relatorioFaturamento/relatorioFaturamentoEquipamento', 'ControlerRelatorio@emitirfaturamentoEquipamento');
Route::post('relatorioEquipamento/relatorioEquipamento', 'ControlerRelatorio@emitirEquipamento');


//principal 
Route::get('/home', 'HomeController@dashboard');
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/dashboard', 'HomeController@dashboard');
Route::get('/erro', 'HomeController@erro');
Route::get('/erros', 'HomeController@sem');


//locações ITENS
Route::get('locados', 'ControlerIten@index');
Route::patch('equipamentosItens/update/{notice}', 'ControlerIten@update');
Route::get('locarEquipamento/cadastrar', 'ControlerIten@cadastrar');
Route::post('locarEquipamento/insert', 'ControlerIten@insert');
Route::patch('locados/deletar/{formaPagamentos}', 'ControlerIten@deletar');

//formapagamentos

Route::get('formaPagamentos', 'FormaPagamentoController@index');
Route::get('formaPagamentos/cadastrar', 'FormaPagamentoController@cadastrar');
Route::post('formaPagamentos/insert', 'FormaPagamentoController@insert');
Route::get('formaPagamentos/editar/{formaPagamentos}', 'FormaPagamentoController@editar');
Route::patch('formaPagamentos/update/{formaPagamentos}', 'FormaPagamentoController@update');
Route::get('formaPagamentos/deletar/{formaPagamentos}', 'FormaPagamentoController@deletar');


//periodos
Route::get('periodos', 'ControllerPeriodo@index');
Route::get('periodos/cadastrar', 'ControllerPeriodo@cadastrar');
Route::post('periodos/insert', 'ControllerPeriodo@insert');
Route::get('periodos/editar/{notice}', 'ControllerPeriodo@editar');
Route::patch('periodos/update/{notice}', 'ControllerPeriodo@update');
Route::get('periodos/deletar/{notice}', 'ControllerPeriodo@deletar');

//equipamentos 
Route::get('equipamentos', 'EquipamentoController@index');
Route::get('equipamentos/cadastrar', 'EquipamentoController@cadastrar');
Route::post('equipamentos/insert', 'EquipamentoController@insert');
//Route::get('empresas/editar/{notice}', 'EmpresaController@editar');
Route::patch('equipamentos/update/{notice}', 'EquipamentoController@update');
Route::get('equipamentos/deletar/{notice}', 'EquipamentoController@deletar');
Route::get('equipamentos/painel', 'EquipamentoController@painel');
Route::get('equipamentos/editar/{user}', 'EquipamentoController@editar');

//empresas
Route::get('empresas', 'EmpresaController@index');
Route::get('empresas/cadastrar', 'EmpresaController@cadastrar');
Route::post('empresas/insert', 'EmpresaController@insert');
//Route::get('empresas/editar/{notice}', 'EmpresaController@editar');
Route::patch('empresas/update/{notice}', 'EmpresaController@update');
Route::get('empresas/deletar/{notice}', 'EmpresaController@deletar');
Route::get('empresas/painel', 'EmpresaController@painel');
Route::get('empresas/editar/{user}', 'EmpresaController@editar');

//pecas
Route::get('pecas', 'PecaController@index');
Route::get('pecas/cadastrar', 'PecaController@cadastrar');
Route::post('pecas/insert', 'PecaController@insert');
//Route::get('empresas/editar/{notice}', 'EmpresaController@editar');
Route::patch('pecas/update/{notice}', 'PecaController@update');
Route::get('pecas/deletar/{notice}/{var}/{var2}', 'PecaController@deletar');
Route::get('pecas/painel', 'PecaController@painel');
Route::get('pecas/editar/{user}', 'PecaController@editar');
//reparos
Route::get('reparos', 'PecaController@reparos');
Route::get('reparos/cadastrar', 'PecaController@cadastrarReparo');
Route::get('reparos/detalhes', 'PecaController@detalhesReparo');
Route::post('reparos/finalizar', 'PecaController@insertReparo');
Route::post('reparos/concluir', 'PecaController@concluir');

Route::patch('reparos/update/{notice}', 'PecaController@updateReparo');
Route::get('reparos/deletar/{notice}/{var}', 'PecaController@deletarReparo');
Route::get('reparos/editar/{user}', 'PecaController@editarReparo');

//locadors
Route::get('locadors', 'LocadorController@index');
Route::get('locadors/cadastrar', 'LocadorController@cadastrar');
Route::post('locadors/insert', 'LocadorController@insert');
Route::post('locadors/insertIten', 'LocadorController@insertIten');

//Route::get('empresas/editar/{notice}', 'EmpresaController@editar');
Route::patch('locadors/update/{notice}', 'LocadorController@update');
Route::get('locadors/deletar/{notice}', 'LocadorController@deletar');
Route::get('locadors/painel', 'LocadorController@painel');
Route::get('locadors/editar/{user}', 'LocadorController@editar');

//posts
Route::get('posts', 'PostsController@index');
Route::get('posts/cadastrar', 'PostsController@cadastrar');
Route::post('posts/insert', 'PostsController@insert');
Route::get('posts/editar/{post}', 'PostsController@editar');
Route::patch('posts/update/{post}', 'PostsController@update');
Route::get('posts/deletar/{post}', 'PostsController@deletar');
Route::get('posts/painel', 'PostsController@painel');

//Usuarios
Route::get('users/', 'UsersController@index');
Route::get('autenticar/{id}', 'UsersController@autenticar');
Route::get('users/cadastrar', 'UsersController@cadastrar');
Route::post('users/insert', 'UsersController@insert');
Route::get('users/editar/{user}', 'UsersController@editar');
Route::patch('users/update/{uer}', 'UsersController@update');
Route::get('users/deletar/{user}', 'UsersController@deletar');
Route::get('users/visualizar/{user}', 'UsersController@view');
Route::post('users/user_role', 'UsersController@user_role');



//Acls
Route::get('acl/roles', 'Permissions_rolesController@roles');
Route::get('acl/permissions', 'Permissions_rolesController@permissions');
Route::get('acl/role_view/{role}', 'Permissions_rolesController@view_role');

Route::get('acl/role_cadastrar', 'Permissions_rolesController@cadastrar_role');
Route::get('acl/permission_cadastrar', 'Permissions_rolesController@cadastrar_permission');
Route::post('acl/role_insert', 'Permissions_rolesController@insert_role');
Route::post('acl/permission_insert', 'Permissions_rolesController@insert_permission');
Route::get('acl/role_delete/{role}', 'Permissions_rolesController@deletar_role');
Route::post('acl/role_permissions', 'Permissions_rolesController@role_permissions');

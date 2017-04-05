<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::resource('home', 'HomeController');
Route::resource('admins', 'AdminController');
Route::resource('users', 'UserController');
Route::resource('ship_project', 'ShipProjectController');
Route::resource('worker', 'WorkerController');
Route::resource('machine', 'MachineController');

Route::any('material_list', ['as'=>'material_list', 'uses'=>'MaterialListController@index']);
Route::any('assembly_part', ['as'=>'assembly_part', 'uses'=>'AssemblyPartListController@index']);

Route::any('input_worker', ['as'=>'input_worker', 'uses'=>'WorkerController@index']);
Route::any('recap_worker', ['as'=>'recap_worker', 'uses'=>'WorkerController@recap_worker']);

Route::any('ssh_menu', ['as'=>'ssh_menu', 'uses'=>'SSHController@index']);
Route::any('fabrication_menu', ['as'=>'fabrication_menu', 'uses'=>'FabricationController@index']);
Route::any('subassembly_menu', ['as'=>'subassembly_menu', 'uses'=>'SubAssemblyController@index']);
Route::any('assembly_menu', ['as'=>'assembly_menu', 'uses'=>'AssemblyController@index']);
Route::any('bbs_menu', ['as'=>'bbs_menu', 'uses'=>'BBSController@index']);
Route::any('erection_menu', ['as'=>'erection_menu', 'uses'=>'ErectionController@index']);

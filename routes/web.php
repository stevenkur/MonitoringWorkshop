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
Route::resource('usermain', 'UserMainController');
Route::resource('users', 'UserController');
Route::resource('ship_project', 'ShipProjectController');
Route::resource('worker', 'WorkerController');
Route::resource('machine', 'MachineController');
Route::resource('material_list', 'MaterialListController');
Route::resource('assembly_part', 'AssemblyPartListController');

Route::any('ssh_menu', ['as'=>'ssh_menu', 'uses'=>'SSHController@index']);
Route::any('fabrication_menu', ['as'=>'fabrication_menu', 'uses'=>'FabricationController@index']);
Route::any('subassembly_menu', ['as'=>'subassembly_menu', 'uses'=>'SubAssemblyController@index']);
Route::any('assembly_menu', ['as'=>'assembly_menu', 'uses'=>'AssemblyController@index']);
Route::any('bbs_menu', ['as'=>'bbs_menu', 'uses'=>'BBSController@index']);
Route::any('erection_menu', ['as'=>'erection_menu', 'uses'=>'ErectionController@index']);


Route::any('input_material_ssh', ['as'=>'input_material_ssh', 'uses'=>'UserMainController@input_material_ssh']);
Route::any('ssh_recap_material_coming', ['as'=>'ssh_recap_material_coming', 'uses'=>'UserMainController@ssh_recap_material_coming']);
Route::any('ssh_recap_material_process', ['as'=>'ssh_recap_material_process', 'uses'=>'UserMainController@ssh_recap_material_process']);
Route::any('input_act_ssh', ['as'=>'input_act_ssh', 'uses'=>'UserMainController@input_act_ssh']);
Route::any('ssh_recap_progress_activity', ['as'=>'ssh_recap_progress_activity', 'uses'=>'UserMainController@ssh_recap_progress_activity']);

Route::any('input_act_erection', ['as'=>'input_act_erection', 'uses'=>'UserMainController@input_act_erection']);
Route::any('erection_recap_block', ['as'=>'erection_recap_block', 'uses'=>'UserMainController@erection_recap_block']);
Route::any('erection_recap_worker', ['as'=>'erection_recap_worker', 'uses'=>'UserMainController@erection_recap_worker']);
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
    return view('auth/login');
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
Route::resource('block', 'BlockController');
Route::resource('panel', 'PanelController');

Route::any('ssh_menu', ['as'=>'ssh_menu', 'uses'=>'SSHController@index']);
Route::any('fabrication_menu', ['as'=>'fabrication_menu', 'uses'=>'FabricationController@index']);
Route::any('subassembly_menu', ['as'=>'subassembly_menu', 'uses'=>'SubAssemblyController@index']);
Route::any('assembly_menu', ['as'=>'assembly_menu', 'uses'=>'AssemblyController@index']);
Route::any('bbs_menu', ['as'=>'bbs_menu', 'uses'=>'BBSController@index']);
Route::any('erection_menu', ['as'=>'erection_menu', 'uses'=>'ErectionController@index']);

Route::any('input_material_ssh', ['as'=>'input_material_ssh', 'uses'=>'UserSSHController@input_material_ssh']);
Route::any('confirm_material', ['as'=>'confirm_material', 'uses'=>'UserSSHController@confirm_material']);
Route::any('ssh_recap_material_coming', ['as'=>'ssh_recap_material_coming', 'uses'=>'UserSSHController@ssh_recap_material_coming']);
Route::any('ssh_recap_material_process', ['as'=>'ssh_recap_material_process', 'uses'=>'UserSSHController@ssh_recap_material_process']);
Route::any('input_act_ssh', ['as'=>'input_act_ssh', 'uses'=>'UserSSHController@input_act_ssh']);
Route::any('ssh_recap_progress_activity', ['as'=>'ssh_recap_progress_activity', 'uses'=>'UserSSHController@ssh_recap_progress_activity']);

Route::any('input_act_fabrication', ['as'=>'input_act_fabrication', 'uses'=>'UserFabricationController@input_act_fabrication']);
Route::any('fabrication_recap_material_process', ['as'=>'fabrication_recap_material_process', 'uses'=>'UserFabricationController@fabrication_recap_material_process']);
Route::any('fabrication_recap_worker', ['as'=>'fabrication_recap_worker', 'uses'=>'UserFabricationController@fabrication_recap_worker']);
Route::any('fabrication_recap_progress_activity', ['as'=>'fabrication_recap_progress_activity', 'uses'=>'UserFabricationController@fabrication_recap_progress_activity']);

Route::any('input_act_subassembly', ['as'=>'input_act_subassembly', 'uses'=>'UserSubAssemblyController@input_act_subassembly']);
Route::any('subassembly_recap_worker', ['as'=>'subassembly_recap_worker', 'uses'=>'UserSubAssemblyController@subassembly_recap_worker']);

Route::any('input_act_assembly', ['as'=>'input_act_assembly', 'uses'=>'UserAssemblyController@input_act_assembly']);
Route::any('assembly_recap_worker', ['as'=>'assembly_recap_worker', 'uses'=>'UserAssemblyController@assembly_recap_worker']);

Route::any('input_act_bbs', ['as'=>'input_act_bbs', 'uses'=>'UserBBSController@input_act_bbs']);
Route::any('bbs_recap_material_process', ['as'=>'bbs_recap_material_process', 'uses'=>'UserBBSController@bbs_recap_material_process']);
Route::any('bbs_recap_worker', ['as'=>'bbs_recap_worker', 'uses'=>'UserBBSController@bbs_recap_worker']);
Route::any('bbs_calculate_paint_needs', ['as'=>'bbs_calculate_paint_needs', 'uses'=>'UserBBSController@bbs_calculate_paint_needs']);

Route::any('input_act_erection', ['as'=>'input_act_erection', 'uses'=>'UserErectionController@input_act_erection']);
Route::any('erection_recap_block', ['as'=>'erection_recap_block', 'uses'=>'UserErectionController@erection_recap_block']);
Route::any('erection_recap_worker', ['as'=>'erection_recap_worker', 'uses'=>'UserErectionController@erection_recap_worker']);

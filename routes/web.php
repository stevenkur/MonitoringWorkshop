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
Route::post('loginvalidate','HomeController@loginvalidate');
Route::get('logout','HomeController@logout');
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
Route::post('confirm_material_plate/{id}', ['as'=>'confirm_material_plate', 'uses'=>'UserSSHController@confirm_material_plate']);
Route::post('confirm_material_profile/{id}', ['as'=>'confirm_material_profile', 'uses'=>'UserSSHController@confirm_material_profile']);
Route::any('input_act_ssh', ['as'=>'input_act_ssh', 'uses'=>'UserSSHController@input_act_ssh']);
Route::any('input_works_ssh', ['as'=>'input_works_ssh', 'uses'=>'UserSSHController@works']);
Route::any('ssh_recap_material_coming', ['as'=>'ssh_recap_material_coming', 'uses'=>'UserSSHController@ssh_recap_material_coming']);
Route::any('ssh_recap_material_process', ['as'=>'ssh_recap_material_process', 'uses'=>'UserSSHController@ssh_recap_material_process']);
Route::any('ssh_recap_worker', ['as'=>'ssh_recap_worker', 'uses'=>'UserSSHController@ssh_recap_worker']);
Route::any('ssh_recap_progress_activity', ['as'=>'ssh_recap_progress_activity', 'uses'=>'UserSSHController@ssh_recap_progress_activity']);

Route::any('input_act_fabrication', ['as'=>'input_act_fabrication', 'uses'=>'UserFabricationController@input_act_fabrication']);
Route::any('input_works_fabrication', ['as'=>'input_works_fabrication', 'uses'=>'UserFabricationController@works']);
Route::any('fabrication_recap_material_process', ['as'=>'fabrication_recap_material_process', 'uses'=>'UserFabricationController@fabrication_recap_material_process']);
Route::any('fabrication_recap_worker', ['as'=>'fabrication_recap_worker', 'uses'=>'UserFabricationController@fabrication_recap_worker']);
Route::any('fabrication_recap_progress_activity', ['as'=>'fabrication_recap_progress_activity', 'uses'=>'UserFabricationController@fabrication_recap_progress_activity']);

Route::any('input_act_subassembly', ['as'=>'input_act_subassembly', 'uses'=>'UserSubAssemblyController@input_act_subassembly']);
Route::any('input_works_subassembly', ['as'=>'input_works_subassembly', 'uses'=>'UserSubAssemblyController@works']);
Route::any('subassembly_recap_join_part_process', ['as'=>'subassembly_recap_join_part_process', 'uses'=>'UserSubAssemblyController@subassembly_recap_join_part_process']);
Route::any('subassembly_recap_worker', ['as'=>'subassembly_recap_worker', 'uses'=>'UserSubAssemblyController@subassembly_recap_worker']);
Route::any('subassembly_recap_progress_activity', ['as'=>'subassembly_recap_progress_activity', 'uses'=>'UserSubAssemblyController@subassembly_recap_progress_activity']);

Route::any('input_act_assembly', ['as'=>'input_act_assembly', 'uses'=>'UserAssemblyController@input_act_assembly']);
Route::any('input_works_assembly', ['as'=>'input_works_assembly', 'uses'=>'UserAssemblyController@works']);
Route::any('assembly_recap_join_panel_process', ['as'=>'assembly_recap_join_panel_process', 'uses'=>'UserAssemblyController@assembly_recap_join_panel_process']);
Route::any('assembly_recap_worker', ['as'=>'assembly_recap_worker', 'uses'=>'UserAssemblyController@assembly_recap_worker']);
Route::any('assembly_recap_progress_activity', ['as'=>'assembly_recap_progress_activity', 'uses'=>'UserAssemblyController@assembly_recap_progress_activity']);

Route::any('bbs_calculate_paint_needs', ['as'=>'bbs_calculate_paint_needs', 'uses'=>'UserBBSController@bbs_calculate_paint_needs']);
Route::any('bbs_delete_paint_needs/{id}', ['as'=>'bbs_delete_paint_needs', 'uses'=>'UserBBSController@destroy']);
Route::any('add_rooms', ['as'=>'add_rooms', 'uses'=>'UserBBSController@add_rooms']);
Route::any('input_act_bbs', ['as'=>'input_act_bbs', 'uses'=>'UserBBSController@input_act_bbs']);
Route::any('input_works_bbs', ['as'=>'input_works_bbs', 'uses'=>'UserBBSController@works']);
Route::any('bbs_recap_material_process', ['as'=>'bbs_recap_material_process', 'uses'=>'UserBBSController@bbs_recap_material_process']);
Route::any('bbs_recap_worker', ['as'=>'bbs_recap_worker', 'uses'=>'UserBBSController@bbs_recap_worker']);;

Route::any('input_act_erection', ['as'=>'input_act_erection', 'uses'=>'UserErectionController@input_act_erection']);
Route::any('erection_recap_block', ['as'=>'erection_recap_block', 'uses'=>'UserErectionController@erection_recap_block']);
Route::any('erection_recap_worker', ['as'=>'erection_recap_worker', 'uses'=>'UserErectionController@erection_recap_worker']);

Route::any('total_ship_progress', ['as'=>'total_ship_progress', 'uses'=>'AdminController@total_ship_progress']);
Route::any('planning_workload', ['as'=>'planning_workload', 'uses'=>'AdminController@planning_workload']);
Route::any('conclusion_all_project', ['as'=>'conclusion_all_project', 'uses'=>'AdminController@conclusion_all_project']);
Route::any('conclusion_finishing_workload', ['as'=>'conclusion_finishing_workload', 'uses'=>'AdminController@conclusion_finishing_workload']);
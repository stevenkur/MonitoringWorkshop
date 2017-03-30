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
Route::get('register_user', ['as'=>'register_user', 'uses'=>'AdminController@register_user']);
Route::get('recap_user', ['as'=>'recap_user', 'uses'=>'AdminController@recap_user']);
Route::get('ship_project', ['as'=>'ship_project', 'uses'=>'AdminController@ship_project']);
Route::post('ship_project', ['as'=>'ship_project', 'uses'=>'AdminController@ship_project']);
Route::get('material_list', ['as'=>'material_list', 'uses'=>'AdminController@material_list']);
Route::get('assembly_part', ['as'=>'assembly_part', 'uses'=>'AdminController@assembly_part']);
Route::get('input_machine', ['as'=>'input_machine', 'uses'=>'AdminController@input_machine']);
Route::get('recap_machine', ['as'=>'recap_machine', 'uses'=>'AdminController@recap_machine']);
Route::get('input_worker', ['as'=>'input_worker', 'uses'=>'AdminController@input_worker']);
Route::get('recap_worker', ['as'=>'recap_worker', 'uses'=>'AdminController@recap_worker']);
Route::get('ssh_menu', ['as'=>'ssh_menu', 'uses'=>'AdminController@ssh_menu']);
Route::get('fabrication_menu', ['as'=>'fabrication_menu', 'uses'=>'AdminController@fabrication_menu']);
Route::get('subassembly_menu', ['as'=>'subassembly_menu', 'uses'=>'AdminController@subassembly_menu']);
Route::get('assembly_menu', ['as'=>'assembly_menu', 'uses'=>'AdminController@assembly_menu']);
Route::get('bbs_menu', ['as'=>'bbs_menu', 'uses'=>'AdminController@bbs_menu']);
Route::get('erection_menu', ['as'=>'erection_menu', 'uses'=>'AdminController@erection_menu']);

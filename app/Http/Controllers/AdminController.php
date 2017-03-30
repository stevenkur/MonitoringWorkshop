<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class AdminController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
    public function index()
    {
        return view('dashboard/index');
    }

    public function register_user()
    {
        return view('dashboard/register_new_user');
    }

    public function recap_user()
    {
        return view('dashboard/recapitulation_user');
    }
    
    public function ship_project(Request $request)
    {
        if($request->isMethod('get')) {
            return view('dashboard/ship_project')->with('id', 0);
        }
        else if($request->isMethod('post')) {
            $input = Input::all();
            return view('dashboard/ship_project')->with('id', $input['id']);
        }
    }
    
    public function material_list()
    {
        return view('dashboard/material_list');
    }
    
    public function assembly_part()
    {
        return view('dashboard/assembly_part');
    }

    public function input_machine()
    {
        return view('dashboard/input_new_machine');
    }

    public function recap_machine()
    {
        return view('dashboard/recap_machine');
    }

    public function input_worker()
    {
        return view('dashboard/input_new_worker');
    }

    public function recap_worker()
    {
        return view('dashboard/recap_worker');
    }

    public function ssh_menu()
    {
        return view('dashboard/ssh_menu');
    }

    public function fabrication_menu()
    {
        return view('dashboard/fabrication_menu');
    }

    public function subassembly_menu()
    {
        return view('dashboard/subassembly_menu');
    }

    public function assembly_menu()
    {
        return view('dashboard/assembly_menu');
    }

    public function bbs_menu()
    {
        return view('dashboard/bbs_menu');
    }

    public function erection_menu()
    {
        return view('dashboard/erection_menu');
    }

    public function store()
    {

    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function show()
    {

    }

    public function destroy()
    {

    }

    public function edit()
    {

    }
}

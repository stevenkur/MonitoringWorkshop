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

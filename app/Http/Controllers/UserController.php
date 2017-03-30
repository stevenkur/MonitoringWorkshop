<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
    public function index(Request $request)
    {
        return view('dashboard/register_new_user');
    }

    public function recap_user(Request $request)
    {
        return view('dashboard/recap_user');
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

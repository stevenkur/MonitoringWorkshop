<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Block;
use App\ShipProject;
use App\User;

class AdminController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
    public function index()
    {
        $ship = ShipProject::where('FINISHED', null);
        $user = User::all();
        
        return view('dashboard/index')->with('ship', $ship)->with('user', $user);
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

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\User;
use App\SSH;
use App\Fabrication;
use App\SubAssembly;
use App\Assembly;
use App\BBS;
use App\Erection;

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

    public function total_ship_progress()
    {
        $ship = ShipProject::all();
        
        return view('dashboard/total_ship_progress')->with('ship', $ship);
    }

    public function planning_workload()
    {
        $ship = ShipProject::all();

        return view('dashboard/planning_workload')->with('ship', $ship);
    }

    public function conclusion_all_project()
    {
        $ship = ShipProject::all();

        return view('dashboard/conclusion_all_project')->with('ship', $ship);
    }

    public function conclusion_finishing_workload()
    {
        $ship = ShipProject::all();

        return view('dashboard/conclusion_finishing_workload')->with('ship', $ship);
    }

    public function destroy()
    {

    }

    public function edit()
    {

    }
}

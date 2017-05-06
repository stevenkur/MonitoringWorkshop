<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Worker;

class UserAssemblyController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
	public function input_act_assembly()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $panel=Panel::all();
        $machine=Machine::all();
        $worker=Worker::where('DIVISION', 'Assembly')->get();
        return view('user/input_act_assembly')->with('ship', $ship)->with('block', $block)->with('panel', $panel)->with('machine', $machine)->with('worker', $worker);
    }   
    
    public function assembly_recap_worker()
    {
        return view('user/assembly_recap_worker');
    }   

    public function assembly_recap_progress_activity()
    {
        return view('user/assembly_recap_progress_activity');
    }  

    public function assembly_recap_join_part_process()
    {
        return view('user/assembly_recap_join_panel_process');
    }  

}

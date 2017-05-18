<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Panel;
use App\Part;
use App\Plate;
use App\Machine;
use App\Worker;
use App\SubAssembly;

class UserSubAssemblyController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
    
	public function input_act_subassembly()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $panel=Panel::all();
        $part=Part::all();
        $machine=Machine::where('WORKSHOP', 'Sub Assembly')->get();
        $worker=Worker::where('DIVISION', 'Sub Assembly')->get();
        return view('user/input_act_subassembly')->with('ship', $ship)->with('block', $block)->with('panel', $panel)->with('machine', $machine)->with('worker', $worker)->with('part', $part);
    }   
    
    public function subassembly_recap_worker()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $panel=Panel::all();
        $machine=Machine::all();
        return view('user/subassembly_recap_worker')->with('ship', $ship)->with('block', $block)->with('panel', $panel)->with('machine', $machine);
    }  

    public function subassembly_recap_progress_activity()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $panel=Panel::all();
        $machine=Machine::all();
        return view('user/subassembly_recap_progress_activity')->with('ship', $ship)->with('block', $block)->with('panel', $panel)->with('machine', $machine);
    }   

    public function subassembly_recap_join_part_process()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $panel=Panel::all();
        $machine=Machine::all();
        return view('user/subassembly_recap_join_part_process')->with('ship', $ship)->with('block', $block)->with('panel', $panel)->with('machine', $machine);
    }   

}

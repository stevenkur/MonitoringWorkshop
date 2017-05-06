<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Worker;

class UserBBSController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
    public function bbs_calculate_paint_needs()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $worker=Worker::where('DIVISION', 'BBS')->get();
        return view('user/bbs_calculate_paint_needs')->with('ship', $ship)->with('block', $block)->with('worker', $worker);
    }
    
    public function input_act_bbs()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        return view('user/input_act_bbs')->with('ship', $ship)->with('block', $block);
    }   

    public function bbs_recap_material_process()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        return view('user/bbs_recap_material_process')->with('ship', $ship)->with('block', $block);
    }

    public function bbs_recap_worker()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        return view('user/bbs_recap_worker')->with('ship', $ship)->with('block', $block);
    }
}

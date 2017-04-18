<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;

class UserErectionController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
    public function input_act_erection()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        return view('user/input_act_erection')->with('ship', $ship)->with('block', $block);
    }

    public function erection_recap_block()
    {
        $ship=ShipProject::all();
        return view('user/erection_recap_block')->with('ship', $ship);
    }

    public function erection_recap_worker()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        return view('user/erection_recap_worker')->with('ship', $ship)->with('block', $block);
    }

}
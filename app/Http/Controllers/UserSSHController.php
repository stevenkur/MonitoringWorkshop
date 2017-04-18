<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;

class UserSSHController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
    public function input_material_ssh()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        return view('user/input_material_ssh')->with('ship', $ship)->with('block', $block);
    }

    public function input_act_ssh()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        return view('user/input_act_ssh')->with('ship', $ship)->with('block', $block);
    }

    public function ssh_recap_material_coming()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        return view('user/ssh_recap_material_coming')->with('ship', $ship)->with('block', $block);
    }

    public function ssh_recap_material_process()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        return view('user/ssh_recap_material_process')->with('ship', $ship)->with('block', $block);
    }

    public function ssh_recap_progress_activity()
    {
        $ship=ShipProject::all();
        return view('user/ssh_recap_progress_activity')->with('ship', $ship);
    }

}

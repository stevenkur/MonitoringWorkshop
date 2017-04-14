<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;

class UserMainController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
    public function index()
    {
        return view('user/index');
    }   

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

    public function input_act_fabrication()
    {
        return view('user/input_act_fabrication');
    }

    public function fabrication_recap_material_process()
    {
        return view('user/fabrication_recap_material_process');
    }

    public function Fabrication_recap_worker()
    {
        return view('user/Fabrication_recap_worker');
    }

    public function fabrication_recap_progress_activity()
    {
        return view('user/fabrication_recap_progress_activity');
    }

}

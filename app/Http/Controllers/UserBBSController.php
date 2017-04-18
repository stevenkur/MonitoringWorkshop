<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;

class UserBBSController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
    public function input_act_bbs()
    {
        return view('user/input_act_bbs');
    }   

    public function bbs_recap_material_process()
    {
        return view('user/bbs_recap_material_process');
    }

    public function bbs_recap_worker()
    {
        return view('user/bbs_recap_worker');
    }

    public function bbs_calculation_paint()
    {
        return view('user/bbs_calculation_paint');
    }
}

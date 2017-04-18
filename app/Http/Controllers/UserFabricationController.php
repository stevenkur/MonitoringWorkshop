<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;

class UserFabricationController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
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

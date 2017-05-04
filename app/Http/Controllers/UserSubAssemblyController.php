<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;

class UserSubAssemblyController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
    
	public function input_act_subassembly()
    {
        return view('user/input_act_subassembly');
    }   
    
    public function subassembly_recap_worker()
    {
        return view('user/subassembly_recap_worker');
    }  

    public function subassembly_recap_progress_activity()
    {
        return view('user/subassembly_recap_progress_activity');
    }   

    public function subassembly_recap_join_panel_process()
    {
        return view('user/subassembly_recap_join_panel_process');
    }   

}

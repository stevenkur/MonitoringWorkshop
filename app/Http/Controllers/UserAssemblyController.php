<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;

class UserAssemblyController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
	public function input_act_assembly()
    {
        return view('user/input_act_assembly');
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
        return view('user/assembly_recap_join_part_process');
    }  

}

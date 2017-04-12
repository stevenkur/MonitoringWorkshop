<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

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
        return view('user/input_material_ssh');
    }

    public function ssh_recap_material_coming()
    {
        return view('user/ssh_recap_material_coming');
    }

    public function ssh_recap_material_process()
    {
        return view('user/ssh_recap_material_process');
    }

    public function input_act_ssh()
    {
        return view('user/input_act_ssh');
    }

    public function ssh_recap_progress_activity()
    {
        return view('user/ssh_recap_progress_activity');
    }

    public function input_act_erection()
    {
        return view('user/input_act_erection');
    }

    public function erection_recap_block()
    {
        return view('user/erection_recap_block');
    }

    public function erection_recap_worker()
    {
        return view('user/erection_recap_worker');
    }

    public function edit()
    {

    }
}

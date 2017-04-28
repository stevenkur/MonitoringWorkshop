<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Plate;
use App\Profile;

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
        $plate=Plate::all();
        $profile=Profile::all();
        return view('user/input_material_ssh')->with('ship', $ship)->with('block', $block)->with('plate', $plate)->with('profile', $profile);
    }
    
    public function confirm_material(Request $request)
    {
        if($request->type == 'plate'){
            $plate=Plate::all();
            $plate->DATE_COMING=date(d/m/Y);
            $plate->save();
        }
        else{
            $profile=Profile::all();
            $profile->DATE_COMING=date(d/m/Y);
            $profile->save();
        }
        
        return view('user/input_material_ssh')->with('ship', $ship)->with('block', $block)->with('plate', $plate)->with('profile', $profile);
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

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Plate;
use App\Profile;
use App\Worker;
use App\Machine;
use App\SSH;
use Carbon\Carbon;

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
    
    public function confirm_material_plate($id)
    {
        $plate=Plate::where('id',$id)->update(['DATE_COMING' => Carbon::today()->format('Y-m-d')]);
        
        return redirect()->back()->with('message','Operation Successful !');
    }

    public function confirm_material_profile($id)
    {
        $profile=Profile::where('id',$id)->update(['DATE_COMING' => Carbon::today()->format('Y-m-d')]);
        
        return redirect()->back()->with('message','Operation Successful !');
    }
    
    public function input_act_ssh()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $plate=Plate::all();
        $machine=Machine::where('WORKSHOP', 'SSH')->get();
        $worker=Worker::where('DIVISION', 'SSH')->get();
        return view('user/input_act_ssh')->with('ship', $ship)->with('block', $block)->with('plate', $plate)->with('worker', $worker)->with('machine', $machine);
    }

    public function ssh_recap_material_coming()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $plate=Plate::all();
        $profile=Profile::all();
        return view('user/ssh_recap_material_coming')->with('ship', $ship)->with('block', $block)->with('plate', $plate)->with('profile', $profile);
    }

    public function ssh_recap_material_process()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $plate=Plate::all();
        
        return view('user/ssh_recap_material_process')->with('ship', $ship)->with('block', $block)->with('plate', $plate);
    }

    public function ssh_recap_progress_activity()
    {
        $ship=ShipProject::all();
        $progress=Plate::select('ID_BLOCK', 'BLOCK_NAME', 'ID_PROJECT', DB::raw('sum(STRAIGHTENING) as STR'), DB::raw('count(ID) as NUM'), DB::raw('sum(BLASTING) as BLAST'))->groupBy('ID_BLOCK', 'BLOCK_NAME', 'ID_PROJECT')->get();
        
        return view('user/ssh_recap_progress_activity')->with('ship', $ship)->with('progress', $progress);
    }

}

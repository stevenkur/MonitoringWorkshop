<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Panel;
use App\Part;
use App\Plate;
use App\Machine;
use App\Worker;
use App\SubAssembly;
use App\Percentage;
use Carbon\Carbon;

class UserSubAssemblyController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
    
	public function input_act_subassembly()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $panel=Panel::all();
        $part=Part::all();
        $machine=Machine::where('WORKSHOP', 'Sub Assembly')->get();
        $worker=Worker::where('DIVISION', 'Sub Assembly')->get();
        return view('user/input_act_subassembly')->with('ship', $ship)->with('block', $block)->with('panel', $panel)->with('machine', $machine)->with('worker', $worker)->with('part', $part);
    }   
    
    public function subassembly_recap_worker()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $panel=Panel::all();
        $subassembly=SubAssembly::latest()->get();
        
        return view('user/subassembly_recap_worker')->with('ship', $ship)->with('block', $block)->with('panel', $panel)->with('subass',$subassembly);
    }  

    public function subassembly_recap_progress_activity()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $panel=Panel::all();
        $machine=Machine::all();
        $fitting=Percentage::where('WORKSHOP', 'SUBASSEMBLY')->where('ACTIVITY', 'FITTING')->first();
        $welding=Percentage::where('WORKSHOP', 'SUBASSEMBLY')->where('ACTIVITY', 'WELDING')->first();
        $grinding=Percentage::where('WORKSHOP', 'SUBASSEMBLY')->where('ACTIVITY', 'GRINDING')->first();
        $fairing=Percentage::where('WORKSHOP', 'SUBASSEMBLY')->where('ACTIVITY', 'FAIRING')->first();
        $progress=Part::select('ID_PROJECT', 'ID', DB::raw('sum(FITTING) as FIT'), DB::raw('count(ID) as NUM'), DB::raw('sum(WELDING) as WELD'), DB::raw('sum(GRINDING) as GRIND'), DB::raw('sum(FAIRING) as FAIR'))->groupBy('ID', 'ID_PROJECT')->get();
        return view('user/subassembly_recap_progress_activity')->with('ship', $ship)->with('block', $block)->with('panel', $panel)->with('machine', $machine)->with('progress', $progress)->with('fitting', $fitting)->with('welding', $welding)->with('grinding', $grinding)->with('fairing', $fairing);
    }   

    public function subassembly_recap_join_part_process()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $panel=Panel::all();
        $machine=Machine::all();
        return view('user/subassembly_recap_join_part_process')->with('ship', $ship)->with('block', $block)->with('panel', $panel)->with('machine', $machine);
    }   

    public function works(Request $request)
    {
//        dd(Input::all());
        $input = Input::all();
        $count = $input['num'];
        
        for($i=0; $i<$count; $i++)
        {
            $subassembly = new SubAssembly();        
            $subassembly->ID_PART = $input['id_material'];  
            $subassembly->PROGRESS = $input['progress'];  
            $subassembly->ID_WORKER = $input['id'.$i];        
            $subassembly->WORKER_NAME = $input['name'.$i];      
            $subassembly->ATTENDANCE = $input['attendance'.$i];   
            $subassembly->PROCESS = $input['process'];   
            $subassembly->OPERATOR = $input['operator'.$i];   
            $subassembly->MACHINE = $input['machine'];   
            $subassembly->MACHINE_WORKING = $input['machinehours'];   
            $subassembly->MACHINE_ADD_HOURS = $input['machineaddhours'];   
            $subassembly->PROBLEM = $input['problem']; 
            $subassembly->WASTE_TIME = $input['wastetime']; 
            $subassembly->SHIFT = substr($input['shift'], 6); 
            $subassembly->USER = 'admin'; 
            $subassembly->save();
        }
        
        if($input['process']=='Fitting'){
            $part = Part::where('ID', $input['id_material'])->update(['FITTING'=>$input['progress']/100, 'FITTING_DATE'=>Carbon::today()->format('Y-m-d')]);
        }
        else if($input['process']=='Welding'){
            $part = Part::where('ID', $input['id_material'])->update(['WELDING'=>$input['progress']/100, 'WELDING_DATE'=>Carbon::today()->format('Y-m-d')]);
        }
        else if($input['process']=='Grinding'){
            $part = Part::where('ID', $input['id_material'])->update(['GRINDING'=>$input['progress']/100, 'GRINDING_DATE'=>Carbon::today()->format('Y-m-d')]);
        }
        else {
            $part = Part::where('ID', $input['id_material'])->update(['FAIRING'=>$input['progress']/100, 'FAIRING_DATE'=>Carbon::today()->format('Y-m-d')]);
        }
        
        $ship=ShipProject::all();
        $block=Block::all();
        $panel=Panel::all();
        $part=Part::all();
        $machine=Machine::where('WORKSHOP', 'Sub Assembly')->get();
        $worker=Worker::where('DIVISION', 'Sub Assembly')->get();

        return view('user/input_act_subassembly')->with('ship', $ship)->with('block', $block)->with('panel', $panel)->with('machine', $machine)->with('worker', $worker)->with('part', $part);
    }

}

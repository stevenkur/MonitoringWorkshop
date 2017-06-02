<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Panel;
use App\Plate;
use App\Worker;
use App\Machine;
use App\Assembly;
use App\Percentage;
use Carbon\Carbon;

class UserAssemblyController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
	public function input_act_assembly()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $panel=Panel::all();
        $machine=Machine::where('WORKSHOP', 'Assembly')->get();
        $worker=Worker::where('DIVISION', 'Assembly')->get();
        return view('user/input_act_assembly')->with('ship', $ship)->with('block', $block)->with('panel', $panel)->with('machine', $machine)->with('worker', $worker);
    }   
    
    public function assembly_recap_worker()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $panel=Panel::all();
        $machine=Machine::all();
        $assembly=Assembly::latest()->get();
        
        
        return view('user/assembly_recap_worker')->with('ship', $ship)->with('block', $block)->with('panel', $panel)->with('ass',$assembly);
    }   

    public function assembly_recap_progress_activity()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $panel=Panel::all();
        $percentage=Percentage::where('WORKSHOP', 'ASSEMBLY')->get();
        $machine=Machine::all();
        $progress=Panel::select('ID_PROJECT', 'ID', DB::raw('sum(FITTING) as FIT'), DB::raw('count(ID) as NUM'), DB::raw('sum(WELDING) as WELD'), DB::raw('sum(GRINDING) as GRIND'), DB::raw('sum(FAIRING) as FAIR'))->groupBy('ID', 'ID_PROJECT')->get();
        return view('user/assembly_recap_progress_activity')->with('ship', $ship)->with('block', $block)->with('panel', $panel)->with('machine', $machine)->with('progress', $progress)->with('percentage', $percentage);
    }  

    public function assembly_recap_join_panel_process()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        return view('user/assembly_recap_join_panel_process')->with('ship', $ship)->with('block', $block);
    }

    public function works(Request $request)
    {
//        dd(Input::all());
        $input = Input::all();
        $count = $input['num'];
        
        for($i=0; $i<$count; $i++)
        {
            $assembly = new Assembly();        
            $assembly->ID_PANEL = $input['id_material'];  
            $assembly->PROGRESS = $input['progress'];  
            $assembly->ID_WORKER = $input['id'.$i];        
            $assembly->WORKER_NAME = $input['name'.$i];      
            $assembly->ATTENDANCE = $input['attendance'.$i];   
            $assembly->PROCESS = $input['process'];   
            $assembly->OPERATOR = $input['operator'.$i];   
            $assembly->MACHINE = $input['machine'];   
            $assembly->MACHINE_WORKING = $input['machinehours'];   
            $assembly->MACHINE_ADD_HOURS = $input['machineaddhours'];   
            $assembly->PROBLEM = $input['problem']; 
            $assembly->WASTE_TIME = $input['wastetime']; 
            $assembly->SHIFT = substr($input['shift'], 6); 
            $assembly->USER = 'admin'; 
            $assembly->save();
        }
        
        if($input['process']=='Fitting'){
            $panel = Panel::where('ID', $input['id_material'])->update(['FITTING'=>$input['progress']/100, 'FITTING_DATE'=>Carbon::today()->format('Y-m-d')]);
        }
        else if($input['process']=='Welding'){
            $panel = Panel::where('ID', $input['id_material'])->update(['WELDING'=>$input['progress']/100, 'WELDING_DATE'=>Carbon::today()->format('Y-m-d')]);
        }
        else if($input['process']=='Grinding'){
            $panel = Panel::where('ID', $input['id_material'])->update(['GRINDING'=>$input['progress']/100, 'GRINDING_DATE'=>Carbon::today()->format('Y-m-d')]);
        }
        else {
            $panel = Panel::where('ID', $input['id_material'])->update(['FAIRING'=>$input['progress']/100, 'FAIRING_DATE'=>Carbon::today()->format('Y-m-d')]);
        }
        
        $ship=ShipProject::all();
        $block=Block::all();
        $panel=Panel::all();
        $machine=Machine::where('WORKSHOP', 'Assembly')->get();
        $worker=Worker::where('DIVISION', 'Assembly')->get();
        
        return view('user/input_act_assembly')->with('ship', $ship)->with('block', $block)->with('panel', $panel)->with('machine', $machine)->with('worker', $worker);
    }  

}

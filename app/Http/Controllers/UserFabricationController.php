<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Plate;
use App\Worker;
use App\Machine;
use App\Fabrication;
use Carbon\Carbon;

class UserFabricationController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
    public function input_act_fabrication()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $plate=Plate::all();
        $machine=Machine::where('WORKSHOP', 'Fabrication')->get();
        $worker=Worker::where('DIVISION', 'Fabrication')->get();
        return view('user/input_act_fabrication')->with('ship', $ship)->with('block', $block)->with('plate', $plate)->with('worker', $worker)->with('machine', $machine);
    }

    public function fabrication_recap_material_process()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $plate=Plate::all();
        return view('user/fabrication_recap_material_process')->with('ship', $ship)->with('block', $block)->with('plate', $plate);
    }

    public function Fabrication_recap_worker()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $fabrication=Fabrication::all();
        return view('user/Fabrication_recap_worker')->with('ship', $ship)->with('block', $block)->with('fabrication', $fabrication);
    }

    public function fabrication_recap_progress_activity()
    {
        $ship=ShipProject::all();
        $progress=Plate::select('ID_BLOCK', 'BLOCK_NAME', 'ID_PROJECT', DB::raw('sum(MARKING) as MARKING'), DB::raw('count(ID) as NUM'), DB::raw('sum(CUTTING) as CUTTING'), DB::raw('sum(BLENDING) as BLENDING'))->groupBy('ID_BLOCK', 'BLOCK_NAME', 'ID_PROJECT')->get();
        
        return view('user/fabrication_recap_progress_activity')->with('ship', $ship)->with('progress', $progress);
    }

    public function works(Request $request)
    {
//        dd(Input::all());
        $input = Input::all();
        $count = $input['num'];
        
        for($i=0; $i<$count; $i++)
        {
            $ssh = new Fabrication();        
            $ssh->ID_MATERIAL = $input['id_material'];  
            $ssh->ID_WORKER = $input['id'.$i];        
            $ssh->WORKER_NAME = $input['name'.$i];		
            $ssh->ATTENDANCE = $input['attendance'.$i];   
            $ssh->PROCESS = $input['process'];   
            $ssh->OPERATOR = $input['operator'.$i];   
            $ssh->MACHINE = $input['machine'];   
            $ssh->MACHINE_WORKING = $input['machinehours'];   
            $ssh->MACHINE_ADD_HOURS = $input['machineaddhours'];   
            $ssh->PROBLEM = $input['problem']; 
            $ssh->WASTE_TIME = $input['wastetime']; 
            $ssh->SHIFT = substr($input['shift'], 6); 
            $ssh->USER = 'admin'; 
            $ssh->save();
        }
        
        if($input['process']=='Marking'){
            $plate = Plate::where('ID', $input['id_material'])->update(['MARKING'=>1, 'MARKING_DATE'=>Carbon::today()->format('Y-m-d'), 'MARKING_MACHINE'=>$input['machine']]);
        }
        else if($input['process']=='Cutting'){
            $plate = Plate::where('ID', $input['id_material'])->update(['CUTTING'=>1, 'CUTTING_DATE'=>Carbon::today()->format('Y-m-d'), 'CUTTING_MACHINE'=>$input['machine']]);
        }
        else{
            $plate = Plate::where('ID', $input['id_material'])->update(['BLENDING'=>1, 'BLENDING_DATE'=>Carbon::today()->format('Y-m-d'), 'BENDING_MACHINE'=>$input['machine']]);
        }
        
        $ship=ShipProject::all();
        $block=Block::all();
        $plate=Plate::all();
        $machine=Machine::where('WORKSHOP', 'Fabrication')->get();
        $worker=Worker::where('DIVISION', 'Fabrication')->get();
        
        return view('user/input_act_fabrication')->with('ship', $ship)->with('block', $block)->with('plate', $plate)->with('worker', $worker)->with('machine', $machine);
    }
}

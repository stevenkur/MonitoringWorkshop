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
use App\Percentage;
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

    public function fabrication_recap_worker()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $fabrication=Fabrication::latest()->get();
        return view('user/fabrication_recap_worker')->with('ship', $ship)->with('block', $block)->with('fabrication', $fabrication);
    }

    public function fabrication_recap_progress_activity()
    {
        $ship=ShipProject::all();
        $progress=Plate::select('ID_BLOCK', 'BLOCK_NAME', 'ID_PROJECT', DB::raw('sum(MARKING) as MARKING'), DB::raw('count(ID) as NUM'), DB::raw('sum(CUTTING) as CUTTING'), DB::raw('sum(BLENDING) as BLENDING'))->groupBy('ID_BLOCK', 'BLOCK_NAME', 'ID_PROJECT')->get();
        $marking=Percentage::where('WORKSHOP', 'FABRICATION')->where('ACTIVITY', 'MARKING')->first();
        $cutting=Percentage::where('WORKSHOP', 'FABRICATION')->where('ACTIVITY', 'CUTTING')->first();
        $bending=Percentage::where('WORKSHOP', 'FABRICATION')->where('ACTIVITY', 'BENDING')->first();
        
        return view('user/fabrication_recap_progress_activity')->with('ship', $ship)->with('progress', $progress)->with('marking', $marking)->with('cutting', $cutting)->with('bending', $bending);
    }

    public function update(Request $request)
    {
        $marking=Percentage::where('WORKSHOP', 'FABRICATION')->where('ACTIVITY', 'MARKING')->first();
        $cutting=Percentage::where('WORKSHOP', 'FABRICATION')->where('ACTIVITY', 'CUTTING')->first();
        $bending=Percentage::where('WORKSHOP', 'FABRICATION')->where('ACTIVITY', 'BENDING')->first();
        $marking->update([
            'PERCENT' => $request->marking
        ]);
        $cutting->update([
            'PERCENT' => $request->cutting
        ]);
        $bending->update([
            'PERCENT' => $request->bending
        ]);
        
        return redirect()->route('fabrication_recap_progress_activity')
            ->with('alert-success', 'Data Berhasil Diupdate.');
    }

    public function works(Request $request)
    {
//        dd(Input::all());
        $input = Input::all();
        $count = $input['num'];

        $photo=$input['photo'];
        $destinationPath = public_path() . '/uploads';
        $extension = $photo->getClientOriginalExtension();
        $fileName = $photo->getClientOriginalName();
        $photo->move($destinationPath, $fileName);
        
        for($i=0; $i<$count; $i++)
        {
            $fab = new Fabrication();        
            $fab->ID_MATERIAL = $input['id_material'];  
            $fab->ID_WORKER = $input['id'.$i];        
            $fab->WORKER_NAME = $input['name'.$i];		
            $fab->ATTENDANCE = $input['attendance'.$i];   
            $fab->PROCESS = $input['process'];   
            $fab->OPERATOR = $input['operator'.$i];   
            $fab->MACHINE = $input['machine'];   
            $fab->MACHINE_WORKING = $input['machinehours'];   
            $fab->MACHINE_ADD_HOURS = $input['machineaddhours'];  
            $fab->WORKING_HOURS = $input['workinghours'.$i]; 
            $fab->PROBLEM = $input['problem']; 
            $fab->WASTE_TIME = $input['wastetime']; 
            $fab->SHIFT = substr($input['shift'], 6); 
            $fab->USER = 'admin'; 
            $fab->save();
        }
        
        if($input['process']=='Marking'){
            $plate = Plate::where('ID', $input['id_material'])->update(['MARKING'=>1, 'MARKING_DATE'=>Carbon::today()->format('Y-m-d'), 'MARKING_MACHINE'=>$input['machine'], 'MARKING_PHOTO'=>$fileName]);
        }
        else if($input['process']=='Cutting'){
            $plate = Plate::where('ID', $input['id_material'])->update(['CUTTING'=>1, 'CUTTING_DATE'=>Carbon::today()->format('Y-m-d'), 'CUTTING_MACHINE'=>$input['machine'], 'CUTTING_PHOTO'=>$fileName]);
        }
        else{
            $plate = Plate::where('ID', $input['id_material'])->update(['BLENDING'=>1, 'BLENDING_DATE'=>Carbon::today()->format('Y-m-d'), 'BLENDING_MACHINE'=>$input['machine'], 'BLENDING_PHOTO'=>$fileName]);
        }
        
        $ship=ShipProject::all();
        $block=Block::all();
        $plate=Plate::all();
        $machine=Machine::where('WORKSHOP', 'Fabrication')->get();
        $worker=Worker::where('DIVISION', 'Fabrication')->get();
        
        return view('user/input_act_fabrication')->with('ship', $ship)->with('block', $block)->with('plate', $plate)->with('worker', $worker)->with('machine', $machine);
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Worker;
use App\Erection;
use App\Percentage;
use Carbon\Carbon;

class UserErectionController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
    public function input_act_erection()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $worker=Worker::where('DIVISION', 'Erection Process')->get();
        return view('user/input_act_erection')->with('ship', $ship)->with('block', $block)->with('worker', $worker);
    }

    public function erection_recap_block()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        return view('user/erection_recap_block')->with('ship', $ship)->with('block', $block);
    }

    public function erection_recap_progress_activity()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $progress=Block::select('ID', 'NAME', 'LOADING', 'ADJUSTING', 'FITTING', 'WELDING', DB::raw('count(ID) as NUM'))->groupBy('ID', 'NAME', 'LOADING', 'ADJUSTING', 'FITTING', 'WELDING')->get();
        $loading=Percentage::where('WORKSHOP', 'ERECTION')->where('ACTIVITY', 'LOADING')->first();
        $adjusting=Percentage::where('WORKSHOP', 'ERECTION')->where('ACTIVITY', 'ADJUSTING')->first();
        $fitting=Percentage::where('WORKSHOP', 'ERECTION')->where('ACTIVITY', 'FITTING')->first();
        $welding=Percentage::where('WORKSHOP', 'ERECTION')->where('ACTIVITY', 'WELDING')->first();
        return view('user/erection_recap_progress_activity')->with('ship', $ship)->with('loading', $loading)->with('adjusting', $adjusting)->with('fitting', $fitting)->with('welding', $welding)->with('block', $block);
    }

    public function erection_recap_worker()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $erection=Erection::latest()->get();
        return view('user/erection_recap_worker')->with('ship', $ship)->with('block', $block)->with('erection', $erection);
    }

    public function works(Request $request)
    {
//        dd(Input::all());
        $input = Input::all();
        $count = $input['num'];

        $photo=$input['photo'];
        $destinationPath = 'uploads';
        $extension = $photo->getClientOriginalExtension();
        $fileName = $photo->getClientOriginalName();
        $photo->move($destinationPath, $fileName);
        
        for($i=0; $i<$count; $i++)
        {
            $erection = new Erection();        
            $erection->ID_BLOCK = $input['id_material'];  
            $erection->PROGRESS = $input['progress'];  
            $erection->ID_WORKER = $input['id'.$i];        
            $erection->WORKER_NAME = $input['name'.$i];      
            $erection->ATTENDANCE = $input['attendance'.$i];   
            $erection->PROCESS = $input['process'];     
            $erection->WORKING_HOURS = $input['workinghours'];   
            $erection->ADD_WORKING_HOURS = $input['workingaddhours'];   
            $erection->PROBLEM = $input['problem']; 
            $erection->WASTE_TIME = $input['wastetime']; 
            $erection->SHIFT = substr($input['shift'], 6); 
            $erection->USER = 'admin'; 
            $erection->PHOTO = $fileName;
            $erection->save();
        }
        
        if($input['process']=='Loading'){
            $panel = Block::where('ID', $input['id_material'])->update(['LOADING'=>$input['progress']/100, 'LOADING_DATE'=>Carbon::today()->format('Y-m-d')]);
        }
        else if($input['process']=='Adjusting'){
            $panel = Block::where('ID', $input['id_material'])->update(['ADJUSTING'=>$input['progress']/100, 'ADJUSTING_DATE'=>Carbon::today()->format('Y-m-d')]);
        }
        else if($input['process']=='Fitting'){
            $panel = Block::where('ID', $input['id_material'])->update(['FITTING'=>$input['progress']/100, 'FITTING_DATE'=>Carbon::today()->format('Y-m-d')]);
        }
        else {
            $panel = Block::where('ID', $input['id_material'])->update(['WELDING'=>$input['progress']/100, 'WELDING_DATE'=>Carbon::today()->format('Y-m-d')]);
        }
        
        $ship=ShipProject::all();
        $block=Block::all();
        $worker=Worker::where('DIVISION', 'Erection Process')->get();
        return view('user/input_act_erection')->with('ship', $ship)->with('block', $block)->with('worker', $worker);
    }  

}

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
use App\Percentage;
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

    public function ssh_recap_worker()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $ssh=SSH::latest()->get();
        return view('user/ssh_recap_worker')->with('ship', $ship)->with('block', $block)->with('ssh', $ssh);
    }

    public function ssh_recap_progress_activity()
    {
        $ship=ShipProject::all();
        
        $straightening=Percentage::where("WORKSHOP","SSH")->where("ACTIVITY", "STRAIGHTENING")->first();
        $blasting=Percentage::where("WORKSHOP","SSH")->where("ACTIVITY", "BLASTING")->first();
        $material_coming=Percentage::where("WORKSHOP","SSH")->where("ACTIVITY", "MATERIAL_COMING")->first();

        $coming=$material_coming->PERCENT;
        $str = $straightening->PERCENT;
        $blast = $blasting->PERCENT;
        
        $progress=DB::select(DB::raw("SELECT P.ID_BLOCK, P.BLOCK_NAME, SUM(STRAIGHTENING) as STR, count(ID) as NUM, sum(BLASTING) as BLAST, (($str*SUM(STRAIGHTENING)/COUNT(ID))+($blast*SUM(BLASTING)/COUNT(ID))+($coming* C.DONE/count(DATE_COMING))) AS PROGRESS FROM `plates` P, (SELECT ID_BLOCK, count(DATE_COMING) as DONE from `plates` where DATE_COMING!='NULL' GROUP BY ID_BLOCK) C WHERE P.ID_BLOCK=C.ID_BLOCK GROUP BY P.ID_BLOCK, P.BLOCK_NAME"));
        
        return view('user/ssh_recap_progress_activity')->with('ship', $ship)->with('progress', $progress)->with('straightening', $straightening)->with('blasting', $blasting)->with('coming', $material_coming);
    }

    public function update(Request $request)
    {
        $straightening=Percentage::where('WORKSHOP', 'SSH')->where('ACTIVITY', 'STRAIGHTENING')->first();
        $blasting=Percentage::where('WORKSHOP', 'SSH')->where('ACTIVITY', 'BLASTING')->first();
        $material_coming=Percentage::where("WORKSHOP","SSH")->where("ACTIVITY", "MATERIAL_COMING")->first();
        $straightening->update([
            'PERCENT' => $request->straightening
        ]);
        $blasting->update([
            'PERCENT' => $request->blasting
        ]);
        $material_coming->update([
            'PERCENT' => $request->coming
        ]);
        
        return redirect()->route('ssh_recap_progress_activity')
            ->with('alert-success', 'Data Berhasil Diupdate.');
    }

    public function works(Request $request)
    {
       // dd(Input::all());
        $input = Input::all();
        $count = $input['num'];
        
        for($i=0; $i<$count; $i++)
        {
            $ssh = new SSH();        
            $ssh->ID_MATERIAL = $input['id_material'];  
            $ssh->ID_WORKER = $input['id'.$i];        
            $ssh->WORKER_NAME = $input['name'.$i];		
            $ssh->ATTENDANCE = $input['attendance'.$i];   
            $ssh->PROCESS = $input['process'];   
            $ssh->OPERATOR = $input['operator'.$i];   
            $ssh->MACHINE = $input['machine'];   
            $ssh->MACHINE_WORKING = $input['machinehours'];   
            $ssh->MACHINE_ADD_HOURS = $input['machineaddhours'];
            $ssh->WORKING_HOURS = $input['workinghours'.$i];
            $ssh->PROBLEM = $input['problem']; 
            $ssh->WASTE_TIME = $input['wastetime']; 
            $ssh->SHIFT = substr($input['shift'], 6); 
            $ssh->USER = 'admin'; 

            // if(Input::hasFile('photo')) {
                // dd(Input::all());
                $photo=$input['photo'];
                $destinationPath = storage_path() . '/img' . '/';
                $photo->move($destinationPath, $photo->getClientOriginalName());

                $ssh->PHOTO = $photo->getClientOriginalName();
            // }

            $ssh->save();
        }
        
        if($input['process']=='Straightening'){
            $plate = Plate::where('ID', $input['id_material'])->update(['STRAIGHTENING'=>1, 'STRAIGHTENING_DATE'=>Carbon::today()->format('Y-m-d'), 'STRAIGHTENING_MACHINE'=>$input['machine']]);
        }
        else{
            $plate = Plate::where('ID', $input['id_material'])->update(['BLASTING'=>1, 'BLASTING_DATE'=>Carbon::today()->format('Y-m-d'), 'BLASTING_MACHINE'=>$input['machine']]);
        }
        
        $ship=ShipProject::all();
        $block=Block::all();
        $plate=Plate::all();
        $profile=Profile::all();
        $machine=Machine::where('WORKSHOP', 'SSH')->get();
        $worker=Worker::where('DIVISION', 'SSH')->get();
        
        return view('user/input_act_ssh')->with('ship', $ship)->with('block', $block)->with('plate', $plate)->with('worker', $worker)->with('machine', $machine);
    }
}
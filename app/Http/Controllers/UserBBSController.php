<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Worker;
use App\BBS;
use App\Panel;
use App\Room;
use App\Percentage;
use Carbon\Carbon;

class UserBBSController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
    public function bbs_calculate_paint_needs()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $room=Room::all();
        return view('user/bbs_calculate_paint_needs')->with('ship', $ship)->with('block', $block)->with('room', $room);
    }

    public function add_rooms()
    {
//        dd(Input::all());
        $input = Input::all();
        
        $project = explode('|', $input['project']);
        $projectId = $project[0];
        $projectName = $project[1];
        
        $block = explode('|', $input['block']);
        $blockId = $block[0];
        $blockName = $block[1];
        
        $room = new Room();
        $room->ID_PROJECT = $projectId;
        $room->PROJECT_NAME = $projectName;   
        $room->ID_BLOCK = $blockId; 
        $room->BLOCK_NAME = $blockName;       
        $room->ROOM = $input['room'];        
        $room->SIDE = $input['side'];       
        $room->FRAME = $input['frame'];  
        $room->DECK = $input['deck']; 
        $room->AREA = $input['area']; 
        $room->TOTAL_LAYER = $input['layer']; 
        $room->PAINT_TYPE = $input['painttype']; 
        $room->VOLUME_SOLID = $input['vs'];       
        $room->PAINT_NEEDS = $input['area'] * $input['dft'] * $input['lf'] / $input['vs']; 
        $room->save(); 
        
        return redirect()->route('bbs_calculate_paint_needs')->with('alert-success', 'Data Berhasil Disimpan.');

    }
    
    public function input_act_bbs()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $worker=Worker::where('DIVISION', 'BBS')->get();
        $room=Room::all();
        $panel=Panel::all();
        $count=Room::count();
        return view('user/input_act_bbs')->with('ship', $ship)->with('block', $block)->with('worker', $worker)->with('room', $room)->with('count', $count)->with('panel', $panel);
    }   

    public function bbs_recap_material_process()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $room=Room::all();
        return view('user/bbs_recap_material_process')->with('ship', $ship)->with('block', $block)->with('room', $room);
    }

    public function bbs_recap_worker()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $bbs=BBS::latest()->get();
        return view('user/bbs_recap_worker')->with('ship', $ship)->with('block', $block)->with('bbs', $bbs);
    }

    public function bbs_recap_progress_activity()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $progress=Room::select('ID_BLOCK', 'BLOCK_NAME', 'ID_PROJECT', 'ROOM', 'TOTAL_LAYER', DB::raw('sum(BLASTING) as BLAST'), DB::raw('count(ROOM) as NUM'), DB::raw('sum(PAINTING) as PAINT'))->groupBy('ID_BLOCK', 'BLOCK_NAME', 'ID_PROJECT', 'ROOM', 'TOTAL_LAYER')->get();
        $blasting=Percentage::where('WORKSHOP', 'BBS')->where('ACTIVITY', 'BLASTING')->first();
        $painting=Percentage::where('WORKSHOP', 'BBS')->where('ACTIVITY', 'PAINTING')->first();
        return view('user/bbs_recap_progress_activity')->with('ship', $ship)->with('block', $block)->with('progress', $progress)->with('blasting', $blasting)->with('painting', $painting);
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
            $bbs = new BBS();        
            $bbs->ID_MATERIAL = $input['id_material'];  
            $bbs->PROGRESS = $input['finishedlayer'];  
            $bbs->ID_WORKER = $input['id'.$i];        
            $bbs->WORKER_NAME = $input['name'.$i];      
            $bbs->ATTENDANCE = $input['attendance'.$i];   
            $bbs->PROCESS = $input['process'];     
            $bbs->WORKING_HOURS = $input['workinghours'];   
            $bbs->ADD_WORKING_HOURS = $input['workingaddhours'];   
            $bbs->PROBLEM = $input['problem']; 
            $bbs->WASTE_TIME = $input['wastetime']; 
            $bbs->SHIFT = substr($input['shift'], 6); 
            $bbs->USER = 'admin'; 
            $bbs->save();
        }
        
        if($input['process']=='Blasting'){
            $room = Room::where('ID', $input['id_material'])->update(['BLASTING'=>$input['finishedlayer'], 'BLASTING_DATE'=>Carbon::today()->format('Y-m-d'), 'BLASTING_PHOTO'=>$fileName]);
        }
        else {
            $room = Room::where('ID', $input['id_material'])->update(['PAINTING'=>$input['finishedlayer'], 'PAINTING_DATE'=>Carbon::today()->format('Y-m-d'), 'PAINTING_PHOTO'=>$fileName]);
        }
        
        $ship=ShipProject::all();
        $block=Block::all();
        $worker=Worker::where('DIVISION', 'BBS')->get();
        $room=Room::all();
        return view('user/input_act_bbs')->with('ship', $ship)->with('block', $block)->with('worker', $worker)->with('room', $room);
    }  

    public function destroy($id)
    {
        //
        $room = Room::where('ID', $id)->delete();
        return redirect()->route('bbs_calculate_paint_needs')
            ->with('alert-success', 'Data Berhasil Dihapus.');
    }
}

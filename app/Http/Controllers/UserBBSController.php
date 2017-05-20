<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Worker;
use App\BBS;
use App\Room;

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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bbs_add_rooms(Request $request)
    {
        dd(Input::all());
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
//        $area = $input['area'];
//        $dft = $input['dft'];
//        $vs = $input['vs'];
//        $cb = $input['lf'];
//        $hasil = $area * $dft * $cb / $vs;   
//        $hasil = $input['area'] * $input['dft'] * $input['lf'] / $input['vs'];   
//        $room->PAINT_NEEDS = $hasil;  
        $room->PAINT_NEEDS = $input['area'] * $input['dft'] * $input['lf'] / $input['vs']; 
        $room->save(); 
        
//        return redirect()->route('bbs_calculate_paint_needs')->with('alert-success', 'Data Berhasil Disimpan.');
    }
    
    public function input_act_bbs()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $worker=Worker::where('DIVISION', 'BBS')->get();
        return view('user/input_act_bbs')->with('ship', $ship)->with('block', $block)->with('worker', $worker);
    }   

    public function bbs_recap_material_process()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        return view('user/bbs_recap_material_process')->with('ship', $ship)->with('block', $block);
    }

    public function bbs_recap_worker()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        return view('user/bbs_recap_worker')->with('ship', $ship)->with('block', $block);
    }
}

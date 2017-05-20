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
        //
        $room = new Room();
        $room->ID_PROJECT = $request->projectid;
        $room->PROJECT_NAME = $request->project;   
        $room->ID_BLOCK = $request->blockid; 
        $room->BLOCK_NAME = $request->block;       
        $room->ROOM = $request->room;        
        $room->SIDE = $request->side;       
        $room->FRAME = $request->frame;  
        $room->DECK = $request->deck; 
        $room->AREA = $request->area; 
        $room->TOTAL_LAYER = $request->layer; 
        $room->PAINT_TYPE = $request->painttype;
        $area = $request->area;
        $dft = $request->dft;
        $vs = $request->vs;
        $cb = $request->lf;
        $hasil = $area * $dft * $cb / $vs;   
        $room->PAINT_NEEDS = $hasil;   
        $room->save();        
        return redirect()->route('bbs_calculate_paint_needs')
            ->with('alert-success', 'Data Berhasil Disimpan.');
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

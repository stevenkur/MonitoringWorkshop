<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Plate;

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
        return view('user/input_act_fabrication')->with('ship', $ship)->with('block', $block);
    }

    public function fabrication_recap_material_process()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        return view('user/fabrication_recap_material_process')->with('ship', $ship)->with('block', $block);
    }

    public function Fabrication_recap_worker()
    {
        $ship=ShipProject::all();
        $block=Block::all();
        return view('user/Fabrication_recap_worker')->with('ship', $ship)->with('block', $block);
    }

    public function fabrication_recap_progress_activity()
    {
        $ship=ShipProject::all();
        $progress=Plate::select('ID_BLOCK', 'BLOCK_NAME', 'ID_PROJECT', DB::raw('sum(MARKING) as MARKING'), DB::raw('count(ID) as NUM'), DB::raw('sum(CUTTING) as CUTTING'), DB::raw('sum(BLENDING) as BLENDING'))->groupBy('ID_BLOCK', 'BLOCK_NAME', 'ID_PROJECT')->get();
        
        return view('user/fabrication_recap_progress_activity')->with('ship', $ship)->with('progress', $progress);
    }

}

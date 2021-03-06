<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Part;
use App\SubAssembly;
use App\Percentage;
use App\Machine;
use DB;

class SubAssemblyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ship=ShipProject::all();
        $block=Block::all();
        $progress=Part::select('id_block', DB::raw('sum(FAIRING+FITTING+GRINDING+WELDING)/3 as sum'))->groupBy('id_block')->get();
        $part=Part::all();
        $subass=SubAssembly::all();     
        $machine = Machine::where('WORKSHOP', 'Sub Assembly')->get();

        $fitting=Percentage::where("WORKSHOP","SUBASSEMBLY")->where("ACTIVITY", "FITTING")->first();
        $welding=Percentage::where("WORKSHOP","SUBASSEMBLY")->where("ACTIVITY", "WELDING")->first();
        $grinding=Percentage::where("WORKSHOP","SUBASSEMBLY")->where("ACTIVITY", "GRINDING")->first();
        $fairing=Percentage::where("WORKSHOP","SUBASSEMBLY")->where("ACTIVITY", "FAIRING")->first();

        $fit = $fitting->PERCENT;
        $weld = $welding->PERCENT;
        $grind = $grinding->PERCENT;
        $fair = $fairing->PERCENT;
        
        $target = DB::select(DB::raw("SELECT SUM(DISPLACEMENT) as TARGET FROM ship_projects"));

        $productivity = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE, SUM(B.WEIGHT)/COUNT(A.ID) AS WEIGHT, SUM(A.WORKING_HOURS)/WEIGHT AS PRODUCTIVITY, A.PROBLEM AS PROBLEM FROM sub_assembly A, parts B, machines C WHERE (A.ID_PART=B.ID AND C.NAME LIKE A.MACHINE AND C.ACTIVITY LIKE 'Fairing') GROUP BY DATE, A.MACHINE"));
        
        $machineproductivity = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE, B.CAPACITY, B.OPERATIONAL_HOUR AS NORMAL, MAX(A.MACHINE_WORKING+A.MACHINE_ADD_HOURS) AS REALIZATION, A.WASTE_TIME FROM sub_assembly A, machines B WHERE (A.MACHINE LIKE B.NAME) GROUP BY DATE, A.MACHINE"));
        
        $progr=DB::select(DB::raw("SELECT ID_BLOCK, BLOCK_NAME, ($fit*SUM(FITTING)/COUNT(ID))+($weld*SUM(WELDING)/COUNT(ID))+($grind*SUM(GRINDING)/COUNT(ID))+($fair*SUM(FAIRING)/COUNT(ID)) AS PROGRESS FROM `parts` GROUP BY ID_BLOCK, BLOCK_NAME"));

        return view('dashboard/subassembly_menu')->with('ship', $ship)->with('block', $block)->with('part', $part)->with('progress', $progress)->with('progr', $progr)->with('subass', $subass)->with('machine', $machine)->with('productivity',$productivity)->with('machineproductivity',$machineproductivity)->with('target',$target);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

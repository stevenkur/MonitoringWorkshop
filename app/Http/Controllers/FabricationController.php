<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Profile;
use App\Plate;
use App\Fabrication;
use App\Percentage;
use App\Machine;
use DB;

class FabricationController extends Controller
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
        $profile=Profile::all();
        $plate=Plate::all();
        $fabrication=Fabrication::all();
        $machine = Machine::where('WORKSHOP', 'Fabrication')->get();

        $marking=Percentage::where("WORKSHOP","FABRICATION")->where("ACTIVITY", "MARKING")->first();
        $cutting=Percentage::where("WORKSHOP","FABRICATION")->where("ACTIVITY", "CUTTING")->first();
        $bending=Percentage::where("WORKSHOP","FABRICATION")->where("ACTIVITY", "BENDING")->first();

        $mark = $marking->PERCENT;
        $cut = $cutting->PERCENT;
        $bend = $bending->PERCENT;

        $productivity = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE, SUM(B.WEIGHT)/COUNT(A.ID) AS WEIGHT, SUM(A.WORKING_HOURS)/WEIGHT AS PRODUCTIVITY FROM fabrications A, PLATES B, machines C WHERE (A.ID_MATERIAL=B.ID AND C.NAME LIKE A.MACHINE AND C.ACTIVITY LIKE 'Bending') GROUP BY DATE, A.MACHINE"));
        
        $machineproductivity = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE, B.CAPACITY, B.OPERATIONAL_HOUR AS NORMAL, SUM(A.MACHINE_WORKING+A.MACHINE_ADD_HOURS) AS REALIZATION FROM fabrications A, machines B WHERE A.MACHINE LIKE B.NAME GROUP BY DATE, A.MACHINE"));

        $progr=DB::select(DB::raw("SELECT ID_BLOCK, BLOCK_NAME, ($mark*SUM(MARKING)/COUNT(ID))+($cut*SUM(CUTTING)/COUNT(ID))+($bend*SUM(BLENDING)/COUNT(ID)) AS PROGRESS FROM `plates` GROUP BY ID_BLOCK, BLOCK_NAME"));

        return view('dashboard/fabrication_menu')->with('ship', $ship)->with('block', $block)->with('profile', $profile)->with('plate', $plate)->with('fabrication', $fabrication)->with('progr', $progr)->with('machine', $machine)->with('productivity',$productivity)->with('machineproductivity',$machineproductivity);
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

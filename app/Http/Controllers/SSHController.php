<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Plate;
use App\Profile;
use App\SSH;
use App\Percentage;
use App\Machine;
use DB;

class SSHController extends Controller
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
        $plate=Plate::all();
        $profile=Profile::all();
        $ssh=SSH::all();
        $machine = Machine::where('WORKSHOP', 'SSH')->get();

        $straightening=Percentage::where("WORKSHOP","SSH")->where("ACTIVITY", "STRAIGHTENING")->first();
        $blasting=Percentage::where("WORKSHOP","SSH")->where("ACTIVITY", "BLASTING")->first();
        $material_coming=Percentage::where("WORKSHOP","SSH")->where("ACTIVITY", "MATERIAL_COMING")->first();

        $coming=$material_coming->PERCENT;
        $str = $straightening->PERCENT;
        $blast = $blasting->PERCENT;
        
        $donecoming = DB::select(DB::raw("SELECT ID_BLOCK, count(DATE_COMING) as DONE from `plates` where DATE_COMING!='NULL' GROUP BY ID_BLOCK"));
        
//        dd($donecoming);
        $target = DB::select(DB::raw("SELECT SUM(DISPLACEMENT) as TARGET FROM ship_projects"));

        $productivity = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE, SUM(B.WEIGHT)/COUNT(A.ID) AS WEIGHT, SUM(A.WORKING_HOURS)/WEIGHT AS PRODUCTIVITY, A.PROBLEM AS PROBLEM FROM ssh A, plates B WHERE (A.ID_MATERIAL=B.ID AND A.PROCESS LIKE 'Blasting & Shop Primer') GROUP BY DATE, A.MACHINE"));
        
        $machineproductivity = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE, B.CAPACITY, SUM(C.WEIGHT)/COUNT(A.ID) AS OUTPUT, B.OPERATIONAL_HOUR AS NORMAL, MAX(A.MACHINE_WORKING+A.MACHINE_ADD_HOURS) AS REALIZATION, A.WASTE_TIME FROM ssh A, machines B, plates C WHERE (A.MACHINE LIKE B.NAME AND C.ID LIKE A.ID_MATERIAL) GROUP BY DATE, A.MACHINE"));
        
        // $progr=DB::select(DB::raw("SELECT P.ID_BLOCK, P.BLOCK_NAME, (($str*SUM(STRAIGHTENING)/COUNT(ID))+($blast*SUM(BLASTING)/COUNT(ID))+($coming* C.DONE/count(DATE_COMING))) AS PROGRESS FROM `plates` P, (SELECT ID_BLOCK, count(DATE_COMING) as DONE from `plates` where DATE_COMING!='NULL' GROUP BY ID_BLOCK) C WHERE P.ID_BLOCK=C.ID_BLOCK GROUP BY P.ID_BLOCK, P.BLOCK_NAME"));

        $progr=DB::select(DB::raw("SELECT ID_BLOCK, BLOCK_NAME, ($str*SUM(STRAIGHTENING)/COUNT(ID))+($blast*SUM(BLASTING)/COUNT(ID)) AS PROGRESS FROM `plates` GROUP BY ID_BLOCK, BLOCK_NAME"));
        
        return view('dashboard/ssh_menu')->with('ship', $ship)->with('block', $block)->with('plate', $plate)->with('profile', $profile)->with('ssh', $ssh)->with('progr',$progr)->with('machine',$machine)->with('productivity',$productivity)->with('machineproductivity',$machineproductivity)->with('coming',$coming)->with('target',$target);
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

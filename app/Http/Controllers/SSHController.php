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
use App\machine;
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

        $str = $straightening->PERCENT;
        $blast = $blasting->PERCENT;
        
        $productivity = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE, SUM(B.WEIGHT)/COUNT(A.ID) AS WEIGHT, SUM(A.WORKING_HOURS)/WEIGHT AS PRODUCTIVITY FROM SSH A, PLATES B, machines C WHERE (A.ID_MATERIAL=B.ID AND C.NAME LIKE A.MACHINE AND C.ACTIVITY LIKE 'Blasting&ShopPrimer') GROUP BY DATE, A.MACHINE"));
        
        $machineproductivity = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE, B.CAPACITY, B.OPERATIONAL_HOUR AS NORMAL, SUM(A.MACHINE_WORKING+A.MACHINE_ADD_HOURS) AS REALIZATION FROM ssh A, machines B WHERE A.MACHINE LIKE B.NAME GROUP BY DATE, A.MACHINE"))

        $progr=DB::select(DB::raw("SELECT ID_BLOCK, BLOCK_NAME, ($str*SUM(STRAIGHTENING)/COUNT(ID))+($blast*SUM(BLASTING)/COUNT(ID)) AS PROGRESS FROM `plates` GROUP BY ID_BLOCK, BLOCK_NAME"));
        
        return view('dashboard/ssh_menu')->with('ship', $ship)->with('block', $block)->with('plate', $plate)->with('profile', $profile)->with('ssh', $ssh)->with('progr',$progr)->with('machine',$machine);
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

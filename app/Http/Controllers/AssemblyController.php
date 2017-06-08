<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Panel;
use App\Assembly;
use App\Percentage;
use DB;

class AssemblyController extends Controller
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
        $progress=Panel::select('id_block', DB::raw('sum(FAIRING+FITTING+GRINDING+WELDING)/3 as sum'))->groupBy('id_block')->get();
        $panel=Panel::all();
        $ass=Assembly::all();  

        $fitting=Percentage::where("WORKSHOP","ASSEMBLY")->where("ACTIVITY", "FITTING")->first();
        $welding=Percentage::where("WORKSHOP","ASSEMBLY")->where("ACTIVITY", "WELDING")->first();
        $grinding=Percentage::where("WORKSHOP","ASSEMBLY")->where("ACTIVITY", "GRINDING")->first();
        $fairing=Percentage::where("WORKSHOP","ASSEMBLY")->where("ACTIVITY", "FAIRING")->first();

        $fit = $fitting->PERCENT;
        $weld = $welding->PERCENT;
        $grind = $grinding->PERCENT;
        $fair = $fairing->PERCENT;

        $progr=DB::select(DB::raw("SELECT ID_BLOCK, BLOCK_NAME, ($fit*SUM(FITTING)/COUNT(ID))+($weld*SUM(WELDING)/COUNT(ID))+($grind*SUM(GRINDING)/COUNT(ID))+($fair*SUM(FAIRING)/COUNT(ID)) AS PROGRESS FROM `panels` GROUP BY ID_BLOCK, BLOCK_NAME"));

        return view('dashboard/assembly_menu')->with('ship', $ship)->with('block', $block)->with('panel', $panel)->with('progress', $progress)->with('ass', $ass)->with('progr', $progr);
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

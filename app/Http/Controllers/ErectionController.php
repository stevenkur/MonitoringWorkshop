<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Erection;
use App\Percentage;
use DB;

class ErectionController extends Controller
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
        $erection=Erection::all();

        $loading=Percentage::where("WORKSHOP","ERECTION")->where("ACTIVITY", "LOADING")->first();
        $adjusting=Percentage::where("WORKSHOP","ERECTION")->where("ACTIVITY", "ADJUSTING")->first();
        $fitting=Percentage::where("WORKSHOP","ERECTION")->where("ACTIVITY", "FITTING")->first();
        $welding=Percentage::where("WORKSHOP","ERECTION")->where("ACTIVITY", "WELDING")->first();

        $load = $loading->PERCENT;
        $adjust = $adjusting->PERCENT;
        $fit = $fitting->PERCENT;
        $weld = $welding->PERCENT;

        $progr=DB::select(DB::raw("SELECT ID, NAME, ($load*SUM(LOADING)/COUNT(ID))+($adjust*SUM(ADJUSTING)/COUNT(ID))+($fit*SUM(FITTING)/COUNT(ID))+($weld*SUM(WELDING)/COUNT(ID)) AS PROGRESS FROM `blocks` GROUP BY ID, NAME"));
        
        return view('dashboard/erection_menu')->with('ship', $ship)->with('block', $block)->with('erection', $erection)->with('progr',$progr);
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

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\BBS;
use App\Percentage;
use DB;

class BBSController extends Controller
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
        $bbs=BBS::all();

        $blasting=Percentage::where("WORKSHOP","BBS")->where("ACTIVITY", "BLASTING")->first();
        $painting=Percentage::where("WORKSHOP","BBS")->where("ACTIVITY", "PAINTING")->first();

        $blast = $blasting->PERCENT;
        $paint = $painting->PERCENT;

        $progr=DB::select(DB::raw("SELECT ID_BLOCK, BLOCK_NAME, ($blast*SUM(BLASTING)/COUNT(ID))+($paint*SUM(PAINTING)/COUNT(ID)) AS PROGRESS FROM `rooms` GROUP BY ID_BLOCK, BLOCK_NAME"));
        
        return view('dashboard/bbs_menu')->with('ship', $ship)->with('bbs', $bbs)->with('block', $block)->with('progr',$progr);
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

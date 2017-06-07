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

        $straightening=Percentage::where("WORKSHOP","SSH")->where("ACTIVITY", "STRAIGHTENING")->first();
        $blasting=Percentage::where("WORKSHOP","SSH")->where("ACTIVITY", "BLASTING")->first();

        $str = $straightening->PERCENT;
        $blast = $blasting->PERCENT;

        $progress=DB::select(DB::raw("SELECT ID_BLOCK, BLOCK_NAME, ($str*SUM(STRAIGHTENING)/COUNT(ID))+($blast*SUM(BLASTING)/COUNT(ID)) AS PROGRESS FROM `plates` GROUP BY ID_BLOCK, BLOCK_NAME"));
        
        return view('dashboard/ssh_menu')->with('ship', $ship)->with('block', $block)->with('plate', $plate)->with('profile', $profile)->with('ssh', $ssh)->with('progress',$progress);
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

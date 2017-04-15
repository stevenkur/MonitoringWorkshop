<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Block;
use App\ShipProject;

class BlockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $block=Block::all();
        $ship=ShipProject::all();
        return view('dashboard/block_list')->with('ship', $ship)->with('block', $block);
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
        $ships=ShipProject::findOrFail($request->project_id);
        
        $blocks = new Block();        
        $blocks->NAME = $request->name;        
        $blocks->ID_PROJECT = $request->project_id;		
        $blocks->PROJECT_NAME = $ships->PROJECT_NAME;   
        $blocks->MATERIAL = 0;   
        $blocks->MATERIAL_COMING = 0;   
        $blocks->PART = 0;   
        $blocks->PART_COMING = 0;   
        $blocks->PANEL = 0;   
        $blocks->PANEL_DONE = 0;   
        $blocks->save();
        return redirect()->route('block.index')
            ->with('alert-success', 'Data Berhasil Disimpan.');
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

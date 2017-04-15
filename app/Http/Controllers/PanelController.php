<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Block;
use App\ShipProject;
use App\Panel;

class PanelController extends Controller
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
        $panel=Panel::all();
        return view('dashboard/panel_list')->with('ship', $ship)->with('block', $block)->with('panel', $panel);
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
        $block=Block::findOrFail($request->block_id);
        
        $panel = new Panel();        
        $panel->NAME = $request->name;        
        $panel->ID_PROJECT = $block->ID_PROJECT;		
        $panel->PROJECT_NAME = $block->PROJECT_NAME;   
        $panel->ID_BLOCK = $block->ID;		
        $panel->BLOCK_NAME = $block->NAME;   
        $panel->MATERIAL = 0;   
        $panel->MATERIAL_COMING = 0;   
        $panel->PART = 0;   
        $panel->PART_COMING = 0;   
        $panel->save();
        return redirect()->route('panel.index')
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

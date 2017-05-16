<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Block;
use App\ShipProject;
use App\Panel;
use App\Part;

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
        $ship=ShipProject::findOrFail($block->ID_PROJECT);
        
        $panel = new Panel();        
        $panel->NAME = $request->name;        
        $panel->ID_PROJECT = $block->ID_PROJECT;		
        $panel->PROJECT_NAME = $block->PROJECT_NAME;   
        $panel->ID_BLOCK = $block->ID;		
        $panel->BLOCK_NAME = $block->NAME;
        $panel->save();
        
        $blocks= Block::where('ID', $request->block_id)->update(['PANEL'=>$block->PANEL+1]);
        $ships= ShipProject::where('ID', $block->ID_PROJECT)->update(['PANEL'=>$ship->PANEL+1]);
        
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
        $panel = Panel::where('ID', $id);        
        $panel->NAME = $request->name;        
        $panel->ID_PROJECT = $request->ID_PROJECT;		
        $panel->PROJECT_NAME = $request->PROJECT_NAME;   
        $panel->ID_BLOCK = $request->ID_BLOCK;		
        $panel->BLOCK_NAME = $request->BLOCK_NAME;
        $panel->save();
                
        return redirect()->route('panel.index')
            ->with('alert-success', 'Data Berhasil Disimpan.');
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
        $panels = Panel::where('ID', $id);
        $panel = Panel::find($id);
//        
//        $block=Block::where('ID_BLOCK', $panel->ID_BLOCK);
//        $ship=ShipProject::where('ID_PROJECT', $panel->ID_PROJECT);
//        
        $blocks= Block::where('ID', $panel->ID_BLOCK)->update(['PANEL'=>'PANEL'-1,'PART'=>'PART'-$panel->weight]);
        $ships= ShipProject::where('ID', $panel->ID_PROJECT)->update(['PANEL'=>'PANEL'-1,'PART'=>'PART'-$panel->weight]);

        $parts = Part::where('ID_PANEL', $id)->delete();
        $panels->delete();
        
        return redirect()->route('panel.index')
            ->with('alert-success', 'Data Berhasil Disimpan.');
        
    }
}

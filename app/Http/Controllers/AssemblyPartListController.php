<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Panel;
use App\Part;

class AssemblyPartListController extends Controller
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
        $panel=Panel::all();
        $part=Part::all();
        return view('dashboard/assembly_part')->with('ship', $ship)->with('block', $block)->with('panel', $panel)->with('part', $part);
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
        $panel= Panel::findOrFail($request->panel_id);
        $block= Block::findOrFail($panel->ID_BLOCK);
        $ship= ShipProject::findOrFail($panel->ID_PROJECT);
        
        $part = new Part();        
        $part->ID = $request->id;      
        $part->NAME = $request->name;                
        $part->ID_PROJECT = $panel->ID_PROJECT;		
        $part->PROJECT_NAME = $panel->PROJECT_NAME;   
        $part->ID_BLOCK = $panel->ID_BLOCK;		
        $part->BLOCK_NAME = $panel->BLOCK_NAME;   
        $part->ID_PANEL = $panel->ID;		
        $part->PANEL_NAME = $panel->NAME; 
        $part->NAME = $request->name;
        $part->LENGTH = $request->length; 
        $part->BREADTH = $request->breadth; 
        $part->THICKNESS = $request->thickness;     
        $part->PORT = $request->p;     
        $part->CENTER = $request->c;     
        $part->STARBOARD = $request->s;  
        $part->WEIGHT = $request->weight; 
        $part->STAGE = $request->stage; 
        $part->save();
        
        $panels= Panel::where('ID', $request->panel_id)->update(['PART'=>$panel->PART+$request->weight]);
        $blocks= Block::where('ID', $panel->ID_BLOCK)->update(['PART'=>$block->PART+$request->weight]);
        $ships= ShipProject::where('ID', $panel->ID_PROJECT)->update(['PART'=>$ship->PART+$request->weight]);
        
        return redirect()->route('assembly_part.index')
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

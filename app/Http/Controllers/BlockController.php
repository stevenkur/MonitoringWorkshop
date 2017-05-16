<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Block;
use App\ShipProject;
use App\Panel;
use App\Part;
use App\Plate;
use App\Profile;

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
        $block= Block::all();
        $ship= ShipProject::all();
        
        return view('dashboard/block_list')->with('block', $block)->with('ship', $ship);
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
        
        $ships= ShipProject::where('ID', $request->project_id)->update(['BLOCK'=>$ships->BLOCK+1]);
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
        $block=Block::findOrFail($id);
        $ship=ShipProject::all();
        return view('dashboard/block_list')->with('ship', $ship)->with('block', $block);
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
        $blocks = Block::find($id);        
        $blocks->NAME = $request->name;        
        $blocks->ID_PROJECT = $request->project_id;		
        $blocks->PROJECT_NAME = $request->PROJECT_NAME;   
        $blocks->MATERIAL = $request->MATERIAL;   
        $blocks->MATERIAL_COMING = $request->MATERIAL_COMING;   
        $blocks->PART = $request->PART;   
        $blocks->PART_COMING = $request->PART_COMING;   
        $blocks->PANEL = $request->PANEL;   
        $blocks->PANEL_DONE = $request->PANEL_COMING;   
        $blocks->save();
        
        return redirect()->route('block.index')
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
        $blocks = Block::where('ID', $id);
        $block = Block::find($id);
        
        $ships=ShipProject::where('ID', $block->ID_PROJECT)->update(['BLOCK'=>'BLOCK'-1,'PANEL'=>'PANEL'-1,'PART'=>'PART'-$block->weight]);
        
        $panel = Panel::where('ID_BLOCK', $id)->delete();
        $parts = Part::where('ID_BLOCK', $id)->delete();
        $plate = Plate::where('ID_BLOCK', $id)->delete();
        $profile = Profile::where('ID_BLOCK', $id)->delete();
        $blocks->delete();
        
        return redirect()->route('block.index')
            ->with('alert-success', 'Data Berhasil Disimpan.');
    }
}

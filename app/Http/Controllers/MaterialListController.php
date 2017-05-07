<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Plate;
use App\Profile;

class MaterialListController extends Controller
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
        return view('dashboard/material_list')->with('ship', $ship)->with('block', $block)->with('plate', $plate)->with('profile', $profile);
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
        $block= Block::findOrFail($request->block_id);
        $ship= ShipProject::findOrFail($block->ID_PROJECT);
        // create material
        if($request->type == 'Plate'){
            $part = new Plate();
        } else{
            $part = new Profile(); 
            $part->FORM = $request->form;  
            $part->HEIGHT = $request->height;      
        }
        $part->ID = $request->id;        
        $part->ID_PROJECT = $block->ID_PROJECT;
        $part->PROJECT_NAME = $block->PROJECT_NAME;
        $part->ID_BLOCK = $request->block_id;
        $part->BLOCK_NAME = $block->NAME;
        $part->LENGTH = $request->length; 
        $part->BREADTH = $request->breadth; 
        $part->THICKNESS = $request->thickness;     
        $part->PORT = $request->p;     
        $part->CENTER = $request->c;     
        $part->STARBOARD = $request->s;  
        $part->WEIGHT = $request->weight;   
        $part->save();        
        
        $blocks= Block::where('ID', $request->block_id)->update(['MATERIAL'=>$block->MATERIAL+$request->weight]);
        $ships= ShipProject::where('ID', $block->ID_PROJECT)->update(['MATERIAL'=>$ship->MATERIAL+$request->weight]);
        
        
        return redirect()->route('material_list.index')
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

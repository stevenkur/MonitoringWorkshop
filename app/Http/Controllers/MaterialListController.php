<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Panel;
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
        return view('dashboard/material_list')->with('ship', $ship)->with('block', $block);
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
        // create block
        $block = new Block();
        $block->NAME = $request->block_name;
        
        // create material
        if($request->type == 'Panel'){
            $part = new Panel();
        } else{
            $part = new Profile(); 
            $part->FORM = $request->form;     
        }
        $part->ID = $request->id;        
        $part->ID_BLOCK = $request->block_name;
        $part->TYPE = $request->type;  
        $part->LWL = $request->length; 
        $part->BREADTH = $request->breadth; 
        $part->DEPTH = $request->thickness;     
        $part->PORT = $request->p;     
        $part->CENTER = $request->c;     
        $part->STARBOARD = $request->s;  
        $part->WEIGHT = $request->weight;   
        $part->save();        
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

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;

class ShipProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $ship=ShipProject::all();
        return view('dashboard/ship_project')->with('ship', $ship);
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
        $ship = new ShipProject();        
        $ship->PROJECT_NAME = $request->project_name;        
        $ship->OWNER = $request->owner;		
        $ship->SHIP_TYPE = $request->ship_type;  
        $ship->LWL = $request->lwl; 
        $ship->LPP = $request->lpp; 
        $ship->BREADTH = $request->breadth; 
        $ship->DEPTH = $request->depth;     
        $ship->DRAFT = $request->draft;     
        $ship->DISPLACEMENT = $request->displacement;     
        $ship->DESIGNED_SPEED = $request->sea_speed;       
        $ship->save();        
        return redirect()->route('ship_project.index')
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
        $data=ShipProject::findOrFail($id);
        return view('dashboard/ship_project',compact('data'));
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

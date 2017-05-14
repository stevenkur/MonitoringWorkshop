<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
    public function index(Request $request)
    {
        $user=User::all();
        return view('dashboard/user')->with('user', $user);
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
        $user = new User();        
        $user->USERNAME = $request->username;        
        $user->PASSWORD = $request->password;		
        $user->FULL_NAME = $request->fullname;  
        $user->PHONE_NUMBER = $request->phonenumber; 
        $user->DIVISION = $request->division; 
        $user->POSITION = $request->position; 
        $user->NIK = $request->nik;     
        $user->save();        
        return redirect()->route('users.index')
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
        $user = User::where('USERNAME',$id); 
        $user->update([
            'PASSWORD' => $request->password,
            'FULL_NAME' => $request->fullname,
            'PHONE_NUMBER' => $request->phonenumber,
            'DIVISION' => $request->division,
            'POSITION' => $request->position,
            'NIK' => $request->nik
        ]);
        
        return redirect()->route('users.index')
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
        $user = User::where('USERNAME', $id)->delete();
        return redirect()->route('users.index')
            ->with('alert-success', 'Data Berhasil Dihapus.');
    }
}

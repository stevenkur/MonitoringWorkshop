<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth/login');
    }

    public function loginvalidate()
    {
        //dd(Input::all());
        // $var = array(
        //     'USERNAME'  => 'Required',
        //     'PASSWORD'  => 'Required'
        // );
        // $validator = Validator::make(Input::all(), $var);
        // if($validator->fails())
        // {
        //     dd($validator);
        //     // return Redirect::to('worker')
        //     //     ->withErrors($validator)
        //     //     ->withInput(Input::except('password'));
        // }
        // else
        // {
            $userdata = array(
                'USERNAME'  => Input::get('username'),
                'PASSWORD'  => Input::get('password')
            );
            $remember=Input::get('remember');
            if($remember=='remember')
            {
                if (Auth::attempt(array('USERNAME'=>$userdata['USERNAME'],'PASSWORD'=>$userdata['PASSWORD']),true)){
                    return Redirect::to('admins');
                }
                else{
                    return Redirect::to('users');
                }
            }
            else
            {
                if (Auth::attempt(array('USERNAME'=>$userdata['USERNAME'],'PASSWORD'=>$userdata['PASSWORD']),false)){
                    return Redirect::to('admins');
                    }
                else{
                    return Redirect::to('ship_project');
                }
            }
        // }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}

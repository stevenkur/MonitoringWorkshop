<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function loginvalidate()
    {
        $var = array(
            'USERNAME'  => 'required',
            'PASSWORD'  => 'required',
        );
        $validator = Validator::make(Input::all(), $var);
        if($validator->fails())
        {
            return Redirect::to('home')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        }
        else
        {
            $userdata = array(
                'USERNAME'  => Input::get('username'),
                'PASSWORD'  => Input::get('password'),
            );
            $remember=Input::get('remember');
            if($remember=='remember')
            {
                if (Auth::attempt(array('USERNAME'=>$userdata['USERNAME'],'PASSWORD'=>$userdata['PASSWORD']),true)){
                    return Redirect::to('admins');
                }
                else{
                    return Redirect::to('home');
                }
            }
            else
            {
                if (Auth::attempt(array('USERNAME'=>$userdata['USERNAME'],'PASSWORD'=>$userdata['PASSWORD']),false)){
                    return Redirect::to('admins');
                }
                else{
                    return Redirect::to('home');
                }
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('admin.login');
    }
}

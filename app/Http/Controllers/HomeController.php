<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;

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

    public function login(Request $request)
    {
        $username = Input::get('username');
        $password = Input::get('password');
        $user = User::where('USERNAME', '=', $username)->where('PASSWORD', '=', $password)->first();

        if (empty($user)) 
        {
            return view('auth/login');
        }
        else
        {
            if($user->DIVITION='PPC/Admin')
            {   
                $request->session()->put('username', $username);
                $request->session()->put('divition', $user->DIVITION);
                return redirect('admins');
            }
            else if($user->DIVITION='Steel Stock House')
            {                
                $request->session()->put('username', $username);
                $request->session()->put('divition', $user->DIVITION);
                return redirect('usermain');
            }
            else if($user->DIVITION='Fabrication')
            {                
                $request->session()->put('username', $username);
                $request->session()->put('divition', $user->DIVITION);
                return redirect('usermain');
            }
            else if($user->DIVITION='Sub Assembly')
            {               
                $request->session()->put('username', $username);
                $request->session()->put('divition', $user->DIVITION); 
                return redirect('usermain');
            }
            else if($user->DIVITION='Assembly')
            {            
                $request->session()->put('username', $username);
                $request->session()->put('divition', $user->DIVITION);    
                return redirect('usermain');
            }
            else if($user->DIVITION='Block Blasting Structure')
            {           
                $request->session()->put('username', $username);
                $request->session()->put('divition', $user->DIVITION);     
                return redirect('usermain');
            }
            else if($user->DIVITION='Erection')
            {            
                $request->session()->put('username', $username);
                $request->session()->put('divition', $user->DIVITION);    
                return redirect('usermain');
            }
        }
        
    }

    public function logout(Request $request)
    {
        // Auth::logout();
        $request->session()->flush();
        return Redirect::to('/');
    }
}

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
            if($user->DIVISION=='PPC/Admin')
            {   
                $request->session()->put('username', $username);
                $request->session()->put('division', $user->DIVISION);
                return redirect('admins');
            }
            elseif($user->DIVISION=='Steel Stock House')
            {                
                $request->session()->put('username', $username);
                $request->session()->put('division', $user->DIVISION);
                return redirect('userssh');
            }
            elseif($user->DIVISION=='Fabrication')
            {                
                $request->session()->put('username', $username);
                $request->session()->put('division', $user->DIVISION);
                return redirect('userfabrication');
            }
            elseif($user->DIVISION=='Sub Assembly')
            {               
                $request->session()->put('username', $username);
                $request->session()->put('division', $user->DIVISION); 
                return redirect('usersubassembly');
            }
            elseif($user->DIVISION=='Assembly')
            {            
                $request->session()->put('username', $username);
                $request->session()->put('division', $user->DIVISION);    
                return redirect('userassembly');
            }
            elseif($user->DIVISION=='Block Blasting Structure')
            {           
                $request->session()->put('username', $username);
                $request->session()->put('division', $user->DIVISION);     
                return redirect('userbbs');
            }
            elseif($user->DIVISION=='Erection')
            {            
                $request->session()->put('username', $username);
                $request->session()->put('division', $user->DIVISION);    
                return redirect('usererection');
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

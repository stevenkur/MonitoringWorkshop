<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

use App\ShipProject;
use App\Block;
use App\Panel;
use App\Part;

use App\SSH;
use App\Fabrication;
use App\SubAssembly;
use App\Assembly;
use App\BBS;
use App\Erection;


class UserMainController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
    public function indexssh()
    {
        return view('user/indexssh');
    }   

    public function indexfabrication()
    {
        return view('user/indexfabrication');
    }   

    public function indexsubassembly()
    {
        return view('user/indexsubassembly');
    }   

    public function indexassembly()
    {
        return view('user/indexassembly');
    }   

    public function indexbbs()
    {
        return view('user/indexbbs');
    }   

    public function indexerection()
    {
        return view('user/indexerection');
    }   

}

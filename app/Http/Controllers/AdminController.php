<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Panel;
use App\Plate;
use App\Part;
use App\Room;
use App\User;
use App\Machine;
use Carbon\Carbon;
use DB;
use App\SSH;
use App\Fabrication;
use App\SubAssembly;
use App\Assembly;
use App\BBS;
use App\Erection;
use App\Percentage;

class AdminController extends Controller
{
//    public function __construct() 
//    { 
//        $this->middleware('auth'); 
//    } 
        
    public function index()
    {
        $ship = ShipProject::where('FINISHED', null);
        $ssh=DB::select(DB::raw("SELECT SUM(P.WEIGHT) AS WEIGHT FROM ssh S, plates P WHERE (S.PROCESS='Blasting & Shop Primer' AND S.ID_MATERIAL=P.ID AND MONTH(CURRENT_TIMESTAMP))"));
        $fabrication=DB::select(DB::raw("SELECT SUM(P.WEIGHT) AS WEIGHT FROM fabrications F, plates P WHERE (F.PROCESS='Bending' AND F.ID_MATERIAL=P.ID AND MONTH(CURRENT_TIMESTAMP))"));
        $subassembly=DB::select(DB::raw("SELECT SUM(P.WEIGHT) AS WEIGHT FROM sub_assembly S, parts P WHERE (S.PROCESS='Fairing' AND S.ID_PART=P.ID AND MONTH(CURRENT_TIMESTAMP))"));
        $assembly=DB::select(DB::raw("SELECT SUM(PN.WEIGHT) AS WEIGHT FROM assembly S, panels P, parts PN WHERE (S.PROCESS='Fairing' AND S.ID_PANEL=P.ID AND MONTH(CURRENT_TIMESTAMP) AND PN.ID_PANEL=P.ID)"));
        $bbs=DB::select(DB::raw("SELECT SUM(R.AREA) AS WEIGHT FROM bbs B, rooms R WHERE (B.PROCESS='PAINTING' AND B.ID_MATERIAL=R.ROOM AND MONTH(CURRENT_TIMESTAMP))"));
        $erection=DB::select(DB::raw("SELECT SUM(P.WEIGHT) AS WEIGHT FROM erections E, blocks B, parts P WHERE (E.PROCESS='WELDING' AND E.ID_BLOCK=B.ID AND MONTH(CURRENT_TIMESTAMP) AND P.ID_BLOCK=B.ID)"));

        $user = User::all();
        
        return view('dashboard/index')->with('ship', $ship)->with('user', $user)->with('ssh', $ssh)->with('fabrication', $fabrication)->with('subassembly', $subassembly)->with('assembly', $assembly)->with('bbs', $bbs)->with('erection', $erection);
    }   

    public function total_ship_progress()
    {
        $straightening=Percentage::where("WORKSHOP","SSH")->where("ACTIVITY", "STRAIGHTENING")->first();
        $blasting=Percentage::where("WORKSHOP","SSH")->where("ACTIVITY", "BLASTING")->first();
        $material_coming=Percentage::where("WORKSHOP","SSH")->where("ACTIVITY", "MATERIAL_COMING")->first();
        
        $coming=$material_coming->PERCENT;
        $str = $straightening->PERCENT;
        $blast = $blasting->PERCENT;
        
        $marking=Percentage::where("WORKSHOP","FABRICATION")->where("ACTIVITY", "MARKING")->first();
        $cutting=Percentage::where("WORKSHOP","FABRICATION")->where("ACTIVITY", "CUTTING")->first();
        $bending=Percentage::where("WORKSHOP","FABRICATION")->where("ACTIVITY", "BENDING")->first();

        $mark = $marking->PERCENT;
        $cut = $cutting->PERCENT;
        $bend = $bending->PERCENT;
        
        $fitting=Percentage::where("WORKSHOP","SUBASSEMBLY")->where("ACTIVITY", "FITTING")->first();
        $welding=Percentage::where("WORKSHOP","SUBASSEMBLY")->where("ACTIVITY", "WELDING")->first();
        $grinding=Percentage::where("WORKSHOP","SUBASSEMBLY")->where("ACTIVITY", "GRINDING")->first();
        $fairing=Percentage::where("WORKSHOP","SUBASSEMBLY")->where("ACTIVITY", "FAIRING")->first();

        $fit1 = $fitting->PERCENT;
        $weld1 = $welding->PERCENT;
        $grind1 = $grinding->PERCENT;
        $fair1 = $fairing->PERCENT;
        
        $fitting=Percentage::where("WORKSHOP","ASSEMBLY")->where("ACTIVITY", "FITTING")->first();
        $welding=Percentage::where("WORKSHOP","ASSEMBLY")->where("ACTIVITY", "WELDING")->first();
        $grinding=Percentage::where("WORKSHOP","ASSEMBLY")->where("ACTIVITY", "GRINDING")->first();
        $fairing=Percentage::where("WORKSHOP","ASSEMBLY")->where("ACTIVITY", "FAIRING")->first();

        $fit2 = $fitting->PERCENT;
        $weld2 = $welding->PERCENT;
        $grind2 = $grinding->PERCENT;
        $fair2 = $fairing->PERCENT;
        
        $blasting=Percentage::where("WORKSHOP","BBS")->where("ACTIVITY", "BLASTING")->first();
        $painting=Percentage::where("WORKSHOP","BBS")->where("ACTIVITY", "PAINTING")->first();

        $blast2 = $blasting->PERCENT;
        $paint2 = $painting->PERCENT;
        
        $loading=Percentage::where("WORKSHOP","ERECTION")->where("ACTIVITY", "LOADING")->first();
        $adjusting=Percentage::where("WORKSHOP","ERECTION")->where("ACTIVITY", "ADJUSTING")->first();
        $fitting=Percentage::where("WORKSHOP","ERECTION")->where("ACTIVITY", "FITTING")->first();
        $welding=Percentage::where("WORKSHOP","ERECTION")->where("ACTIVITY", "WELDING")->first();

        $load3 = $loading->PERCENT;
        $adjust3 = $adjusting->PERCENT;
        $fit3 = $fitting->PERCENT;
        $weld3 = $welding->PERCENT;
        
        $query = DB::select(DB::raw("SELECT A.ID, A.PROJECT_NAME, A.START, A.FINISH, ((5*SSH.PROGRESS+10*FAB.PROGRESS+20*SUBASS.PROGRESS+25*ASS.PROGRESS+10*BBS.PROGRESS+30*ERECTION.PROGRESS)/100) AS PROGRESS FROM ship_projects A
        LEFT JOIN
        (SELECT P.ID_PROJECT, P.PROJECT_NAME, (($str*SUM(STRAIGHTENING)/COUNT(ID))+($blast*SUM(BLASTING)/COUNT(ID))+($coming*C.DONE/count(DATE_COMING))) AS PROGRESS FROM `plates` P, (SELECT ID_BLOCK, count(DATE_COMING) as DONE from `plates` where DATE_COMING!='NULL' GROUP BY ID_BLOCK) C WHERE P.ID_BLOCK=C.ID_BLOCK GROUP BY P.ID_PROJECT, P.PROJECT_NAME) SSH
        ON A.ID=SSH.ID_PROJECT
        LEFT JOIN
        (SELECT ID_PROJECT, PROJECT_NAME, ($mark*SUM(MARKING)/COUNT(ID))+($cut*SUM(CUTTING)/COUNT(ID))+($bend*SUM(BLENDING)/COUNT(ID)) AS PROGRESS FROM `plates` GROUP BY ID_PROJECT, PROJECT_NAME) FAB
        ON A.ID=FAB.ID_PROJECT
        LEFT JOIN
        (SELECT ID_PROJECT, PROJECT_NAME, ($fit1*SUM(FITTING)/COUNT(ID))+($weld1*SUM(WELDING)/COUNT(ID))+($grind1*SUM(GRINDING)/COUNT(ID))+($fair1*SUM(FAIRING)/COUNT(ID)) AS PROGRESS FROM `parts` GROUP BY ID_PROJECT, PROJECT_NAME) SUBASS
        ON A.ID=SUBASS.ID_PROJECT
        LEFT JOIN
        (SELECT ID_PROJECT, PROJECT_NAME, ($fit2*SUM(FITTING)/COUNT(ID))+($weld2*SUM(WELDING)/COUNT(ID))+($grind2*SUM(GRINDING)/COUNT(ID))+($fair2*SUM(FAIRING)/COUNT(ID)) AS PROGRESS FROM `panels` GROUP BY ID_PROJECT, PROJECT_NAME) ASS
        ON A.ID=ASS.ID_PROJECT
        LEFT JOIN
        (SELECT ID_PROJECT, PROJECT_NAME, ($blast2*SUM(BLASTING)/COUNT(ID))+($paint2*SUM(PAINTING)/COUNT(ID)) AS PROGRESS FROM `rooms` GROUP BY ID_PROJECT, PROJECT_NAME) BBS
        ON A.ID=BBS.ID_PROJECT
        LEFT JOIN
        (SELECT ID_PROJECT, PROJECT_NAME, ($load3*SUM(LOADING)/COUNT(ID))+($adjust3*SUM(ADJUSTING)/COUNT(ID))+($fit3*SUM(FITTING)/COUNT(ID))+($weld3*SUM(WELDING)/COUNT(ID)) AS PROGRESS FROM `blocks` GROUP BY ID_PROJECT, PROJECT_NAME) ERECTION
        ON A.ID=ERECTION.ID_PROJECT"));
        
        return view('dashboard/total_ship_progress')->with('ship', $query);
    }

    public function planning_workload()
    {
        $ship = ShipProject::all();
        $now = Carbon::now()->toDateString();
        $ssh = Machine::where('WORKSHOP', 'SSH')->get();
        $fabrication = Machine::where('WORKSHOP', 'Fabrication')->get();
        $subassembly = Machine::where('WORKSHOP', 'Sub Assembly')->get();
        $assembly = Machine::where('WORKSHOP', 'Assembly')->get();
        $room = Room::all();

        $count = DB::select(DB::raw("SELECT WORKSHOP, ACTIVITY, COUNT(ID) AS COUNT FROM machines GROUP BY WORKSHOP, ACTIVITY"));
//        dd($count);
        
        return view('dashboard/planning_workload')->with('ship', $ship)->with('now', $now)->with('ssh', $ssh)->with('fabrication', $fabrication)->with('subassembly', $subassembly)->with('assembly', $assembly)->with('count', $count)->with('room', $room);
    }

    public function conclusion_all_project()
    {
        $ship = ShipProject::all();
        $ssh = Machine::where('WORKSHOP', 'SSH')->get();
        $fabrication = Machine::where('WORKSHOP', 'Fabrication')->get();
        $subassembly = Machine::where('WORKSHOP', 'Sub Assembly')->get();
        $assembly = Machine::where('WORKSHOP', 'Assembly')->get();
        $total_workload = DB::select(DB::raw("SELECT SUM(DISPLACEMENT) AS TOTAL, SUM(MATERIAL) AS MAT FROM `ship_projects`"));
        $count = DB::select(DB::raw("SELECT WORKSHOP, ACTIVITY, COUNT(ID) AS COUNT FROM machines GROUP BY WORKSHOP, ACTIVITY"));
        $room = Room::all();
        
        $sshday = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE, A.ID_MATERIAL, SUM(A.MACHINE_WORKING+A.MACHINE_ADD_HOURS)/COUNT(A.ID) AS MACHINE_WORKS, SUM(B.WEIGHT)/COUNT(A.ID) AS WEIGHT FROM ssh A, plates B WHERE (A.ID_MATERIAL=B.ID) GROUP BY DATE, A.MACHINE, A.ID_MATERIAL"));
        
        return view('dashboard/conclusion_all_project')->with('ship', $ship)->with('ssh', $ssh)->with('fabrication', $fabrication)->with('subassembly', $subassembly)->with('assembly', $assembly)->with('total_workload', $total_workload)->with('count', $count)->with('room', $room)->with('sshday', $sshday);
    }

    public function conclusion_finishing_workload()
    {
        $ship = ShipProject::all();
        $ssh = Machine::where('WORKSHOP', 'SSH')->get();
        $fabrication = Machine::where('WORKSHOP', 'Fabrication')->get();
        $subassembly = Machine::where('WORKSHOP', 'Sub Assembly')->get();
        $assembly = Machine::where('WORKSHOP', 'Assembly')->get();
        $total_workload = DB::select(DB::raw("SELECT SUM(DISPLACEMENT) AS TOTAL, SUM(MATERIAL) AS MAT FROM `ship_projects`"));
        $count = DB::select(DB::raw("SELECT WORKSHOP, ACTIVITY, COUNT(ID) AS COUNT FROM machines GROUP BY WORKSHOP, ACTIVITY"));
        $worker = DB::select(DB::raw("SELECT DIVISION, COUNT(ID) AS COUNT FROM workers GROUP BY DIVISION"));

        $machineproductivity1 = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE, B.ACTIVITY, B.CAPACITY*B.OPERATIONAL_HOUR*60 AS CAPACITY, SUM(C.WEIGHT)/COUNT(A.ID) AS WEIGHT, B.OPERATIONAL_HOUR AS NORMAL, MAX(A.MACHINE_WORKING+A.MACHINE_ADD_HOURS) AS REALIZATION FROM ssh A, machines B, plates C WHERE (A.MACHINE LIKE B.NAME AND A.ID_MATERIAL LIKE C.ID) GROUP BY DATE, A.MACHINE"));

        $machineproductivity2 = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE,  B.ACTIVITY,B.CAPACITY*B.OPERATIONAL_HOUR*60 AS CAPACITY, SUM(C.WEIGHT)/COUNT(A.ID) AS WEIGHT, B.OPERATIONAL_HOUR AS NORMAL, MAX(A.MACHINE_WORKING+A.MACHINE_ADD_HOURS) AS REALIZATION  FROM fabrications A, machines B, plates C  WHERE A.MACHINE LIKE B.NAME GROUP BY DATE, A.MACHINE"));

        $machineproductivity3 = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE, B.ACTIVITY, B.CAPACITY*B.OPERATIONAL_HOUR*60 AS CAPACITY, SUM(D.DISPLACEMENT)/COUNT(A.ID) AS WEIGHT, B.OPERATIONAL_HOUR AS NORMAL, MAX(A.MACHINE_WORKING+A.MACHINE_ADD_HOURS) AS REALIZATION FROM sub_assembly A, machines B, parts C, ship_projects D WHERE (A.MACHINE LIKE B.NAME AND A.ID_PART LIKE C.ID AND C.ID_PROJECT LIKE D.ID) GROUP BY DATE, A.MACHINE"));

        $machineproductivity4 = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE, B.ACTIVITY, B.CAPACITY*B.OPERATIONAL_HOUR*60 AS CAPACITY, SUM(D.DISPLACEMENT)/COUNT(A.ID) AS WEIGHT,  B.OPERATIONAL_HOUR AS NORMAL, MAX(A.MACHINE_WORKING+A.MACHINE_ADD_HOURS) AS REALIZATION FROM assembly A, machines B, panels C, ship_projects D WHERE (A.MACHINE LIKE B.NAME AND A.ID_PANEL LIKE C.ID AND C.ID_PROJECT LIKE D.ID) GROUP BY DATE, A.MACHINE"));

        return view('dashboard/conclusion_finishing_workload')->with('ship', $ship)->with('ssh', $ssh)->with('fabrication', $fabrication)->with('subassembly', $subassembly)->with('assembly', $assembly)->with('total_workload', $total_workload)->with('machineproductivity1',$machineproductivity1)->with('machineproductivity2',$machineproductivity2)->with('machineproductivity3',$machineproductivity3)->with('machineproductivity4',$machineproductivity4)->with('count',$count)->with('worker',$worker);
    }

    public function destroy()
    {

    }

    public function edit()
    {

    }
}

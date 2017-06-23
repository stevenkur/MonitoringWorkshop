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
//        $ship = ShipProject::all();
        $query = DB::select(DB::raw("SELECT SP.ID,SP.PROJECT_NAME,SP.START,SP.FINISH,(SUM(PLATES.STRAIGHTENING)/COUNT(PLATES.ID)) AS S_STRAIGHTENING,(SUM(PLATES.BLASTING)/COUNT(PLATES.ID)) AS S_BLASTING,(SUM(PLATES.MARKING)/COUNT(PLATES.ID)) AS F_MARKING,(SUM(PLATES.CUTTING)/COUNT(PLATES.ID)) AS F_CUTTING,(SUM(PLATES.BLENDING)/COUNT(PLATES.ID)) AS F_BENDING, (SUM(PARTS.FITTING)/COUNT(PARTS.ID)) AS SA_FITTING,(SUM(PARTS.WELDING)/COUNT(PARTS.ID)) AS SA_WELDING,(SUM(PARTS.GRINDING)/COUNT(PARTS.ID)) AS SA_GRINDING,(SUM(PARTS.FAIRING)/COUNT(PARTS.ID)) AS SA_FAIRING,(SUM(PANELS.FITTING)/COUNT(PANELS.ID)) AS A_FITTING,(SUM(PANELS.WELDING)/COUNT(PANELS.ID)) AS A_WELDING,(SUM(PANELS.GRINDING)/COUNT(PANELS.ID)) AS A_GRINDING,(SUM(PANELS.FAIRING)/COUNT(PANELS.ID)) AS A_FAIRING,(SUM(ROOMS.BLASTING)/COUNT(ROOMS.ID)) AS B_BLASTING,(SUM(ROOMS.PAINTING)/COUNT(ROOMS.ID)) AS B_PAINTING,(SUM(BLOCKS.LOADING)/COUNT(BLOCKS.ID)) AS E_LOADING,(SUM(BLOCKS.ADJUSTING)/COUNT(BLOCKS.ID)) AS E_ADJUSTING,(SUM(BLOCKS.FITTING)/COUNT(BLOCKS.ID)) AS E_FITTING,(SUM(BLOCKS.WELDING)/COUNT(BLOCKS.ID)) AS E_WELDING FROM ship_projects SP, plates PLATES, parts PARTS, panels PANELS, blocks BLOCKS, rooms ROOMS WHERE (SP.ID=PLATES.ID_PROJECT AND SP.ID=PARTS.ID_PROJECT AND SP.ID=PANELS.ID_PROJECT AND SP.ID=BLOCKS.ID_PROJECT AND SP.ID=ROOMS.ID_PROJECT) GROUP BY SP.ID, SP.PROJECT_NAME, SP.START, SP.FINISH"));
        
        $ssh = Percentage::where('WORKSHOP', 'SSH')->get();
        $fab = Percentage::where('WORKSHOP', 'FABRICATION')->get();
        $subass = Percentage::where('WORKSHOP', 'SUBASSEMBLY')->get();
        $ass = Percentage::where('WORKSHOP', 'ASSEMBLY')->get();
        $bbs = Percentage::where('WORKSHOP', 'BBS')->get();
        $erec = Percentage::where('WORKSHOP', 'ERECTION')->get();
        
        $i=0;
        $progress[0]=0;
        foreach($query as $queries)
        {                  
            $sshPercentage = (($ssh[0]->PERCENT*$queries->S_STRAIGHTENING)+($ssh[1]->PERCENT*$queries->S_BLASTING));
            $fabPercentage = (($fab[0]->PERCENT*$queries->F_MARKING)+($fab[1]->PERCENT*$queries->F_CUTTING)+($fab[2]->PERCENT*$queries->F_BENDING));
            $subassPercentage = (($subass[0]->FITTING*$queries->SA_FITTING)+($subass[1]->PERCENT*$queries->SA_WELDING)+($subass[2]->PERCENT*$queries->SA_GRINDING)+($subass[3]->PERCENT*$queries->SA_FAIRING));
            $assPercentage = (($ass[0]->PERCENT*$queries->A_FITTING)+($ass[1]->PERCENT*$queries->A_WELDING)+($ass[2]->PERCENT*$queries->A_GRINDING)+($ass[3]->PERCENT*$queries->A_FAIRING));
            $bbsPercentage = (($bbs[0]->PERCENT*$queries->B_BLASTING)+($bbs[1]->PERCENT*$queries->B_PAINTING));
            $erecPercentage = (($erec[0]->PERCENT*$queries->E_LOADING)+($erec[1]->PERCENT*$queries->E_ADJUSTING)+($erec[2]->PERCENT*$queries->E_FITTING)+($erec[3]->PERCENT*$queries->E_WELDING));
                            
            $progress[$i++] = ($sshPercentage+$fabPercentage+$subassPercentage+$assPercentage+$bbsPercentage+$erecPercentage)/600;
        }
        
        return view('dashboard/total_ship_progress')->with('progress', $progress)->with('ship', $query);
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
        $total_workload = DB::select(DB::raw("SELECT SUM(DISPLACEMENT) AS TOTAL FROM `ship_projects`"));
        $count = DB::select(DB::raw("SELECT WORKSHOP, ACTIVITY, COUNT(ID) AS COUNT FROM machines GROUP BY WORKSHOP, ACTIVITY"));
        $room = Room::all();
        
        $sshday = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE, A.ID_MATERIAL, SUM(A.MACHINE_WORKING+A.MACHINE_ADD_HOURS)/COUNT(A.ID) AS MACHINE_WORKS, SUM(B.WEIGHT)/COUNT(A.ID) AS WEIGHT FROM SSH A, PLATES B WHERE (A.ID_MATERIAL=B.ID) GROUP BY DATE, A.MACHINE, A.ID_MATERIAL"));
        
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

        $machineproductivity1 = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE, B.ACTIVITY, B.CAPACITY*B.OPERATIONAL_HOUR*60 AS CAPACITY, SUM(C.WEIGHT)/COUNT(A.ID) AS WEIGHT, B.OPERATIONAL_HOUR AS NORMAL, SUM(A.MACHINE_WORKING+A.MACHINE_ADD_HOURS) AS REALIZATION FROM ssh A, machines B, plates C WHERE (A.MACHINE LIKE B.NAME AND A.ID_MATERIAL LIKE C.ID) GROUP BY DATE, A.MACHINE"));

        $machineproductivity2 = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE,  B.ACTIVITY,B.CAPACITY*B.OPERATIONAL_HOUR*60 AS CAPACITY, SUM(C.WEIGHT)/COUNT(A.ID) AS WEIGHT, B.OPERATIONAL_HOUR AS NORMAL, SUM(A.MACHINE_WORKING+A.MACHINE_ADD_HOURS) AS REALIZATION  FROM fabrications A, machines B, plates C  WHERE A.MACHINE LIKE B.NAME GROUP BY DATE, A.MACHINE"));

        $machineproductivity3 = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE, B.ACTIVITY, B.CAPACITY*B.OPERATIONAL_HOUR*60 AS CAPACITY, SUM(D.DISPLACEMENT)/COUNT(A.ID) AS WEIGHT, B.OPERATIONAL_HOUR AS NORMAL, SUM(A.MACHINE_WORKING+A.MACHINE_ADD_HOURS) AS REALIZATION FROM sub_assembly A, machines B, parts C, ship_projects D WHERE (A.MACHINE LIKE B.NAME AND A.ID_PART LIKE C.ID AND C.ID_PROJECT LIKE D.ID) GROUP BY DATE, A.MACHINE"));

        $machineproductivity4 = DB::select(DB::raw("SELECT DATE(A.created_at) AS DATE, A.MACHINE, B.ACTIVITY, B.CAPACITY*B.OPERATIONAL_HOUR*60 AS CAPACITY, SUM(D.DISPLACEMENT)/COUNT(A.ID) AS WEIGHT,  B.OPERATIONAL_HOUR AS NORMAL, SUM(A.MACHINE_WORKING+A.MACHINE_ADD_HOURS) AS REALIZATION FROM assembly A, machines B, panels C, ship_projects D WHERE (A.MACHINE LIKE B.NAME AND A.ID_PANEL LIKE C.ID AND C.ID_PROJECT LIKE D.ID) GROUP BY DATE, A.MACHINE"));

        return view('dashboard/conclusion_finishing_workload')->with('ship', $ship)->with('ssh', $ssh)->with('fabrication', $fabrication)->with('subassembly', $subassembly)->with('assembly', $assembly)->with('total_workload', $total_workload)->with('machineproductivity1',$machineproductivity1)->with('machineproductivity2',$machineproductivity2)->with('machineproductivity3',$machineproductivity3)->with('machineproductivity4',$machineproductivity4)->with('count',$count)->with('worker',$worker);
    }

    public function destroy()
    {

    }

    public function edit()
    {

    }
}

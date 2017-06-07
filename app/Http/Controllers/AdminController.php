<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\ShipProject;
use App\Block;
use App\Panel;
use App\Part;
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
        $user = User::all();
        
        return view('dashboard/index')->with('ship', $ship)->with('user', $user);
    }   

    public function total_ship_progress()
    {
//        $ship = ShipProject::all();
        $query = DB::select(DB::raw("SELECT SP.ID,SP.PROJECT_NAME,SP.START,SP.FINISH,(SUM(PLATES.STRAIGHTENING)/COUNT(PLATES.ID)) AS S_STRAIGHTENING,(SUM(PLATES.BLASTING)/COUNT(PLATES.ID)) AS S_BLASTING,(SUM(PLATES.MARKING)/COUNT(PLATES.ID)) AS F_MARKING,(SUM(PLATES.CUTTING)/COUNT(PLATES.ID)) AS F_CUTTING,(SUM(PLATES.BLENDING)/COUNT(PLATES.ID)) AS F_BENDING, (SUM(PARTS.FITTING)/COUNT(PARTS.ID)) AS SA_FITTING,(SUM(PARTS.WELDING)/COUNT(PARTS.ID)) AS SA_WELDING,(SUM(PARTS.GRINDING)/COUNT(PARTS.ID)) AS SA_GRINDING,(SUM(PARTS.FAIRING)/COUNT(PARTS.ID)) AS SA_FAIRING,(SUM(PANELS.FITTING)/COUNT(PANELS.ID)) AS A_FITTING,(SUM(PANELS.WELDING)/COUNT(PANELS.ID)) AS A_WELDING,(SUM(PANELS.GRINDING)/COUNT(PANELS.ID)) AS A_GRINDING,(SUM(PANELS.FAIRING)/COUNT(PANELS.ID)) AS A_FAIRING,(SUM(ROOMS.BLASTING)/COUNT(ROOMS.ID)) AS B_BLASTING,(SUM(ROOMS.PAINTING)/COUNT(ROOMS.ID)) AS B_PAINTING,(SUM(BLOCKS.LOADING)/COUNT(BLOCKS.ID)) AS E_LOADING,(SUM(BLOCKS.ADJUSTING)/COUNT(BLOCKS.ID)) AS E_ADJUSTING,(SUM(BLOCKS.FITTING)/COUNT(BLOCKS.ID)) AS E_FITTING,(SUM(BLOCKS.WELDING)/COUNT(BLOCKS.ID)) AS E_WELDING FROM ship_projects SP, plates PLATES, parts PARTS, panels PANELS, blocks BLOCKS, rooms ROOMS WHERE  (SP.ID=PLATES.ID_PROJECT AND SP.ID=PARTS.ID_PROJECT AND SP.ID=PANELS.ID_PROJECT AND SP.ID=BLOCKS.ID_PROJECT AND SP.ID=ROOMS.ID_PROJECT) GROUP BY SP.ID, SP.PROJECT_NAME, SP.START, SP.FINISH"));
        
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

        return view('dashboard/planning_workload')->with('ship', $ship)->with('now', $now)->with('ssh', $ssh)->with('fabrication', $fabrication)->with('subassembly', $subassembly)->with('assembly', $assembly);
    }

    public function conclusion_all_project()
    {
        $ship = ShipProject::all();
        $ssh = Machine::where('WORKSHOP', 'SSH')->get();
        $fabrication = Machine::where('WORKSHOP', 'Fabrication')->get();
        $subassembly = Machine::where('WORKSHOP', 'Sub Assembly')->get();
        $assembly = Machine::where('WORKSHOP', 'Assembly')->get();

        return view('dashboard/conclusion_all_project')->with('ship', $ship)->with('ssh', $ssh)->with('fabrication', $fabrication)->with('subassembly', $subassembly)->with('assembly', $assembly);
    }

    public function conclusion_finishing_workload()
    {
        $ship = ShipProject::all();

        return view('dashboard/conclusion_finishing_workload')->with('ship', $ship);
    }

    public function destroy()
    {

    }

    public function edit()
    {

    }
}

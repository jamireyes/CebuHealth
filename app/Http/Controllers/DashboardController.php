<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Data;
use App\clusters;
use App\districts;
use App\mlgu;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all()->count();
        $data = Data::all()->count();
        return view('dashboard', compact('users', 'data'));
    }

    public function ClusterChart()
    {
        $Cluster_Count = [];

        for($x = 1; $x <= clusters::all()->count(); $x++){
            $Cluster_Count[$x-1] = Data::all()->where('ClusterNo', $x)->count();
        }

        $Cluster_Description = DB::table('clusters')->selectRaw('Description')->get();

        return json_encode(compact('Cluster_Count', 'Cluster_Description'));
    }

    public function DistrictChart()
    {
        $District_Count = [];

        for($x = 1; $x <= districts::all()->count(); $x++){
            $District_Count[$x-1] = Data::all()->where('DistrictNo', $x)->count();
        }

        $District_Description = DB::table('districts')->selectRaw('Description')->get();
        
        return json_encode(compact('District_Count', 'District_Description'));
    }

    public function MLGUChart()
    {
        $MLGU_Count = [];

        for($x = 1; $x <= mlgu::all()->count(); $x++){
            $MLGU_Count[$x-1] = Data::all()->where('mLGU_No', $x)->count();
        }

        $MLGU_Description = DB::table('mlgus')->selectRaw('Description')->get();
        
        return json_encode(compact('MLGU_Count', 'MLGU_Description'));
    }
}

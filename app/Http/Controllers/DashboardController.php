<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Data;
use App\Clusters;
use App\Districts;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function ClusterChart()
    {
        $Cluster1 = Data::all()->where('ClusterNo', 1)->count();
        $Cluster2 = Data::all()->where('ClusterNo', 2)->count();
        $Cluster3 = Data::all()->where('ClusterNo', 3)->count();
        $Cluster4 = Data::all()->where('ClusterNo', 4)->count();
        $Clusters = Clusters::all();

        return json_encode(compact('Cluster1', 'Cluster2', 'Cluster3', 'Cluster4', 'Clusters'));
    }

    public function DistrictChart()
    {
        $District1 = Data::all()->where('DistrictNo', 1)->count();
        $District2 = Data::all()->where('DistrictNo', 2)->count();
        $District3 = Data::all()->where('DistrictNo', 3)->count();
        $District4 = Data::all()->where('DistrictNo', 4)->count();
        $District5 = Data::all()->where('DistrictNo', 5)->count();
        $District6 = Data::all()->where('DistrictNo', 6)->count();
        $District7 = Data::all()->where('DistrictNo', 7)->count();
        $District8 = Data::all()->where('DistrictNo', 8)->count();
        $District9 = Data::all()->where('DistrictNo', 9)->count();
        $District10 = Data::all()->where('DistrictNo', 10)->count();
        $District11 = Data::all()->where('DistrictNo', 11)->count();
        $District12 = Data::all()->where('DistrictNo', 12)->count();
        $District13 = Data::all()->where('DistrictNo', 13)->count();
        $District14 = Data::all()->where('DistrictNo', 14)->count();
        $District15 = Data::all()->where('DistrictNo', 15)->count();
        $District16 = Data::all()->where('DistrictNo', 16)->count();
        $District = districts::all();

        return json_encode(compact('District1', 'District2', 'District3', 'District4', 'District5', 'District6', 'District7', 'District8', 'District9', 'District10', 'District11', 'District12', 'District13', 'District14', 'District15', 'District15', 'District16', 'District'));
    }
}

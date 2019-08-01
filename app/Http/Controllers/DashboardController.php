<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Data;
use App\Clusters;
use App\Districts;
use App\mlgu;

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

    public function MLGUChart()
    {
        $MLGU1 = Data::all()->where('mLGU_No', 1)->count();
        $MLGU2 = Data::all()->where('mLGU_No', 2)->count();
        $MLGU3 = Data::all()->where('mLGU_No', 3)->count();
        $MLGU4 = Data::all()->where('mLGU_No', 4)->count();
        $MLGU5 = Data::all()->where('mLGU_No', 5)->count();
        $MLGU6 = Data::all()->where('mLGU_No', 6)->count();
        $MLGU7 = Data::all()->where('mLGU_No', 7)->count();
        $MLGU8 = Data::all()->where('mLGU_No', 8)->count();
        $MLGU9 = Data::all()->where('mLGU_No', 9)->count();
        $MLGU10 = Data::all()->where('mLGU_No', 10)->count();
        $MLGU11 = Data::all()->where('mLGU_No', 11)->count();
        $MLGU12 = Data::all()->where('mLGU_No', 12)->count();
        $MLGU13 = Data::all()->where('mLGU_No', 13)->count();
        $MLGU14 = Data::all()->where('mLGU_No', 14)->count();
        $MLGU15 = Data::all()->where('mLGU_No', 15)->count();
        $MLGU16 = Data::all()->where('mLGU_No', 16)->count();
        $MLGU17 = Data::all()->where('mLGU_No', 17)->count();
        $MLGU18 = Data::all()->where('mLGU_No', 18)->count();
        $MLGU19 = Data::all()->where('mLGU_No', 19)->count();
        $MLGU20 = Data::all()->where('mLGU_No', 20)->count();
        $MLGU21 = Data::all()->where('mLGU_No', 21)->count();
        $MLGU22 = Data::all()->where('mLGU_No', 22)->count();
        $MLGU23 = Data::all()->where('mLGU_No', 23)->count();
        $MLGU24 = Data::all()->where('mLGU_No', 24)->count();
        $MLGU25 = Data::all()->where('mLGU_No', 25)->count();
        $MLGU26 = Data::all()->where('mLGU_No', 26)->count();
        $MLGU27 = Data::all()->where('mLGU_No', 27)->count();
        $MLGU28 = Data::all()->where('mLGU_No', 28)->count();
        $MLGU29 = Data::all()->where('mLGU_No', 29)->count();
        $MLGU30 = Data::all()->where('mLGU_No', 30)->count();
        $MLGU31 = Data::all()->where('mLGU_No', 31)->count();
        $MLGU32 = Data::all()->where('mLGU_No', 32)->count();
        $MLGU33 = Data::all()->where('mLGU_No', 33)->count();
        $MLGU34 = Data::all()->where('mLGU_No', 34)->count();
        $MLGU35 = Data::all()->where('mLGU_No', 35)->count();
        $MLGU36 = Data::all()->where('mLGU_No', 36)->count();
        $MLGU37 = Data::all()->where('mLGU_No', 37)->count();
        $MLGU38 = Data::all()->where('mLGU_No', 38)->count();
        $MLGU39 = Data::all()->where('mLGU_No', 39)->count();
        $MLGU40 = Data::all()->where('mLGU_No', 40)->count();
        $MLGU41 = Data::all()->where('mLGU_No', 41)->count();
        $MLGU42 = Data::all()->where('mLGU_No', 42)->count();
        $MLGU43 = Data::all()->where('mLGU_No', 43)->count();
        $MLGU44 = Data::all()->where('mLGU_No', 44)->count();
        $MLGU45 = Data::all()->where('mLGU_No', 45)->count();
        $MLGU46 = Data::all()->where('mLGU_No', 46)->count();
        $MLGU47 = Data::all()->where('mLGU_No', 47)->count();
        $MLGU48 = Data::all()->where('mLGU_No', 48)->count();
        $MLGU49 = Data::all()->where('mLGU_No', 49)->count();
        $MLGU50 = Data::all()->where('mLGU_No', 50)->count();
        $MLGU51 = Data::all()->where('mLGU_No', 51)->count();
        $MLGU52 = Data::all()->where('mLGU_No', 52)->count();
        $MLGU53 = Data::all()->where('mLGU_No', 53)->count();
        $MLGU54 = Data::all()->where('mLGU_No', 54)->count();
        $MLGU55 = Data::all()->where('mLGU_No', 55)->count();
        $MLGU56 = Data::all()->where('mLGU_No', 56)->count();
        $MLGU57 = Data::all()->where('mLGU_No', 57)->count();
        $MLGU58 = Data::all()->where('mLGU_No', 58)->count();
        $MLGU59 = Data::all()->where('mLGU_No', 59)->count();
        $MLGU60 = Data::all()->where('mLGU_No', 60)->count();
        $MLGUs = mlgu::all();
        
        return json_encode(compact('MLGU1', 'MLGU2', 'MLGU3', 'MLGU4', 'MLGU5', 'MLGU6', 'MLGU7', 'MLGU8', 'MLGU9', 'MLGU10', 'MLGU11', 'MLGU12', 'MLGU13', 'MLGU14', 'MLGU15', 'MLGU16', 'MLGU17', 'MLGU18', 'MLGU19', 'MLGU20', 'MLGU21', 'MLGU22', 'MLGU23', 'MLGU24', 'MLGU25', 'MLGU26', 'MLGU27', 'MLGU28', 'MLGU29', 'MLGU30', 'MLGU31', 'MLGU32', 'MLGU33', 'MLGU34', 'MLGU35', 'MLGU36', 'MLGU37', 'MLGU38', 'MLGU39', 'MLGU40', 'MLGU41', 'MLGU42', 'MLGU43', 'MLGU44', 'MLGU45', 'MLGU46', 'MLGU47', 'MLGU48', 'MLGU49', 'MLGU50', 'MLGU51', 'MLGU52', 'MLGU53', 'MLGU54', 'MLGU55', 'MLGU56', 'MLGU57', 'MLGU58', 'MLGU59', 'MLGU60', 'MLGUs'));
    }
}

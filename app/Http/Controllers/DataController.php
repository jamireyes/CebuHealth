<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\barangay;
use App\bloodTypes;
use App\clusters;
use App\districts;
use App\mlgu;
use App\Data;
use Datatables;
use DB;
use Auth;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Data::all();

        return view('Data.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barangays = barangay::all();
        $bloodtypes = bloodTypes::all();
        $clusters = clusters::all();
        $districts = districts::all();
        $mlgus = mlgu::all();

        return view('Data.create', compact('barangays', 'bloodtypes', 'clusters', 'districts', 'mlgus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ClusterNo' => 'required',
            'DistrictNo' => 'required',
            'mLGU_No' => 'required',
            'BarangayNo' => 'required',
            'LName' => 'required',
            'FName' => 'required',
            'MI' => 'required',
            'Birthdate' => 'required',
            'Gender' => 'required',
            'Weight_kg' => 'required',
            'Height_cm' => 'required',
            'BloodTypeID' => 'required',
            'Contact_No' => 'required',
            'House_No' => 'required',
            'Street_Name' => 'required',
            'Sitio' => 'required',
            'Purok' => 'required',
            'Barangay' => 'required',
        ]);

        $data = new Data;
        $data->User_ID = Auth::user()->id;
        $data->ClusterNo = $request->input('ClusterNo');
        $data->DistrictNo = $request->input('DistrictNo');
        $data->mLGU_No = $request->input('mLGU_No');
        $data->BarangayNo = $request->input('BarangayNo');
        $data->LName = $request->input('LName');
        $data->FName = $request->input('FName');
        $data->MI = $request->input('MI');
        $data->Birthdate = $request->input('Birthdate');
        $data->Gender = $request->input('Gender');
        $data->Weight_kg = $request->input('Weight_kg');
        $data->Height_cm = $request->input('Height_cm');
        $data->BloodTypeID = $request->input('BloodTypeID');
        $data->Contact_No = $request->input('Contact_No');
        $data->House_No = $request->input('House_No');
        $data->Street_Name = $request->input('Street_Name');
        $data->Sitio = $request->input('Sitio');
        $data->Purok = $request->input('Purok');
        $data->Barangay = $request->input('Barangay');
        $data->Status = 1;
        $data->save();
        
        return redirect('/')->with('success', 'Entry Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $datas = Data::find($id);
        return view('Data.show', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datas = Data::find($id);
        $barangays = barangay::all();
        $bloodtypes = bloodTypes::all();
        $clusters = clusters::all();
        $districts = districts::all();
        $mlgus = mlgu::all();

        return view('Data.edit', compact('datas', 'barangays', 'bloodtypes', 'clusters', 'districts', 'mlgus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'ClusterNo' => 'required',
            'DistrictNo' => 'required',
            'mLGU_No' => 'required',
            'BarangayNo' => 'required',
            'LName' => 'required',
            'FName' => 'required',
            'MI' => 'required',
            'Birthdate' => 'required',
            'Gender' => 'required',
            'Weight_kg' => 'required',
            'Height_cm' => 'required',
            'BloodTypeID' => 'required',
            'Contact_No' => 'required',
            'House_No' => 'required',
            'Street_Name' => 'required',
            'Sitio' => 'required',
            'Purok' => 'required',
            'Barangay' => 'required',
        ]);

        $data = Data::find($id);
        $data->ClusterNo = $request->input('ClusterNo');
        $data->DistrictNo = $request->input('DistrictNo');
        $data->mLGU_No = $request->input('mLGU_No');
        $data->BarangayNo = $request->input('BarangayNo');
        $data->LName = $request->input('LName');
        $data->FName = $request->input('FName');
        $data->MI = $request->input('MI');
        $data->Birthdate = $request->input('Birthdate');
        $data->Gender = $request->input('Gender');
        $data->Weight_kg = $request->input('Weight_kg');
        $data->Height_cm = $request->input('Height_cm');
        $data->BloodTypeID = $request->input('BloodTypeID');
        $data->Contact_No = $request->input('Contact_No');
        $data->House_No = $request->input('House_No');
        $data->Street_Name = $request->input('Street_Name');
        $data->Sitio = $request->input('Sitio');
        $data->Purok = $request->input('Purok');
        $data->Barangay = $request->input('Barangay');
        $data->Status = 1;
        $data->save();
        
        return redirect('/Data')->with('success', 'Entry Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

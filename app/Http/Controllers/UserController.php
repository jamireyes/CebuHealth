<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataEntryUser;
use Datatables;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $Data = DataEntryUser::all();
        // return view('DataEntryUser.create', compact('Data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('DataEntryUser.create');
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
            'Cluster_No' => 'required',
            'District_No' => 'required',
            'mLGU_No' => 'required',
            'Barangay_No' => 'required',
            'LName' => 'required',
            'FName' => 'required',
            'MI' => 'required',
            'Birthdate' => 'required',
            'Gender' => 'required',
            'Weight_kg' => 'required',
            'Height_cm' => 'required',
            'BloodType_ID' => 'required',
            'Contact_No' => 'required',
            'House_No' => 'required',
            'Street_Name' => 'required',
            'Sitio' => 'required',
            'Purok' => 'required',
            'Barangay' => 'required',
        ]);

        $data = new DataEntryUser;
        $data->Cluster_No = $request->input('Cluster_No');
        $data->District_No = $request->input('District_No');
        $data->mLGU_No = $request->input('mLGU_No');
        $data->Barangay_No = $request->input('Barangay_No');
        $data->LName = $request->input('LName');
        $data->FName = $request->input('FName');
        $data->MI = $request->input('MI');
        $data->Birthdate = $request->input('Birthdate');
        $data->Gender = $request->input('Gender');
        $data->Weight_kg = $request->input('Weight_kg');
        $data->Height_cm = $request->input('Height_cm');
        $data->BloodType_ID = $request->input('BloodType_ID');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

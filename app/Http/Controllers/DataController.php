<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\DataExport;
use App\Exports\DataExportSearch;
use App\Imports\DataImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use App\barangay;
use App\bloodTypes;
use App\clusters;
use App\districts;
use App\mlgu;
use App\Data;
use Datatables;
use Auth;

class DataController extends Controller
{    
    public function index()
    {
        $datas = Data::withTrashed()->get();
        $barangays = barangay::all();
        $bloodtypes = bloodTypes::all();
        $clusters = clusters::all();
        $districts = districts::all();
        $mlgus = mlgu::all();

        return view('Data.index', compact('datas', 'barangays', 'bloodtypes', 'clusters', 'districts', 'mlgus'));
    }

    public function DataEntryIndex()
    {
        $datas = Data::all()->where('User_ID', Auth::user()->id);
        $barangays = barangay::all();
        $bloodtypes = bloodTypes::all();
        $clusters = clusters::all();
        $districts = districts::all();
        $mlgus = mlgu::all();

        return view('Data.index', compact('datas', 'barangays', 'bloodtypes', 'clusters', 'districts', 'mlgus'));
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
        $data->save();
        toastr()->success('New Entry Added!', 'Successful!');

        return (Auth::user()->role->Description == 'Admin') ? redirect()->route('Data.index') : redirect()->route('Data.DataEntryIndex', Auth::user()->username);
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
        $data->save();
        toastr()->success('Entry Updated!', 'Successful!');

        return (Auth::user()->role->Description == 'Admin') ? redirect()->route('Data.index') : redirect()->route('Data.DataEntryIndex', Auth::user()->username);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Data::find($id)->delete();
        toastr()->success('Entry Removed', 'Successful!');

        return (Auth::user()->role->Description == 'Admin') ? redirect()->route('Data.index') : redirect()->route('Data.DataEntryIndex', Auth::user()->username);
    }

    public function restore($id)
    {
        $data = Data::withTrashed()->find($id)->restore();
        toastr()->success('Entry Restored!', 'Successful!');

        return redirect()->route('Data.index');
    }

    public function exportAll(Request $request)
    {
        $ex = $request->get('data');
        
        foreach($ex as $x){
            $array[] = (int)$x;
        }

        $DataExport = new DataExport;
        $DataExport->setData($array);
        
        return Excel::download($DataExport, 'Data_All.xlsx');
    }

    public function importExcel(Request $request)
    {
        $file = Excel::toArray(new DataImport, $request->file, \Maatwebsite\Excel\Excel::XLSX);
        $imports = $file[0];

        return json_encode(compact('imports'));
        //return Excel::import(new DataImport, $request->file, \Maatwebsite\Excel\Excel::XLSX);
    }

    public function importExcelToDB(Request $request)
    {
        $array = json_decode($request->data);        
        foreach($array as $row){
            // $this->validate($data, [
            //     'ClusterNo' => 'required',
            //     'DistrictNo' => 'required',
            //     'mLGU_No' => 'required',
            //     'BarangayNo' => 'required',
            //     'LName' => 'required',
            //     'FName' => 'required',
            //     'MI' => 'required',
            //     'Birthdate' => 'required',
            //     'Gender' => 'required',
            //     'Weight_kg' => 'required',
            //     'Height_cm' => 'required',
            //     'BloodTypeID' => 'required',
            //     'Contact_No' => 'required',
            //     'House_No' => 'required',
            //     'Street_Name' => 'required',
            //     'Sitio' => 'required',
            //     'Purok' => 'required',
            //     'Barangay' => 'required',
            // ]);

            $data = new Data;
            $data->User_ID = Auth::user()->id;
            $data->ClusterNo = $row->ClusterNo;
            $data->DistrictNo = $row->DistrictNo;
            $data->mLGU_No = $row->mLGU_No;
            $data->BarangayNo = $row->BarangayNo;
            $data->LName = $row->LName;
            $data->FName = $row->FName;
            $data->MI = $row->MI;
            $data->Birthdate = $row->Birthdate;
            $data->Gender = $row->Gender;
            $data->Weight_kg = $row->Weight_kg;
            $data->Height_cm = $row->Height_cm;
            $data->BloodTypeID = $row->BloodTypeID;
            $data->Contact_No = $row->Contact_No;
            $data->House_No = $row->House_No;
            $data->Street_Name = $row->Street_Name;
            $data->Sitio = $row->Sitio;
            $data->Purok = $row->Purok;
            $data->Barangay = $row->Barangay;
            $data->save();
            // toastr()->success('New Entry Added!', 'Successful!');
        }
    }

}

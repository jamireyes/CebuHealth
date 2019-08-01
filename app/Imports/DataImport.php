<?php

namespace App\Imports;

use App\Data;
use Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class DataImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row['clusterno']);
        $data = new Data;
        $data->User_ID = Auth::user()->id;
        $data->ClusterNo = $row['clusterno'];
        $data->DistrictNo = $row['districtno'];
        $data->mLGU_No = $row['mlgu_no'];
        $data->BarangayNo = $row['barangayno'];
        $data->LName = $row['lname'];
        $data->FName = $row['fname'];
        $data->MI = $row['mi'];
        $data->Birthdate = $row['birthdate'];
        $data->Gender = $row['gender'];
        $data->Weight_kg = $row['weight_kg'];
        $data->Height_cm = $row['height_cm'];
        $data->BloodTypeID = $row['bloodtypeid'];
        $data->Contact_No = $row['contact_no'];
        $data->House_No = $row['house_no'];
        $data->Street_Name = $row['street_name'];
        $data->Sitio = $row['sitio'];
        $data->Purok = $row['purok'];
        $data->Barangay = $row['barangay'];
        // $data->save();
        return $data;
    }
}

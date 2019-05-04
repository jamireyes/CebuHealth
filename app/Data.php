<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'User_ID',
        'ClusterNo',
        'DistrictNo',
        'mLGU_No',
        'BarangayNo',
        'LName',
        'FName',
        'MI',
        'Birthdate',
        'Gender',
        'Weight_kg',
        'Height_cm',
        'BloodTypeID',
        'Contact_No',
        'House_No',
        'Street_Name',
        'Sitio',
        'Purok',
        'Barangay', 
    ];

    protected $primaryKey = 'Data_ID';

    public function user()
    {
        return $this->hasOne('App\User', 'User_ID', 'User_ID');
    }

    public function cluster()
    {
        return $this->hasOne('App\clusters', 'ClusterNo', 'ClusterNo');
    }

    public function district()
    {
        return $this->hasOne('App\districts', 'DistrictNo', 'DistrictNo');
    }

    public function bloodType()
    {
        return $this->hasOne('App\bloodTypes', 'BloodTypeID', 'BloodTypeID');
    }

    public function barangay()
    {
        return $this->hasOne('App\barangay', 'BarangayNo', 'BarangayNo');
    }

    public function mlgu()
    {
        return $this->hasOne('App\mlgu', 'mLGU_No', 'mLGU_No');
    }
}

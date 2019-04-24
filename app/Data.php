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

    public function user()
    {
        return $this->hasOne('App\User', 'User_ID');
    }

    public function clusters()
    {
        return $this->hasOne('App\clusters', 'ClusterNo');
    }

    public function districts()
    {
        return $this->hasOne('App\districts', 'DistrictNo');
    }

    public function bloodTypes()
    {
        return $this->hasOne('App\bloodTypes', 'BloodTypeID');
    }

    public function barangay()
    {
        return $this->hasOne('App\barangay', 'BarangayNo');
    }

    public function mlgu()
    {
        return $this->hasOne('App\mlgu', 'mLGU_No');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataEntryUser extends Model
{
    protected $fillable = [
        'Cluster_No',
        'District_No',
        'mLGU_No',
        'Barangay_No',
        'LName',
        'FName',
        'MI',
        'Birthdate',
        'Gender',
        'Weight_kg',
        'Height_cm',
        'BloodType_ID',
        'Contact_No',
        'House_No',
        'Street_Name',
        'Sitio',
        'Purok',
        'Barangay'
    ];
}

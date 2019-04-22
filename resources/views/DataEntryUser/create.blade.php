@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @include('include.message')
            {!! Form::open(['action' => 'UserController@store', 'method' => 'POST', 'class' => '', 'autocomplete' => 'no']) !!}
            @csrf
            <div class="form-row mt-5">
                <div class="form-group col-sm-6">
                    <label for="Cluster_No" class="">Cluster</label>
                    <select id="Cluster_No" class="form-control">
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="District_No" class="">District</label>
                    <select id="District_No" class="form-control">
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="mLGU_No" class="">MLGU</label>
                    <select id="mLGU_No" class="form-control">
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="Barangay_No" class="">Barangay</label>
                    <select id="Barangay_No" class="form-control">
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-5">
                    <label for="LName" class="">Last Name</label>
                    <input type="text" id="LName" name="LName" class="form-control" placeholder="Last Name">
                </div>
                <div class="form-group col-sm-5">
                    <label for="FName" class="">First Name</label>
                    <input type="text" id="FName" name="FName" class="form-control" placeholder="First Name">
                </div>
                <div class="form-group col-sm-2">
                    <label for="MI" class="">M.I.</label>
                    <input type="text" id="MI" name="MI" class="form-control" placeholder="M.I.">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="Birthdate" class="">Birthdate</label>
                    <input type="date" id="Birthdate" name="Birthdate" class="form-control" placeholder="Birthdate">
                </div>
                <div class="form-group col-sm-6">
                    <label for="Gender" class="">Gender</label>
                    <select id="Gender" name="Gender" class="form-control">
                        <option value="1">Male</option>
                        <option value="0">Female</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-4">
                    <label for="Weight_kg" class="">Weight</label>
                    <input type="text" id="Weight_kg" name="Weight_kg" class="form-control" placeholder="Weight (kg)">
                </div>
                <div class="form-group col-sm-4">
                    <label for="Height_cm" class="">Height</label>
                    <input type="text" id="Height_cm" name="Height_cm" class="form-control" placeholder="Height (cm)">
                </div>
                <div class="form-group col-sm-4">
                    <label for="BloodType_ID" class="">Blood Type</label>
                    <select id="BloodType_ID" name="BloodType_ID" class="form-control">
                    
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="Contact_No" class="">Contact No.</label>
                <input type="text" id="Contact_No" name="Contact_No" class="form-control" placeholder="Contact No.">
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="House_No" class="">House No.</label>
                    <input type="text" id="House_No" name="House_No" class="form-control" placeholder="House No.">
                </div>
                <div class="form-group col-sm-6">
                    <label for="Street_Name" class="">Street</label>
                    <input type="text" id="Street_Name" name="Street_Name" class="form-control" placeholder="Street Name">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="Sitio" class="">Sitio</label>
                    <input type="text" id="Sitio" name="Sitio" class="form-control" placeholder="Sitio">
                </div>
                <div class="form-group col-sm-6">
                    <label for="Purok" class="">Purok</label>
                    <input type="text" id="Purok" name="Purok" class="form-control" placeholder="Purok">
                </div>
            </div>
            <div class="form-group">
                <label for="Barangay" class="">Barangay</label>
                <input type="text" id="Barangay" name="Barangay" class="form-control" placeholder="Barangay">
            </div>
            <div class="form-group mt-5">
                {{Form::submit('Submit', ['class' => 'btn btn-primary btn-user btn-block'])}}
            </div>
        {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-md-10">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @include('include.message')
            {!! Form::open(['action' => 'DataController@store', 'method' => 'POST', 'class' => '', 'autocomplete' => 'no']) !!}
            @csrf
            <div class="form-row mt-5">
                <div class="form-group col-sm-6">
                    <label for="ClusterNo" class="">Cluster</label>
                    <select id="ClusterNo" name="ClusterNo" class="form-control">
                        @foreach ($clusters as $cluster)
                            <option value="{{$cluster->ClusterNo}}">{{$cluster->Description}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="DistrictNo" class="">District</label>
                    <select id="DistrictNo" name="DistrictNo" class="form-control">
                        @foreach ($districts as $district)
                            <option value="{{$district->DistrictNo}}">{{$district->Description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="mLGU_No" class="">MLGU</label>
                    <select id="mLGU_No" name="mLGU_No" class="form-control">
                        @foreach ($mlgus as $mlgu)
                            <option value="{{$mlgu->mLGU_No}}">{{$mlgu->Description}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="BarangayNo" class="">Barangay</label>
                    <select id="BarangayNo" name="BarangayNo" class="form-control">
                        @foreach ($barangays as $barangay)
                            <option value="{{$barangay->BrgyNo}}">{{$barangay->Description}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-5">
                    <label for="LName">Last Name</label>
                    <input type="text" id="LName" name="LName" class="form-control" placeholder="Last Name">
                </div>
                <div class="form-group col-sm-5">
                    <label for="FName">First Name</label>
                    <input type="text" id="FName" name="FName" class="form-control" placeholder="First Name">
                </div>
                <div class="form-group col-sm-2">
                    <label for="MI">M.I.</label>
                    <input type="text" id="MI" name="MI" class="form-control" placeholder="M.I.">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-6">
                    <label for="Birthdate">Birthdate</label>
                    <input type="date" id="Birthdate" name="Birthdate" class="form-control" placeholder="Birthdate">
                </div>
                <div class="form-group col-sm-6">
                    <label for="Gender">Gender</label>
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
                    <label for="BloodTypeID" class="">Blood Type</label>
                    <select id="BloodTypeID" name="BloodTypeID" class="form-control">
                        @foreach ($bloodtypes as $bloodtype)
                            <option value="{{$bloodtype->BloodTypeID}}">{{$bloodtype->Description}}</option>
                        @endforeach
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

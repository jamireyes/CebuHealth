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
            {!! Form::open(['action' => ['DataController@update', $datas->Data_ID], 'method' => 'POST']) !!}
                @csrf
                <div class="form-row mt-5">
                    <div class="form-group col-sm-6">
                        <label for="ClusterNo">Cluster</label>
                        <select id="ClusterNo" name="ClusterNo" class="form-control">
                            @foreach ($clusters as $cluster)
                                @if($cluster->ClusterNo != $datas->ClusterNo)
                                    <option value="{{$cluster->ClusterNo}}">{{$cluster->Description}}</option>
                                @elseif($cluster->ClusterNo == $datas->ClusterNo)
                                    <option value="{{$datas->ClusterNo}}" selected>{{$datas->cluster->Description}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="DistrictNo">District</label>
                        <select id="DistrictNo" name="DistrictNo" class="form-control">
                            @foreach ($districts as $district)
                                @if($district->DistrictNo != $datas->DistrictNo)
                                    <option value="{{$district->DistrictNo}}">{{$district->Description}}</option>
                                @elseif($district->DistrictNo == $datas->DistrictNo)
                                    <option value="{{$datas->DistrictNo}}" selected>{{$datas->district->Description}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="mLGU_No">MLGU</label>
                        <select id="mLGU_No" name="mLGU_No" class="form-control">
                            @foreach ($mlgus as $mlgu)
                                @if($mlgu->mLGU_No != $datas->mLGU_No)
                                    <option value="{{$mlgu->mLGU_No}}">{{$mlgu->Description}}</option>
                                @elseif($mlgu->mLGU_No == $datas->mLGU_No)
                                    <option value="{{$datas->mLGU_No}}" selected>{{$datas->mlgu->Description}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="BarangayNo">Barangay</label>
                        <select id="BarangayNo" name="BarangayNo" class="form-control">
                            @foreach ($barangays as $barangay)
                                @if($barangay->BarangayNo != $datas->BarangayNo)
                                    <option value="{{$barangay->BarangayNo}}">{{$barangay->Description}}</option>
                                @elseif($barangay->BarangayNo == $datas->BarangayNo)
                                    <option value="{{$barangay->BarangayNo}}" selected>{{$datas->barangay->Description}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-5">
                        <label for="LName">Last Name</label>
                        <input type="text" id="LName" name="LName" value="{{$datas->LName}}" class="form-control" placeholder="Last Name">
                    </div>
                    <div class="form-group col-sm-5">
                        <label for="FName">First Name</label>
                        <input type="text" id="FName" name="FName" value="{{$datas->FName}}" class="form-control" placeholder="First Name">
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="MI">M.I.</label>
                        <input type="text" id="MI" name="MI" value="{{$datas->MI}}" class="form-control" placeholder="M.I.">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="Birthdate">Birthdate</label>
                        <input type="date" id="Birthdate" name="Birthdate" value="{{$datas->Birthdate}}" class="form-control" placeholder="Birthdate">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="Gender">Gender</label>
                        <select id="Gender" name="Gender" class="form-control">
                            @if($datas->Gender == 1)
                                <option value="1" selected>Male</option>
                                <option value="0">Female</option>
                            @elseif($datas->Gender == 0)
                                <option value="1">Male</option>
                                <option value="0" selected>Female</option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-4">
                        <label for="Weight_kg" class="">Weight</label>
                        <input type="text" id="Weight_kg" name="Weight_kg" value="{{$datas->Weight_kg}}" class="form-control" placeholder="Weight (kg)">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="Height_cm" class="">Height</label>
                        <input type="text" id="Height_cm" name="Height_cm" value="{{$datas->Height_cm}}" class="form-control" placeholder="Height (cm)">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="BloodTypeID" class="">Blood Type</label>
                        <select id="BloodTypeID" name="BloodTypeID" class="form-control">
                            @foreach ($bloodtypes as $bloodtype)
                                @if($bloodtype->BloodTypeID != $datas->BloodTypeID)
                                    <option value="{{$bloodtype->BloodTypeID}}">{{$bloodtype->Description}}</option>
                                @elseif($bloodtype->BloodTypeID == $datas->BloodTypeID)
                                    <option value="{{$bloodtype->BloodTypeID}}" selected>{{$datas->bloodtype->Description}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Contact_No" class="">Contact No.</label>
                    <input type="text" id="Contact_No" name="Contact_No" value="{{$datas->Contact_No}}" class="form-control" placeholder="Contact No.">
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="House_No" class="">House No.</label>
                        <input type="text" id="House_No" name="House_No" value="{{$datas->House_No}}" class="form-control" placeholder="House No.">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="Street_Name" class="">Street</label>
                        <input type="text" id="Street_Name" name="Street_Name" value="{{$datas->Street_Name}}" class="form-control" placeholder="Street Name">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-sm-6">
                        <label for="Sitio" class="">Sitio</label>
                        <input type="text" id="Sitio" name="Sitio" value="{{$datas->Sitio}}" class="form-control" placeholder="Sitio">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="Purok" class="">Purok</label>
                        <input type="text" id="Purok" name="Purok" value="{{$datas->Purok}}" class="form-control" placeholder="Purok">
                    </div>
                </div>
                <div class="form-group">
                    <label for="Barangay" class="">Barangay</label>
                    <input type="text" id="Barangay" name="Barangay" value="{{$datas->Barangay}}" class="form-control" placeholder="Barangay">
                </div>
                {{Form::hidden('_method', 'PUT')}}
                <div class="form-group mt-5">
                    {{Form::submit('Submit', ['class' => 'btn btn-primary btn-user btn-block'])}}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

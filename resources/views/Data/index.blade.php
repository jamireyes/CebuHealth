@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-10">
            <h3>Data Entry</h3>
            <hr>
            <table id="DataEntryTable" class="table table-responsive data-table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Cluster</th>
                        <th>District</th>
                        <th>mLGU</th>
                        <th>Barangay</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>M.I.</th>
                        <th>Birthdate</th>
                        <th>Gender</th>
                        <th>Weight (kg)</th>
                        <th>Height (cm)</th>
                        <th>Blood Type</th>
                        <th>Contact No</th>
                        <th>House</th>
                        <th>Street</th>
                        <th>Sitio</th>
                        <th>Purok</th>
                        <th>Barangay</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $data)
                        <tr>
                            <td>{{$data->User_ID}}</td>
                            <td>{{$data->cluster->Description}}</td>
                            <td>{{$data->district->Description}}</td>
                            <td>{{$data->mlgu->Description}}</td>
                            <td>{{$data->barangay->Description}}</td>
                            <td>{{$data->LName}}</td>
                            <td>{{$data->FName}}</td>
                            <td>{{$data->MI}}</td>
                            <td>{{$data->Birthdate}}</td>
                            <td>{{$data->Gender}}</td>
                            <td>{{$data->Weight_kg}}</td>
                            <td>{{$data->Height_cm}}</td>
                            <td>{{$data->bloodtype->Description}}</td>
                            <td>{{$data->Contact_No}}</td>
                            <td>{{$data->House_No}}</td>
                            <td>{{$data->Street_Name}}</td>
                            <td>{{$data->Sitio}}</td>
                            <td>{{$data->Purok}}</td>
                            <td>{{$data->Barangay}}</td>
                            <th><a href="/Data/{{$data->Data_ID}}/edit" class="btn btn-sm btn-warning">Edit</a> <a href="/Data/{{$data->Data_ID}}/delete" class="btn btn-sm btn-danger">Delete</a></th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
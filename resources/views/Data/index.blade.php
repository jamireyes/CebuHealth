@extends('layouts.app')

@section('content')

@include('include.message')
    <div class="card shadow">
        <div class="card-header">
            <div class="d-flex">
                <div class="mr-auto p-1"><h5 class="text-secondary">Data Entry</h5></div>
                <div class="p-1"><a href="{{ route('Data.create') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Entry</a></div>
                <div class="p-1"><a href="{{ route('Data.exportAll') }}" class="btn btn-sm btn-success"><i class="fa fa-download" aria-hidden="true"></i> Export All</a></div>
                <div class="p-1"><button id="ExportSearchEntry" href="{{ route('Data.exportSearch') }}" class="btn btn-sm btn-success"><i class="fa fa-download" aria-hidden="true"></i> Export Searched</button></div>
            </div>
        </div>
        @if(!$datas->isEmpty())
            <div class="card-body">
                <table id="DataEntryTable" class="table table-striped display compact nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Data ID</th>
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
                            <th>Weight</th>
                            <th>Height</th>
                            <th>Blood Type</th>
                            <th>Contact No</th>
                            <th>House</th>
                            <th>Street</th>
                            <th>Sitio</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>
                                    @if($data->deleted_at == NULL)
                                        <i class="fas fa-circle success"></i>
                                    @else
                                        <i class="fas fa-circle danger"></i>
                                    @endif
                                </td>
                                <td>{{$data->Data_ID}}</td>
                                <td>{{$data->User_ID}}</td>
                                <td>{{$data->cluster->Description}}</td>
                                <td>{{$data->district->Description}}</td>
                                <td>{{$data->mlgu->Description}}</td>
                                <td>{{$data->barangay->Description}}</td>
                                <td>{{$data->LName}}</td>
                                <td>{{$data->FName}}</td>
                                <td>{{$data->MI}}</td>
                                <td>{{$data->Birthdate}}</td>
                                <td>{{($data->Gender == 1) ? 'Male' : 'Female'}}</td>
                                <td>{{$data->Weight_kg}} kg</td>
                                <td>{{$data->Height_cm}} cm</td>
                                <td>{{$data->bloodtype->Description}}</td>
                                <td>{{$data->Contact_No}}</td>
                                <td>{{$data->House_No}}</td>
                                <td>{{$data->Street_Name}}</td>
                                <td>{{$data->Sitio}}</td>
                                <td>{{$data->Purok}}</td>
                                <td>{{$data->Barangay}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->updated_at}}</td>
                                <td>
                                    <a id="EditEntryBtn" href="#" data-toggle="modal" data-target="#EditEntry" data-data="{{$data}}"><i class="fas fa-edit warning" data-toggle="tooltip" title="Edit"></i></a>
                                    @if($data->deleted_at == NULL)
                                        <a id="DeleteEntryBtn" href="#" data-toggle="modal" data-target="#DeleteEntry" data-id="{{$data->Data_ID}}"><i class="fas fa-trash-alt danger" data-toggle="tooltip" title="Delete"></i></a>
                                    @else
                                        <a id="RestoreEntryBtn" href="#" data-toggle="modal" data-target="#RestoreEntry" data-id="{{$data->Data_ID}}"><i class="fas fa-trash-restore primary" data-toggle="tooltip" title="Restore"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @include('Data.edit')
            @include('Data.delete')
            @include('Data.restore')
        @else
            <h4 class="text-center py-5" style="color:grey"><i class="fas fa-exclamation-triangle"></i> No data found</h4>
        @endif
    </div>
@endsection
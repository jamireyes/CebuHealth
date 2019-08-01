@extends('layouts.app')

@section('content')

{{-- @include('include.message') --}}
    <div class="d-flex">
        <div class="mr-auto p-1"><h3 class="text-secondary"><i class="fa fa-file pr-2" aria-hidden="true"></i> Data Entry</h3></div>
        <div class="p-1">
            <a href="{{ route('Data.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Entry</a>
        </div>
        <div class="p-1">
            <button id="ExportData" class="btn btn-secondary" href="{{ route('Data.exportAll') }}"><i class="fa fa-download" aria-hidden="true"></i> Export</button>
        </div>
        <div class="p-1">
            <form id="importForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <button id="ImportSubmit" type="submit" class="btn btn-secondary"><i class="fas fa-upload"></i> Import</button>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="fileImport">
                        <label class="custom-file-label" for="fileImport">Choose file</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow">
        @if(!$datas->isEmpty())
            <div class="card-body">
                <table id="DataEntryTable" class="table table-striped display compact nowrap w-100" style="font-size: 12px;">
                    <thead>
                        <tr>
                            <th>Status</th>
                            <th>Data ID</th>
                            <th>User ID</th>
                            <th>Cluster</th>
                            <th>District</th>
                            <th>mLGU</th>
                            <th>Barangay</th>
                            <th>Full Name</th>
                            <th>Birthday</th>
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
                                <td>{{$data->FName.' '.$data->MI.'. '.$data->LName}}</td>
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
                                    <a id="EditEntryBtn" href="#" data-toggle="modal" data-backdrop="static" data-target="#EditEntry" data-data="{{$data}}"><i class="fas fa-edit warning" data-toggle="tooltip" title="Edit"></i></a>
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
            @include('Data.ViewImport')
            
        @else
            <h4 class="text-center py-5" style="color:grey"><i class="fas fa-exclamation-triangle"></i> No data found</h4>
        @endif
    </div>
@endsection
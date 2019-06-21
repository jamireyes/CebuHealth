@extends('layouts.app')

@section('content')
@include('include.message')
<div class="card">
    <div class="card-header">
        <div class="d-flex">
            <div class="mr-auto p-1"><strong>User Accounts</strong></div>
            <div class="p-1"><a class="btn btn-sm btn-primary" href="{{ url('/register') }}">Register</a></div>
            <div class="p-1"><a class="btn btn-sm btn-success" href="{{ route('Account.exportAll') }}">Export All</a></div>
            <div class="p-1"><button class="btn btn-sm btn-success" href="{{ route('Account.exportSearch') }}" id="ExportSearch">Export Searched</button></div>
        </div>
    </div>
    <div class="card-body">
        <table id="AccountTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Update At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            @if($user->deleted_at == NULL)
                                <i class="fas fa-circle success"></i>
                            @else
                                <i class="fas fa-circle danger"></i>
                            @endif
                        </td>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->Description}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>
                            <a id="EditAccountBtn" href="#" data-toggle="modal" data-target="#EditAccount" data-user="{{$user}}"><i class="fas fa-edit warning" data-toggle="tooltip" title="Edit"></i></a>
                            @if($user->deleted_at == NULL)
                                <a id="DeleteAccountBtn" href="#" data-toggle="modal" data-target="#DeleteAccount" data-id="{{$user->id}}" data-username="{{$user->username}}"><i class="fas fa-trash-alt danger" data-toggle="tooltip" title="Delete"></i></a>
                            @else
                                <a id="RestoreAccountBtn" href="#" data-toggle="modal" data-target="#RestoreAccount" data-id="{{$user->id}}" data-username="{{$user->username}}"><i class="fas fa-trash-restore primary" data-toggle="tooltip" title="Restore"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('Account.edit')
    @include('Account.delete')
    @include('Account.restore')
</div>
@endsection
@extends('layouts.app')

@section('content')
{{-- @include('include.message') --}}
<div class="d-flex mb-3">
    <div class="mr-auto p-1"><h3 class="text-secondary"><i class="fa fa-user pr-2" aria-hidden="true"></i> User Accounts</h3></div>
    <div class="p-1"><a class="btn btn-primary" href="{{ url('/register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></div>
    <div class="p-1"><button id="ExportUsers" class="btn btn-secondary" href="{{ route('Account.exportAll') }}"><i class="fa fa-download" aria-hidden="true"></i> Export</button></div>
</div>
<div class="card shadow">
    <div class="card-body">
        <table id="AccountTable" class="table table-striped display compact nowrap w-100" style="font-size: 12px;">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>User ID</th>
                    <th>Full Name</th>
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
                        <td>{{$user->first_name}} {{$user->middle_init}}. {{$user->last_name}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->Description}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>
                            <a id="EditAccountBtn" href="#" data-toggle="modal" data-backdrop="static" data-target="#EditAccount" data-user="{{$user}}"><i class="fas fa-edit warning" data-toggle="tooltip" title="Edit"></i></a>
                            @if($user->deleted_at == NULL)
                                <a id="DeleteAccountBtn" href="#" data-toggle="modal" data-target="#DeleteAccount" data-id="{{$user->id}}" data-first="{{$user->first_name}}" data-last="{{$user->last_name}}" data-middle="{{$user->middle_init}}"><i class="fas fa-trash-alt danger" data-toggle="tooltip" title="Delete"></i></a>
                            @else
                                <a id="RestoreAccountBtn" href="#" data-toggle="modal" data-target="#RestoreAccount" data-id="{{$user->id}}" data-first="{{$user->first_name}}" data-last="{{$user->last_name}}" data-middle="{{$user->middle_init}}"><i class="fas fa-trash-restore primary" data-toggle="tooltip" title="Restore"></i></a>
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
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col-xl-12 col-lg-10">
            <h3>Accounts</h3>
            <hr>
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body">
                    <table id="AccountTable" class="table table-condensed table-striped table-responsive data-table mt-5" width="100%">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Role</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Created At</th>
                                <th>Update At</th>
                                <th>Deleted At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($users) > 0)
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->role->Description}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->created_at}}</td>
                                        <td>{{$user->updated_at}}</td>
                                        <td>{{$user->deleted_at}}</td>
                                        <th>
                                            <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#EditAccount">Edit</button>
                                            @if($user->RoleID != 1)
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#DeleteAccount">Delete</button>
                                            @elseif($user->RoleID == 1)
                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#DeleteAccount" disabled>Delete</button>
                                            @endif
                                        </th>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
        </div>
    </div>
    @include('Account.delete')
    @include('Account.edit')
</div>
@endsection
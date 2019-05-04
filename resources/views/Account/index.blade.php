@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-10">
            <h3>Accounts</h3>
            <hr>
            <table id="AccountTable" class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Last Update</th>
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
                                <td>{{$user->status}}</td>
                                <td>{{$user->created_at}}</td>
                                <td>{{$user->updated_at}}</td>
                                <th><a href="/Account/{{$user->id}}/edit" class="btn btn-sm btn-warning">Edit</a> <a href="/Account/{{$user->id}}/delete" class="btn btn-sm btn-danger">Delete</a></th>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
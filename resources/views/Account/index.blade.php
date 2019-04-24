@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-12 col-md-8">
            <h3>Accounts</h3>
            <hr>
            <table id="DataEntryTable" class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Role</th>
                        <th>Username</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Last Update</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->role->Description}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->status}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
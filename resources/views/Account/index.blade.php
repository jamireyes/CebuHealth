@extends('layouts.app')

@section('content')
<div class="container">
    <div class="justify-content-center">
        <div class="col-xl-12 col-lg-10">
            <h3>Accounts</h3>
            <hr>
            <table id="AccountTable" class="table table-responsive data-table mt-5" cellspacing="0" width="100%">
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
                                {{-- <th>
                                    <a href="/Account/{{$user->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                                    {!!Form::open(['action' => ['AccountController@destroy', $user->id], 'method' => 'POST'])!!}
                                        @csrf
                                        {{Form::hidden('_method', 'DELETE')}}
                                        @if($user->RoleID == 1)
                                            {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger', 'disabled'])}}
                                        @elseif($user->RoleID != 1)
                                            {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger'])}}
                                        @endif
                                    {!!Form::close()!!}
                                </th> --}}
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
            <a class="btn btn-primary" href="{{ route('register') }}">Register</a>
        </div>
    </div>
    @include('Account.delete')
    @include('Account.edit')
</div>
@endsection
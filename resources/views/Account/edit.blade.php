@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white bg-custom">{{ __('Edit Account') }}</div>
                <div class="card-body">
                    {!! Form::open(['action' => ['AccountController@update', $users->id], 'method' => 'POST']) !!}
                        @csrf
                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$users->email}}" required autocomplete="email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{$users->username}}" required autocomplete="username">

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="RoleID" class="col-md-4 col-form-label text-md-right">Role</label>

                            <div class="col-md-6">
                                <select id="RoleID" class="form-control{{ $errors->has('RoleID') ? ' is-invalid' : '' }}" name="RoleID" required autocomplete="RoleID" autofocus>
                                    @foreach($roles as $role)
                                        @if($role->RoleID != $users->RoleID)
                                            <option value="{{$role->RoleID}}">{{$role->Description}}</option>
                                        @elseif($role->RoleID == $users->RoleID)
                                            <option value="{{$users->RoleID}}" selected>{{$users->role->Description}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{Form::hidden('_method', 'PUT')}}
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="card shadow p-4">
                <div class="card-body">
                    <h1>Register</h1>
                    <p class="text-muted">Create a new account</p>
                    <hr class="mb-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-row mb-2">
                            <div class="form-group col-md-5">
                                <label for="first_name">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" placeholder="First Name">
                                
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-2">
                                <label for="middle_init">{{ __('M.I.') }}</label>
                                <input id="middle_init" type="text" class="form-control{{ $errors->has('middle_init') ? ' is-invalid' : '' }}" name="middle_init" value="{{ old('middle_init') }}" required autocomplete="middle_init" placeholder="Middle Initials">
                                
                                @if ($errors->has('middle_init'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('middle_init') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-5">
                                <label for="last_name">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" placeholder="Last Name">
                                
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail Address">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="username">{{ __('Username') }}</label>
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username">

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password" placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group col-md-6">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="RoleID">{{ __('Role') }}</label>
                                <select id="RoleID" class="form-control{{ $errors->has('RoleID') ? ' is-invalid' : '' }}" name="RoleID" required autocomplete="RoleID" autofocus>
                                    @if(count($roles) > 1)
                                        @foreach($roles as $role)
                                            <option value="{{$role->RoleID}}">{{$role->Description}}</option>
                                        @endforeach
                                    @endif
                                </select>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-row mt-5">
                            <div class="form-group col-12 text-center">
                                <button type="submit" class="btn btn-primary">Register</button>
                                <input type="reset" class="btn btn-secondary" value="Clear">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="flex-row d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 pt-5">
                <div class="card-group shadow">
                    <div class="card">
                        <div class="card-body d-flex">
                            <div class="align-self-center text-center">
                                <img src="{{ asset('storage/Icon.png') }}" style="max-width: 85%;">
                            </div>
                        </div>
                    </div>
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>Login</h1>
                            <p class="text-muted">Sign In to your account</p> 
                            <form method="POST" action="{{ route('login') }}" autocomplete="off">
                                @csrf               
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-user" aria-hidden="true"></i></div>
                                    </div>
                                    <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="Username" autofocus>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
            
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-lock" aria-hidden="true"></i></div>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
            
                                <div class="d-flex">
                                    <div class="mr-auto">
                                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                                    </div>
                                    <div>
                                        @if (Route::has('password.request'))
                                            <button class="btn btn-link btn-block" href="{{ route('password.request') }}">Forgot Your Password?</button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

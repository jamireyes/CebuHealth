@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <h3>Dashboard</h3>
        <hr>
    </div>
</div>

@endsection

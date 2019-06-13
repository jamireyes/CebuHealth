@extends('layouts.app')

@section('content')
@include('include.message')
<div class="card">
    <div class="card-header">
        <div class="d-flex">
            <div class="mr-auto p-1"><strong>User Accounts</strong></div>
            <div class="p-1"><a class="btn btn-sm btn-primary" href="{{ route('register') }}">Register</a></div>
            <div class="p-1"><a class="btn btn-sm btn-success" href="{{ route('Account.export') }}" id="ExportAccount">Export</a></div>
        </div>
    </div>
    <div class="card-body">
        @include('Account.dataTable', $users)
    </div>
    {{-- @include('Account.edit')
    @include('Account.delete')
    @include('Account.restore') --}}
</div>
@endsection
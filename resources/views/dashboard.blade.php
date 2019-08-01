@extends('layouts.app')

@section('content')

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <div class="row">
        <div class="col"><h3 class="text-secondary mb-4">Dashboard</h3></div>
    </div>
    <div class="row">
        <div class="container col-lg-4">
            <div class="row"> 
                <div class="col-6">
                    <div class="card shadow mb-4">
                        <div class="row no-gutters p-2">
                            <div class="col-4">
                                <div class="d-flex justify-content-center align-items-center h-100" style="border-right: 1px rgb(211,211,211);">
                                    {{-- <img src="..." class="card-img" alt="..."> --}}
                                    <i class="fa fa-user text-info" style="font-size: 5vh;" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-8 px-2">
                                <div class="d-flex flex-column justify-content-center h-100">
                                    <small class="text-info">Users</small>
                                    <h3 class="text-info m-0">{{$users}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card shadow mb-4">
                        <div class="row no-gutters p-2">
                            <div class="col-4">
                                <div class="d-flex justify-content-center align-items-center h-100" style="border-right: 1px rgb(211,211,211);">
                                    <i class="fa fa-file text-info" style="font-size: 5vh;" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-8 px-2">
                                <div class="d-flex flex-column justify-content-center h-100">
                                    <small class="text-info">Data Entry</small>
                                    <h3 class="text-info m-0">{{$data}}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-secondary">Cluster</h5>
                    <hr>
                    <canvas id="Cluster_Chart"></canvas>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-secondary">District</h5>
                    <hr>
                    <canvas id="District_Chart"></canvas>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow" style="height: 1200px;">
                <div class="card-body">
                    <h5 class="text-secondary">mLGU</h5>
                    <hr>
                    <canvas id="MLGU_Chart" height="310px"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

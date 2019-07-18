@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="row">
            <div class="col"><h3 class="text-secondary mb-4">Dashboard</h3></div>
        </div>
        <div class="row">
            <div class="col-3"></div>
            <div class="col-3"></div>
            <div class="col-3"></div>
            <div class="col-3"></div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="text-secondary">Cluster</h5>
                        <hr>
                        <canvas id="Cluster_Chart"></canvas>
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
            {{-- <div class="col-lg-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="text-secondary">mLGU</h5>
                        <hr>
                        <canvas id="mLGU_Chart"></canvas>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>

@endsection

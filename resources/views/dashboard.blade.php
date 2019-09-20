@extends('layouts.app')

@section('content')

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <div class="row">
        <div class="col"><h3 class="text-secondary"><i class="fas fa-tachometer-alt pr-2"></i> Dashboard</h3></div>
    </div>
    <div class="row">
        <div class="container col-lg-4">
            <div class="row"> 
                <div class="col-6">
                    <div class="card shadow my-4">
                        <div class="row no-gutters p-2">
                            <div class="col-4">
                                <div class="d-flex justify-content-center align-items-center h-100" style="border-right: 1px rgb(211,211,211);">
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
                    <div class="card shadow my-4">
                        <div class="row no-gutters p-2">
                            <div class="col-4">
                                <div class="d-flex justify-content-center align-items-center h-100" style="border-right: 1px rgb(211,211,211);">
                                    <i class="fa fa-file text-info" style="font-size: 5vh;" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="col-8 px-2">
                                <div class="d-flex flex-column justify-content-center h-100">
                                    <small class="text-info">Entries</small>
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
            <div class="card shadow mt-4">
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
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="text-secondary">mLGU</h5>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <canvas id="MLGU_Chart1" height="400px"></canvas>
                        </div>
                        <div class="col-6">
                            <canvas id="MLGU_Chart2" height="400px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            const Border_Colors = [
                'rgba(26, 29, 45, 1)',
                'rgba(93, 39, 93, 1)',
                'rgba(177, 62, 83, 1)',
                'rgba(239, 125, 87, 1)',
                'rgba(255, 205, 117, 1)',
                'rgba(167, 240, 112, 1)',
                'rgba(56, 183, 100, 1)',
                'rgba(37, 113, 121, 1)',
                'rgba(41, 54, 111, 1)',
                'rgba(59, 93, 201, 1)',
                'rgba(65, 166, 246, 1)',
                'rgba(115, 239, 247, 1)',
                'rgba(244, 244, 244, 1)',
                'rgba(148, 176, 194, 1)',
                'rgba(86, 108, 134, 1)',
                'rgba(51, 60, 87, 1)'
            ];

            const Background_Colors = [
                'rgba(26, 29, 45, 0.80)',
                'rgba(93, 39, 93, 0.80)',
                'rgba(177, 62, 83, 0.80)',
                'rgba(239, 125, 87, 0.80)',
                'rgba(255, 205, 117, 0.80)',
                'rgba(167, 240, 112, 0.80)',
                'rgba(56, 183, 100, 0.80)',
                'rgba(37, 113, 121, 0.80)',
                'rgba(41, 54, 111, 0.80)',
                'rgba(59, 93, 201, 0.80)',
                'rgba(65, 166, 246, 0.80)',
                'rgba(115, 239, 247, 0.80)',
                'rgba(244, 244, 244, 0.80)',
                'rgba(148, 176, 194, 0.80)',
                'rgba(86, 108, 134, 0.80)',
                'rgba(51, 60, 87, 0.80)'
            ];

            $.ajax({
                type: 'GET',
                url: "{{ route('ClusterChart') }}",
                success: function(data){
                    var cluster = JSON.parse(data);
                    const ClusterChart = document.getElementById('Cluster_Chart').getContext('2d');
                    var Label = [];
                    var Count = [];

                    for(var x = 0; x < cluster.Cluster_Description.length; x++){
                        Label.push(cluster.Cluster_Description[x].Description);
                        Count.push(cluster.Cluster_Count[x]);
                    }
                    
                    var chart = new Chart(ClusterChart, {
                        type: 'doughnut',
                        data: {
                            labels: Label,
                            datasets: [{
                                label: 'Cluster',
                                backgroundColor: [Background_Colors[9], Background_Colors[10], Background_Colors[11], Background_Colors[12]],
                                borderColor: [Border_Colors[9], Border_Colors[10], Border_Colors[11], Border_Colors[12]],
                                borderWidth: 1.5,
                                data: Count
                            }]
                        },

                        options: {
                            legend: {
                                display: true,
                                position: 'left'
                            },
                            cutoutPercentage: 40
                        }

                    });
                }
            });

            $.ajax({
                type: 'GET',
                url: "{{ route('DistrictChart') }}",
                success: function(data){
                    var district = JSON.parse(data);
                    const DistrictChart = document.getElementById('District_Chart').getContext('2d');
                    var Label = [];
                    var Count = [];

                    for (var x = 0; x < district.District_Description.length; x++) {
                        Label.push(district.District_Description[x].Description);
                        Count.push(district.District_Count[x]);
                    }

                    var chart = new Chart(DistrictChart, {
                        type: 'bar',
                        data: {
                            labels: Label,
                            datasets: [{
                                label: 'District',
                                backgroundColor: Background_Colors,
                                borderColor: Border_Colors,
                                borderWidth: 1.5,
                                data: Count
                            }]
                        },

                        options: {
                            legend: {
                                display: false,
                                position: 'top'
                            },
                            cutoutPercentage: 40,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }

                    });
                }
            });

            $.ajax({
                type: 'GET',
                url: "{{ route('MLGUChart') }}",
                success: function(data){
                    var mlgu = JSON.parse(data);
                    const MLGU_Chart1 = document.getElementById('MLGU_Chart1').getContext('2d');
                    const MLGU_Chart2 = document.getElementById('MLGU_Chart2').getContext('2d');
                    var Label1 = [];
                    var Label2 = [];
                    var Count1 = [];
                    var Count2 = [];
                    
                    for (var x = 0; x < mlgu.MLGU_Description.length; x++) {
                        if (x < 30) {
                            Label1.push(mlgu.MLGU_Description[x].Description);
                            Count1.push(mlgu.MLGU_Count[x]);
                        } else {
                            Label2.push(mlgu.MLGU_Description[x].Description);
                            Count2.push(mlgu.MLGU_Count[x]);
                        }
                    }

                    new Chart(MLGU_Chart1, {
                        type: 'horizontalBar',
                        data: {
                            labels: Label1,
                            datasets: [{
                                label: 'MLGU',
                                backgroundColor: Background_Colors,
                                borderColor: Border_Colors,
                                borderWidth: 1.5,
                                data: Count1
                            }]
                        },

                        options: {
                            legend: {
                                display: false,
                                position: 'top'
                            },
                            cutoutPercentage: 40,
                            scales: {
                                xAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });

                    new Chart(MLGU_Chart2, {
                        type: 'horizontalBar',
                        data: {
                            labels: Label2,
                            datasets: [{
                                label: 'MLGU',
                                backgroundColor: '#0E1F58',
                                data: Count2
                            }]
                        },

                        options: {
                            legend: {
                                display: false,
                                position: 'top'
                            },
                            cutoutPercentage: 40,
                            scales: {
                                xAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection

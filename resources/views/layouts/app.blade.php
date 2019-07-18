<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cebu Health') }}</title>
    
    @toastr_css
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

</head>

<body>
    <div id="app">
        @include('include.navbar')
        <div class="container py-4">
            @yield('content')
        </div>
    </div>

    <script src="{{ mix('js/app.js') }}"></script>
    <script>
        $(document).ready(function(){

            const AccountTable = $('#AccountTable').DataTable({
                "scrollX": true,
                "columnDefs": [
                    {"className": "text-center", "targets": [0]}
                ]
            });

            const DataEntryTable = $('#DataEntryTable').DataTable({
                "scrollX": true,
                "autoWidth": true,
                "columnDefs": [
                    {"className": "text-center", "targets": [0]}
                ]
            });

            AccountTable.on('click', '#EditAccountBtn', function(){
                var user = $(this).data('user');
                var route = "{{route('Account.update', '')}}/"+user.id;
                $('#editForm').attr('action', route);
                $('#first_name').val(user.first_name);
                $('#last_name').val(user.last_name);
                $('#middle_init').val(user.middle_init);
                $('#email').val(user.email);
                $('#username').val(user.username);
                $('#RoleID').val(user.RoleID);
            });

            AccountTable.on('click', '#DeleteAccountBtn', function(){
                var id = $(this).data('id');
                var fullname = $(this).data('first') + " " + $(this).data('middle') + ". " + $(this).data('last');
                var route = "{{ route('Account.destroy', '')}}/"+id;
                $('#deleteForm').attr('action', route);
                $('p').append(" <h3 class='text-center text-muted'>"+fullname+"</h3>");
                $('#DeleteAccount').on('hide.bs.modal', function(){
                    $('h3').remove();
                });
            });

            AccountTable.on('click', '#RestoreAccountBtn', function(){
                var id = $(this).data('id');
                var fullname = $(this).data('first') + " " + $(this).data('middle') + ". " + $(this).data('last');
                var route = "Account/"+id+"/restore";
                $('#restoreForm').attr('action', route);
                $('p').append(" <h3 class='text-center text-muted'>"+fullname+"</h3>");
                $('#RestoreAccount').on('hide.bs.modal', function(){
                    $('h3').remove();
                });
            });

            DataEntryTable.on('click', '#EditEntryBtn', function(){
                var data = $(this).data('data');
                var route = "{{ route('Data.update', '')}}/"+data.Data_ID;
                $('#editEntryForm').attr('action', route);
                $('#ClusterNo').val(data.ClusterNo);
                $('#DistrictNo').val(data.DistrictNo);
                $('#mLGU_No').val(data.mLGU_No);
                $('#BarangayNo').val(data.BarangayNo);
                $('#LName').val(data.LName);
                $('#FName').val(data.FName);
                $('#MI').val(data.MI);
                $('#Birthdate').val(data.Birthdate);
                $('#Gender').val(data.Gender);
                $('#Weight_kg').val(data.Weight_kg);
                $('#Height_cm').val(data.Height_cm);
                $('#BloodTypeID').val(data.BloodTypeID);
                $('#Contact_No').val(data.Contact_No);
                $('#House_No').val(data.House_No);
                $('#Street_Name').val(data.Street_Name);
                $('#Sitio').val(data.Sitio);
                $('#Purok').val(data.Purok);
                $('#Barangay').val(data.Barangay);
            });
            
            DataEntryTable.on('click', '#DeleteEntryBtn', function(){
                var id = $(this).data('id');
                var route = "{{ route('Data.destroy', '')}}/"+id;
                $('#deleteEntryForm').attr('action', route);
            });

            DataEntryTable.on('click', '#RestoreEntryBtn', function(){
                var id = $(this).data('id');
                var route = "Data/"+id+"/restore";
                $('#restoreEntryForm').attr('action', route);
            });
            
            var UserID = [];

            AccountTable.on('search.dt', function(){
                index = AccountTable.rows({ filter : 'applied' }).nodes().length;
                array = AccountTable.rows({ filter : 'applied' }).data();
                for(x = 0; x < index; x++){
                    UserID[x] = parseInt(array[x][1], 10);
                }
                UserID.length = index--;
            });

            $('#ExportSearch').click(function(){
                if(UserID.length > 0){
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('Account.exportSearch') }}",
                        data: { 
                            "_token": "{{ csrf_token() }}",
                            data: UserID
                        },
                        success: function(response){
                            window.location.href = this.url;
                        },
                        error: function(jqXHR, textStatus, errorThrown){
                            alert('ERROR: ' + errorThrown);
                        }
                    });
                }
            });

            var DataID = [];

            DataEntryTable.on('search.dt', function(){
                index = DataEntryTable.rows({ filter : 'applied' }).nodes().length;
                array = DataEntryTable.rows({ filter : 'applied' }).data();
                for(x = 0; x < index; x++){
                    DataID[x] = parseInt(array[x][1]);
                }
                DataID.length = index--;
            });

            $('#ExportSearchEntry').click(function(){
                if(DataID.length > 0){
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('Data.exportSearch') }}",
                        data: { 
                            "_token": "{{ csrf_token() }}",
                            data: DataID
                        },
                        success: function(response){
                            window.location.href = this.url;
                        },
                        error: function(jqXHR, textStatus, errorThrown){
                            alert('ERROR: ' + errorThrown);
                        }
                    });
                }
            });

            const colors = {
                color1: '#1a1c2c',
                color2: '#5d275d',
                color3: '#b13e53',
                color4: '#ef7d57',
                color5: '#ffcd75',
                color6: '#a7f070',
                color7: '#38b764',
                color8: '#257179',
                color9: '#29366f',
                color10: '#3b5dc9',
                color11: '#41a6f6',
                color12: '#73eff7',
                color13: '#f4f4f4',
                color14: '#94b0c2',
                color15: '#566c86',
                color16: '#333c57'
            };
            
            let {color1, color2, color3, color4, color5, color6, color7, color8, color9, color10, color11, color12, color13, color14, color15, color16} = colors;
            
            $.ajax({
                type: 'GET',
                url: "{{ route('ClusterChart') }}",
                success: function(data){
                    var cluster = JSON.parse(data);
                    const ClusterChart = document.getElementById('Cluster_Chart').getContext('2d');
                    var chart = new Chart(ClusterChart, {
                        type: 'doughnut',
                        data: {
                            labels: [cluster.Clusters[0].Description, cluster.Clusters[1].Description, cluster.Clusters[2].Description, cluster.Clusters[3].Description],
                            datasets: [{
                                label: 'Cluster',
                                backgroundColor: [color9, color10, color11, color12],
                                data: [cluster.Cluster1, cluster.Cluster2, cluster.Cluster3, cluster.Cluster4]
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
                    var chart = new Chart(DistrictChart, {
                        type: 'bar',
                        data: {
                            labels: [
                                district.District[0].Description, 
                                district.District[1].Description, 
                                district.District[2].Description, 
                                district.District[3].Description,
                                district.District[4].Description, 
                                district.District[5].Description, 
                                district.District[6].Description, 
                                district.District[7].Description,
                                district.District[8].Description, 
                                district.District[9].Description, 
                                district.District[10].Description, 
                                district.District[11].Description,
                                district.District[12].Description, 
                                district.District[13].Description, 
                                district.District[14].Description, 
                                district.District[15].Description
                                ],
                            datasets: [{
                                label: 'District',
                                backgroundColor: [color1, color2, color3, color4, color5, color6, color7, color8, color9, color10, color11, color12, color13, color14, color15, color16],
                                data: [
                                    district.District1, 
                                    district.District2, 
                                    district.District3, 
                                    district.District4, 
                                    district.District5, 
                                    district.District6, 
                                    district.District7, 
                                    district.District8,
                                    district.District9, 
                                    district.District10, 
                                    district.District11, 
                                    district.District12, 
                                    district.District13, 
                                    district.District14, 
                                    district.District15, 
                                    district.District16
                                    ]
                            }]
                        },

                        options: {
                            legend: {
                                display: false, // true or false
                                position: 'top' // top, bottom, left, or right
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

        });
    </script>
</body>

@toastr_js
@toastr_render
</html>

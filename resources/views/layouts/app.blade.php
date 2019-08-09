<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cebu Health') }}</title>
    
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
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
            
            const ImportTable = $('#ImportTable').DataTable({
                "scrollX": true,
                select: true
            });

            const AccountTable = $('#AccountTable').DataTable({
                "scrollX": true,
                "columnDefs": [
                    {"className": "text-center", "targets": [0]}
                ]
            });

            const TrashAccountTable = $('#TrashAccountTable').DataTable({
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

            $('.modal').on('show.bs.modal', function (e) {
                $('.modal .modal-dialog').attr('class', 'h-100 modal-dialog animated zoomIn fastest');
            });

            $('.modal').on('hide.bs.modal', function (e) {
                $('.modal .modal-dialog').attr('class', 'h-100 modal-dialog animated zoomOut slow');
            });

            $('#EditEntry').on('show.bs.modal', function (e){
                $('#EditEntry .modal-dialog').attr('class', 'modal-dialog modal-lg animated zoomOIn fastest');
            });

            $('#EditEntry').on('hide.bs.modal', function (e){
                $('#EditEntry .modal-dialog').attr('class', 'modal-dialog modal-lg animated zoomOut slow');
            });

            $('#ImportModal').on('show.bs.modal', function (e){
                $('#ImportModal .modal-dialog').attr('class', 'modal-dialog modal-dialog-scrollable modal-xl animated zoomOIn fastest');
            });

            $('#ImportModal').on('hide.bs.modal', function (e){
                $('#ImportModal .modal-dialog').attr('class', 'modal-dialog modal-xl animated zoomOut slow');
            });

            $('#fileImport').on('change',function(e){
                var fileName = e.target.files[0].name;
                $(this).next('.custom-file-label').html(fileName);
            });

            $('#importForm').submit(function(e){
                e.preventDefault();   
                var formData = new FormData(this);

                $.ajax({                                                        
                    type: 'POST',
                    enctype: 'multipart/form-data',
                    url: "{{ route('Data.importExcel') }}",
                    processData: false,
                    contentType: false,
                    data: formData,                                                       
                    success: function(imports){                                
                        var data = JSON.parse(imports);
                        let x;
                        console.log(data);
                        toastr.info('Kindly check the data entry before saving import.', 'Notification!')
                        $('#ImportModal').modal('show');
                        ImportTable.clear();

                        for(x = 0; x < data.imports.length; x++){
                            ImportTable.row.add([
                                data.imports[x].clusterno, 
                                data.imports[x].districtno,
                                data.imports[x].mlgu_no,
                                data.imports[x].barangayno,
                                data.imports[x].lname,
                                data.imports[x].fname,
                                data.imports[x].mi,
                                data.imports[x].birthdate,
                                data.imports[x].gender,
                                data.imports[x].weight_kg,
                                data.imports[x].height_cm,
                                data.imports[x].bloodtypeid,
                                data.imports[x].contact_no,
                                data.imports[x].house_no,
                                data.imports[x].street_name,
                                data.imports[x].sitio,
                                data.imports[x].purok,
                                data.imports[x].barangay
                            ]).draw();
                        };
                        $('#Importbtn').click(function(){
                            //console.log(ImportTable.rows('.selected').data());
                            // data = ImportTable.rows().data();
                            // console.log(data[0]);
                            // newData = JSON.parse(imports);
                            // newData = {
                            //     BarangayNo: 1,
                            //     BloodTypeID: 1,
                            //     ClusterNo: 1,
                            // };
                            // console.log(JSON.stringify(newData));

                            console.log(data.imports[0].birthdate);
                            $.ajax({
                                type: 'POST',
                                url: "{{ route('Data.importExcelToDB') }}",
                                dataType: 'json',
                                data: {
                                    "_token": "{{ csrf_token() }}", 
                                    data: JSON.stringify(newData)
                                },
                                success: function(response){
                                    console.log(response);
                                },
                                error: function(jqXHR, textStatus, errorThrown){           
                                    toastr.error(errorThrown, 'Error!');                   
                                }  
                            });
                        });
                    },                                                          
                    error: function(jqXHR, textStatus, errorThrown){                  
                        toastr.error(errorThrown+' '+textStatus, 'Error!');
                    }                                                           
                });
            });

            $('#ImportTable tbody').on('click', 'tr', function(){
                if($(this).hasClass('selected')){
                    $(this).removeClass('selected');
                }else{
                    $(this).addClass('selected');
                }
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
            
            /******************** Export User Account [Start] ***********************/
            var UserID = [];                                                        //
                                                                                    //
            index = AccountTable.rows().nodes().length;                             //
            array = AccountTable.rows().data();                                     /********************************/
            for(x = 0; x < index; x++){                                             //  Initializes UserID array    //
                UserID[x] = parseInt(array[x][1], 10);                              /********************************/
            }                                                                       //
                                                                                    //
            AccountTable.on('search.dt', function(){                                //
                index = AccountTable.rows({ filter : 'applied' }).nodes().length;   //
                array = AccountTable.rows({ filter : 'applied' }).data();           /****************************************/
                for(x = 0; x < index; x++){                                         //  UserID array updates upon search    //
                    UserID[x] = parseInt(array[x][1], 10);                          /****************************************/
                }                                                                   //
                UserID.length = index--;                                            //
            });                                                                     //
                                                                                    //
            $('#ExportUsers').click(function(){                                          //
                if(UserID.length > 0){                                              //
                    $.ajax({                                                        //
                        type: 'GET',                                                //
                        url: "{{ route('Account.exportAll') }}",                    //
                        data: {                                                     //
                            "_token": "{{ csrf_token() }}",                         /****************************/
                            data: UserID                                            //  Sends UserID array to   //
                        },                                                          //  controller via ajax     //
                        success: function(response){                                /****************************/
                            window.location.href = this.url;                        //
                            toastr.info('Data Exported', 'Notification');           //
                        },                                                          //
                        error: function(jqXHR, textStatus, errorThrown){            //
                            toastr.error(errorThrown, 'Error!');                    //
                        }                                                           //
                    });                                                             //
                }                                                                   //
            });                                                                     //
            /********************** Export User Account [End] ***********************/

            // Export Data Entry [Start]
            var DataID = [];

            index = DataEntryTable.rows().nodes().length;
            array = DataEntryTable.rows().data();
            for(x = 0; x < index; x++){
                DataID[x] = parseInt(array[x][1], 10);
            }

            DataEntryTable.on('search.dt', function(){
                index = DataEntryTable.rows({ filter : 'applied' }).nodes().length;
                array = DataEntryTable.rows({ filter : 'applied' }).data();
                for(x = 0; x < index; x++){
                    DataID[x] = parseInt(array[x][1]);
                }
                DataID.length = index--;
            });

            $('#ExportData').click(function(){
                console.log(DataID);
                if(DataID.length > 0){
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('Data.exportAll') }}",
                        data: { 
                            "_token": "{{ csrf_token() }}",
                            data: DataID
                        },
                        success: function(response){
                            window.location.href = this.url;
                            toastr.info('Data Exported', 'Notification');
                        },
                        error: function(jqXHR, textStatus, errorThrown){
                            toastr.error(errorThrown, 'Error!');
                        }
                    });
                }
            });
            // Export Data Entry [End]

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
                            labels: [
                                cluster.Clusters[0].Description, 
                                cluster.Clusters[1].Description, 
                                cluster.Clusters[2].Description, 
                                cluster.Clusters[3].Description
                                ],
                            datasets: [{
                                label: 'Cluster',
                                backgroundColor: [color9, color10, color11, color12],
                                data: [
                                    cluster.Cluster1, 
                                    cluster.Cluster2, 
                                    cluster.Cluster3, 
                                    cluster.Cluster4
                                    ]
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

            $.ajax({
                type: 'GET',
                url: "{{ route('MLGUChart') }}",
                success: function(data){
                    var mlgu = JSON.parse(data);
                    const MLGU_Chart = document.getElementById('MLGU_Chart').getContext('2d');
                    var chart = new Chart(MLGU_Chart, {
                        type: 'horizontalBar',
                        data: {
                            labels: [
                                mlgu.MLGUs[0].Description,
                                mlgu.MLGUs[1].Description,
                                mlgu.MLGUs[2].Description,
                                mlgu.MLGUs[3].Description,
                                mlgu.MLGUs[4].Description,
                                mlgu.MLGUs[5].Description,
                                mlgu.MLGUs[6].Description,
                                mlgu.MLGUs[7].Description,
                                mlgu.MLGUs[8].Description,
                                mlgu.MLGUs[9].Description,
                                mlgu.MLGUs[10].Description,
                                mlgu.MLGUs[11].Description,
                                mlgu.MLGUs[12].Description,
                                mlgu.MLGUs[13].Description,
                                mlgu.MLGUs[14].Description,
                                mlgu.MLGUs[15].Description,
                                mlgu.MLGUs[16].Description,
                                mlgu.MLGUs[17].Description,
                                mlgu.MLGUs[18].Description,
                                mlgu.MLGUs[19].Description,
                                mlgu.MLGUs[20].Description,
                                mlgu.MLGUs[21].Description,
                                mlgu.MLGUs[22].Description,
                                mlgu.MLGUs[23].Description,
                                mlgu.MLGUs[24].Description,
                                mlgu.MLGUs[25].Description,
                                mlgu.MLGUs[26].Description,
                                mlgu.MLGUs[27].Description,
                                mlgu.MLGUs[28].Description,
                                mlgu.MLGUs[29].Description,
                                mlgu.MLGUs[30].Description,
                                mlgu.MLGUs[31].Description,
                                mlgu.MLGUs[32].Description,
                                mlgu.MLGUs[33].Description,
                                mlgu.MLGUs[34].Description,
                                mlgu.MLGUs[35].Description,
                                mlgu.MLGUs[36].Description,
                                mlgu.MLGUs[37].Description,
                                mlgu.MLGUs[38].Description,
                                mlgu.MLGUs[39].Description,
                                mlgu.MLGUs[40].Description,
                                mlgu.MLGUs[41].Description,
                                mlgu.MLGUs[42].Description,
                                mlgu.MLGUs[43].Description,
                                mlgu.MLGUs[44].Description,
                                mlgu.MLGUs[45].Description,
                                mlgu.MLGUs[46].Description,
                                mlgu.MLGUs[47].Description,
                                mlgu.MLGUs[48].Description,
                                mlgu.MLGUs[49].Description,
                                mlgu.MLGUs[50].Description,
                                mlgu.MLGUs[51].Description,
                                mlgu.MLGUs[52].Description,
                                mlgu.MLGUs[53].Description,
                                mlgu.MLGUs[54].Description,
                                mlgu.MLGUs[55].Description,
                                mlgu.MLGUs[56].Description,
                                mlgu.MLGUs[57].Description,
                                mlgu.MLGUs[58].Description,
                                mlgu.MLGUs[59].Description
                                ],
                            datasets: [{
                                label: 'MLGU',
                                backgroundColor: '#0E1F58',
                                data: [
                                    mlgu.MLGU1,
                                    mlgu.MLGU2,
                                    mlgu.MLGU3,
                                    mlgu.MLGU4,
                                    mlgu.MLGU5,
                                    mlgu.MLGU6,
                                    mlgu.MLGU7,
                                    mlgu.MLGU8,
                                    mlgu.MLGU9,
                                    mlgu.MLGU10,
                                    mlgu.MLGU11,
                                    mlgu.MLGU12,
                                    mlgu.MLGU13,
                                    mlgu.MLGU14,
                                    mlgu.MLGU15,
                                    mlgu.MLGU16,
                                    mlgu.MLGU17,
                                    mlgu.MLGU18,
                                    mlgu.MLGU19,
                                    mlgu.MLGU20,
                                    mlgu.MLGU21,
                                    mlgu.MLGU22,
                                    mlgu.MLGU23,
                                    mlgu.MLGU24,
                                    mlgu.MLGU25,
                                    mlgu.MLGU26,
                                    mlgu.MLGU27,
                                    mlgu.MLGU28,
                                    mlgu.MLGU29,
                                    mlgu.MLGU30,
                                    mlgu.MLGU31,
                                    mlgu.MLGU32,
                                    mlgu.MLGU33,
                                    mlgu.MLGU34,
                                    mlgu.MLGU35,
                                    mlgu.MLGU36,
                                    mlgu.MLGU37,
                                    mlgu.MLGU38,
                                    mlgu.MLGU39,
                                    mlgu.MLGU40,
                                    mlgu.MLGU41,
                                    mlgu.MLGU42,
                                    mlgu.MLGU43,
                                    mlgu.MLGU44,
                                    mlgu.MLGU45,
                                    mlgu.MLGU46,
                                    mlgu.MLGU47,
                                    mlgu.MLGU48,
                                    mlgu.MLGU49,
                                    mlgu.MLGU50,
                                    mlgu.MLGU51,
                                    mlgu.MLGU52,
                                    mlgu.MLGU53,
                                    mlgu.MLGU54,
                                    mlgu.MLGU55,
                                    mlgu.MLGU56,
                                    mlgu.MLGU57,
                                    mlgu.MLGU58,
                                    mlgu.MLGU59,
                                    mlgu.MLGU60
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
{{-- @toastr_js --}}
@toastr_render
</html>

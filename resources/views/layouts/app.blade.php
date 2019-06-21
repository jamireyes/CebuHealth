<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cebu Health') }}</title>
    
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
</body>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="{{ mix('js/app.js') }}" defer></script>
<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var AccountTable = $('#AccountTable').DataTable({
            "scrollX": true,
            "columnDefs": [
                {"className": "text-center", "targets": [0]}
            ]
        });
        var DataEntryTable = $('#DataEntryTable').DataTable({
            "scrollX": true,
            "autoWidth": true,
            "columnDefs": [
                {"className": "text-center", "targets": [0]}
            ]
        });
        
        DataEntryTable.columns.adjust().draw();

        // Account Buttons
        AccountTable.on('click', '#EditAccountBtn', function(){
            var user = $(this).data('user');
            var route = "{{route('Account.update', '')}}/"+user.id;
            console.log(route);
            $('#editForm').attr('action', route);
            $('#email').val(user.email);
            $('#username').val(user.username);
            $('#RoleID').val(user.RoleID);
        });
        AccountTable.on('click', '#DeleteAccountBtn', function(){
            var id = $(this).data('id');
            var username = $(this).data('username');
            var route = "{{ route('Account.destroy', '')}}/"+id;
            $('#deleteForm').attr('action', route);
            $('p').append(" <h3 class='text-center'><strong>"+username+"</strong></h3>");
            $('#DeleteAccount').on('hide.bs.modal', function(){
                $('strong').remove();
            });
        });
        AccountTable.on('click', '#RestoreAccountBtn', function(){
            var id = $(this).data('id');
            var username = $(this).data('username');
            var route = "Account/"+id+"/restore";
            $('#restoreForm').attr('action', route);
            $('p').append(" <h3 class='text-center'><strong>"+username+"</strong></h3>");
            $('#RestoreAccount').on('hide.bs.modal', function(){
                $('strong').remove();
            });
        });

        // Data Entry Buttons
        DataEntryTable.on('click', '#EditEntryBtn', function(){
            var data = $(this).data('data');
            console.log(data);
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
            console.log('Searched: ' + UserID);
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
            console.log(DataID);

        });

        $('#ExportSearchEntry').click(function(){
            console.log('Searched: ' + DataID);
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

    });
</script>
</html>

@extends('layouts.app')

@section('content')

{{-- @include('include.message') --}}
    <div class="d-flex mb-3">
        <div class="mr-auto p-1"><h3 class="text-secondary"><i class="fa fa-file pr-2" aria-hidden="true"></i> Data Entry</h3></div>
        <div class="p-1">
            <a href="{{ route('Data.create') }}" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add Entry</a>
        </div>
        <div class="p-1">
            <button id="ExportData" class="btn btn-secondary" href="{{ route('Data.exportAll') }}"><i class="fa fa-download" aria-hidden="true"></i> Export</button>
        </div>
        <div class="p-1">
            <form id="importForm" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group">
                    <div class="input-group-prepend">
                        <button id="ImportSubmit" type="submit" class="btn btn-secondary"><i class="fas fa-upload"></i> Import</button>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file" id="fileImport">
                        <label class="custom-file-label" for="fileImport">Choose file</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow">
        @if(!$datas->isEmpty())
            <div class="card-body">
                <table id="DataEntryTable" class="table table-striped display compact nowrap w-100" style="font-size: 12px;">
                    <thead>
                        <tr>
                            @if(Auth::user()->RoleID == 1)
                                <th>Status</th>
                                <th>Data ID</th>
                                <th>User ID</th>
                            @else
                                <th>No.</th>
                            @endif
                            <th>Cluster</th>
                            <th>District</th>
                            <th>mLGU</th>
                            <th>Barangay</th>
                            <th>Full Name</th>
                            <th>Birthday</th>
                            <th>Gender</th>
                            <th>Weight</th>
                            <th>Height</th>
                            <th>Blood Type</th>
                            <th>Contact No</th>
                            <th>House</th>
                            <th>Street</th>
                            <th>Sitio</th>
                            <th>Purok</th>
                            <th>Barangay</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                @if(Auth::user()->RoleID == 1)
                                    <td>
                                        @if($data->deleted_at == NULL)
                                            <i class="fas fa-circle success"></i>
                                        @else
                                            <i class="fas fa-circle danger"></i>
                                        @endif
                                    </td>
                                    <td>{{$data->Data_ID}}</td>
                                    <td>{{$data->User_ID}}</td>
                                @else
                                    <td>{{$loop->iteration}}</td>
                                @endif
                                <td>{{$data->cluster->Description}}</td>
                                <td>{{$data->district->Description}}</td>
                                <td>{{$data->mlgu->Description}}</td>
                                <td>{{$data->barangay->Description}}</td>
                                <td>{{$data->FName.' '.$data->MI.'. '.$data->LName}}</td>
                                <td>{{$data->Birthdate}}</td>
                                <td>{{($data->Gender == 1) ? 'Male' : 'Female'}}</td>
                                <td>{{$data->Weight_kg}} kg</td>
                                <td>{{$data->Height_cm}} cm</td>
                                <td>{{$data->bloodtype->Description}}</td>
                                <td>{{$data->Contact_No}}</td>
                                <td>{{$data->House_No}}</td>
                                <td>{{$data->Street_Name}}</td>
                                <td>{{$data->Sitio}}</td>
                                <td>{{$data->Purok}}</td>
                                <td>{{$data->Barangay}}</td>
                                <td>{{$data->created_at}}</td>
                                <td>{{$data->updated_at}}</td>
                                <td>
                                    <a id="EditEntryBtn" href="#" data-toggle="modal" data-backdrop="static" data-target="#EditEntry" data-data="{{$data}}"><i class="fas fa-edit warning" data-toggle="tooltip" title="Edit"></i></a>
                                    @if($data->deleted_at == NULL)
                                        <a id="DeleteEntryBtn" href="#" data-toggle="modal" data-target="#DeleteEntry" data-id="{{$data->Data_ID}}"><i class="fas fa-trash-alt danger" data-toggle="tooltip" title="Delete"></i></a>
                                    @else
                                        <a id="RestoreEntryBtn" href="#" data-toggle="modal" data-target="#RestoreEntry" data-id="{{$data->Data_ID}}"><i class="fas fa-trash-restore primary" data-toggle="tooltip" title="Restore"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h4 class="text-center py-5" style="color:grey"><i class="fas fa-exclamation-triangle"></i> No data found</h4>
        @endif
    </div>
    @include('Data.ViewImport')
    @if(!$datas->isEmpty())
        @include('Data.edit')
        @include('Data.delete')
        @include('Data.restore')
    @endif
@endsection

@section('scripts')
<script>
        $(document).ready(function(){
            
            const ImportTable = $('#ImportTable').DataTable({
                "scrollX": true,
                select: true
            });

            const DataEntryTable = $('#DataEntryTable').DataTable({
                "scrollX": true,
                "autoWidth": true,
                "columnDefs": [
                    {"className": "text-center", "targets": [0]}
                ]
            });

            $('#fileImport').on('change',function(e){
                var fileName = e.target.files[0].name;
                $(this).next('.custom-file-label').html(fileName);
            });

            function getJsDateFromExcel(excelDate) {
                var date = new Date((excelDate - (25567 + 2))*86400*1000);
                
                var month = (1 + date.getMonth()).toString();
                month = month.length > 1 ? month : '0' + month;

                var day = date.getDate().toString();
                day = day.length > 1 ? day : '0' + day;

                return (date.getFullYear()+'-'+month+'-'+day);
            }

            let arr = [];

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

                        toastr.info('Kindly check the data entry before saving import.', 'Notification!')
                        $('#ImportModal').modal('show');
                        ImportTable.clear();

                        for(x = 0; x < data.imports.length; x++){
                            var newData = {};
                            ImportTable.row.add([
                                newData.ClusterNo = data.imports[x].clusterno, 
                                newData.DistrictNo = data.imports[x].districtno,
                                newData.mLGU_No = data.imports[x].mlgu_no,
                                newData.BarangayNo = data.imports[x].barangayno,
                                newData.LName = data.imports[x].lname.toUpperCase(),
                                newData.FName = data.imports[x].fname.toUpperCase(),
                                newData.MI = data.imports[x].mi.toUpperCase(),
                                newData.Birthdate = getJsDateFromExcel(data.imports[x].birthdate),
                                newData.Gender = data.imports[x].gender,
                                newData.Weight_kg = data.imports[x].weight_kg,
                                newData.Height_cm = data.imports[x].height_cm,
                                newData.BloodTypeID = data.imports[x].bloodtypeid,
                                newData.Contact_No = data.imports[x].contact_no,
                                newData.House_No = data.imports[x].house_no,
                                newData.Street_Name = data.imports[x].street_name.toUpperCase(),
                                newData.Sitio = data.imports[x].sitio.toUpperCase(),
                                newData.Purok = data.imports[x].purok.toUpperCase(),
                                newData.Barangay = data.imports[x].barangay.toUpperCase()
                            ]).draw();
                            arr.push(newData);
                        }
                    },                                                          
                    error: function(jqXHR, textStatus, errorThrown){                  
                        toastr.error(errorThrown+' '+textStatus, 'Error!');
                    }                                                           
                });
            });

            $('#Importbtn').click(function(){
                $.ajax({
                    type: 'POST',
                    url: "{{ route('Data.importExcelToDB') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        data: JSON.stringify(arr)
                    },
                    success: function(response){
                        window.location.href = '/Data';
                        toastr.success('File imported successfully', 'Successful!');
                    },
                    error: function(jqXHR, textStatus, errorThrown){           
                        toastr.error(errorThrown, 'Error!');                   
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

        });
    </script>
@endsection
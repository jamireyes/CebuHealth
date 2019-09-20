@extends('layouts.app')

@section('content')
{{-- @include('include.message') --}}
<div class="d-flex mb-3">
    <div class="mr-auto p-1"><h3 class="text-secondary"><i class="fa fa-user pr-2" aria-hidden="true"></i> User Accounts</h3></div>
    <div class="p-1"><a class="btn btn-primary" href="{{ url('/register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a></div>
    <div class="p-1"><button id="ExportUsers" class="btn btn-secondary" href="{{ route('Account.exportAll') }}"><i class="fa fa-download" aria-hidden="true"></i> Export</button></div>
</div>
<div class="card shadow">
    <div class="card-body">
        <table id="AccountTable" class="table table-striped display compact nowrap w-100" style="font-size: 12px;">
            <thead>
                <tr>
                    <th>Status</th>
                    <th>User ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Created At</th>
                    <th>Update At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            @if($user->deleted_at == NULL)
                                <i class="fas fa-circle success"></i>
                            @else
                                <i class="fas fa-circle danger"></i>
                            @endif
                        </td>
                        <td>{{$user->id}}</td>
                        <td>{{$user->first_name}} {{$user->middle_init}}. {{$user->last_name}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->Description}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>
                            <a id="EditAccountBtn" href="#" data-toggle="modal" data-backdrop="static" data-target="#EditAccount" data-user="{{$user}}"><i class="fas fa-edit warning" data-toggle="tooltip" title="Edit"></i></a>
                            @if($user->id != Auth::id() || $user->RoleID != 1)
                                @if($user->deleted_at == NULL)
                                    <a id="DeleteAccountBtn" href="#" data-toggle="modal" data-target="#DeleteAccount" data-id="{{$user->id}}" data-first="{{$user->first_name}}" data-last="{{$user->last_name}}" data-middle="{{$user->middle_init}}"><i class="fas fa-trash-alt danger" data-toggle="tooltip" title="Delete"></i></a>
                                @else
                                    <a id="RestoreAccountBtn" href="#" data-toggle="modal" data-target="#RestoreAccount" data-id="{{$user->id}}" data-first="{{$user->first_name}}" data-last="{{$user->last_name}}" data-middle="{{$user->middle_init}}"><i class="fas fa-trash-restore primary" data-toggle="tooltip" title="Restore"></i></a>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('Account.edit')
    @include('Account.delete')
    @include('Account.restore')
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            
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

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
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
            
        });
    </script>
@endsection
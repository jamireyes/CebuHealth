<table id="AccountTable" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <th>Status</th>
            <th>User ID</th>
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
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role->Description}}</td>
                <td>{{$user->created_at}}</td>
                <td>{{$user->updated_at}}</td>
                <td>
                    <a id="EditAccountBtn_{{$user->id}}" href="#" data-toggle="modal" data-target="#EditAccount" data-user="{{$user}}"><i class="fas fa-edit warning" data-toggle="tooltip" title="Edit"></i></a>
                    @if($user->deleted_at == NULL)
                        <a id="DeleteAccountBtn_{{$user->id}}" href="#" data-toggle="modal" data-target="#DeleteAccount" data-id="{{$user->id}}" data-username="{{$user->username}}"><i class="fas fa-trash-alt danger" data-toggle="tooltip" title="Delete"></i></a>
                    @else
                        <a id="RestoreAccountBtn_{{$user->id}}" href="#" data-toggle="modal" data-target="#RestoreAccount" data-id="{{$user->id}}" data-username="{{$user->username}}"><i class="fas fa-trash-restore primary" data-toggle="tooltip" title="Restore"></i></a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
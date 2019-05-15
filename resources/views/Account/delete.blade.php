<div class="modal fade" id="DeleteAccount" tabindex="-1" role="dialog" aria-labelledby="DeleteAccountLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="DeleteAccountLabel">Confirm Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete <strong>User: {{$user->id}}</strong>?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
            {!!Form::open(['action' => ['AccountController@destroy', $user->id], 'method' => 'POST'])!!}
                @csrf
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Confirm', ['class' => 'btn btn-sm btn-danger'])}}
            {!!Form::close()!!}
        </div>
        </div>
    </div>
</div>
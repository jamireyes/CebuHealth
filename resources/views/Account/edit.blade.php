<div class="modal fade" id="EditAccount" tabindex="-1" role="dialog" aria-labelledby="EditAccountLabel" aria-hidden="true">
    <div class="modal-dialog animated zoomIn fastest" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditAccountLabel">Edit Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                <div class="modal-body">

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{$user->first_name}}" required autocomplete="first_name" placeholder="First Name">
                                
                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="middle_init" class="col-md-4 col-form-label text-md-right">{{ __('M.I.') }}</label>
                            <div class="col-md-6">
                                <input id="middle_init" type="text" class="form-control{{ $errors->has('middle_init') ? ' is-invalid' : '' }}" name="middle_init" value="{{$user->middle_init}}" required autocomplete="middle_init" placeholder="Middle Initials">
                                
                                @if ($errors->has('middle_init'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('middle_init') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{$user->last_name}}" required autocomplete="last_name" placeholder="Last Name">
                                
                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <div class="form-group row">
                        <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                        <div class="col-md-6">
                            <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{$user->username}}" required autocomplete="username">

                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$user->email}}" required autocomplete="email">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="RoleID" class="col-md-4 col-form-label text-md-right">Role</label>

                        <div class="col-md-6">
                            <select id="RoleID" class="form-control{{ $errors->has('RoleID') ? ' is-invalid' : '' }}" name="RoleID" required autocomplete="RoleID" autofocus>
                                @foreach($roles as $role)
                                    @if($role->RoleID != $user->RoleID)
                                        <option value="{{$role->RoleID}}">{{$role->Description}}</option>
                                    @elseif($role->RoleID == $user->RoleID)
                                        <option value="{{$user->RoleID}}" selected>{{$user->role->Description}}</option>
                                    @endif
                                @endforeach
                            </select>

                            @if ($errors->has('RoleID'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('RoleID') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            {{Form::hidden('_method', 'PUT')}}
            </form>
        </div>
    </div>
</div>
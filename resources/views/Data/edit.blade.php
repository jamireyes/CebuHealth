<div class="modal fade" id="EditEntry" tabindex="-1" role="dialog" aria-labelledby="EditEntryLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Entry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @include('include.message')
            <form id="editEntryForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="ClusterNo">Cluster</label>
                            <select id="ClusterNo" name="ClusterNo" class="form-control">
                                @foreach ($clusters as $cluster)
                                    @if($cluster->ClusterNo != $data->ClusterNo)
                                        <option value="{{$cluster->ClusterNo}}">{{$cluster->Description}}</option>
                                    @elseif($cluster->ClusterNo == $data->ClusterNo)
                                        <option value="{{$data->ClusterNo}}" selected>{{$data->cluster->Description}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="DistrictNo">District</label>
                            <select id="DistrictNo" name="DistrictNo" class="form-control">
                                @foreach ($districts as $district)
                                    @if($district->DistrictNo != $data->DistrictNo)
                                        <option value="{{$district->DistrictNo}}">{{$district->Description}}</option>
                                    @elseif($district->DistrictNo == $data->DistrictNo)
                                        <option value="{{$data->DistrictNo}}" selected>{{$data->district->Description}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="mLGU_No">MLGU</label>
                            <select id="mLGU_No" name="mLGU_No" class="form-control">
                                @foreach ($mlgus as $mlgu)
                                    @if($mlgu->mLGU_No != $data->mLGU_No)
                                        <option value="{{$mlgu->mLGU_No}}">{{$mlgu->Description}}</option>
                                    @elseif($mlgu->mLGU_No == $data->mLGU_No)
                                        <option value="{{$data->mLGU_No}}" selected>{{$data->mlgu->Description}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="BarangayNo">Barangay</label>
                            <select id="BarangayNo" name="BarangayNo" class="form-control">
                                @foreach ($barangays as $barangay)
                                    @if($barangay->BarangayNo != $data->BarangayNo)
                                        <option value="{{$barangay->BarangayNo}}">{{$barangay->Description}}</option>
                                    @elseif($barangay->BarangayNo == $data->BarangayNo)
                                        <option value="{{$data->BarangayNo}}" selected>{{$data->barangay->Description}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-5">
                            <label for="LName">Last Name</label>
                            <input type="text" id="LName" name="LName" value="{{$data->LName}}" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group col-sm-5">
                            <label for="FName">First Name</label>
                            <input type="text" id="FName" name="FName" value="{{$data->FName}}" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="MI">M.I.</label>
                            <input type="text" id="MI" name="MI" value="{{$data->MI}}" class="form-control" placeholder="M.I.">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="Birthdate">Birthdate</label>
                            <input type="date" id="Birthdate" name="Birthdate" value="{{$data->Birthdate}}" class="form-control" placeholder="Birthdate">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="Gender">Gender</label>
                            <select id="Gender" name="Gender" class="form-control">
                                @if($data->Gender == 1)
                                    <option value="1" selected>Male</option>
                                    <option value="0">Female</option>
                                @elseif($data->Gender == 0)
                                    <option value="1">Male</option>
                                    <option value="0" selected>Female</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label for="Weight_kg" class="">Weight</label>
                            <input type="text" id="Weight_kg" name="Weight_kg" value="{{$data->Weight_kg}}" class="form-control" placeholder="Weight (kg)">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="Height_cm" class="">Height</label>
                            <input type="text" id="Height_cm" name="Height_cm" value="{{$data->Height_cm}}" class="form-control" placeholder="Height (cm)">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="BloodTypeID" class="">Blood Type</label>
                            <select id="BloodTypeID" name="BloodTypeID" class="form-control">
                                @foreach ($bloodtypes as $bloodtype)
                                    @if($bloodtype->BloodTypeID != $data->BloodTypeID)
                                        <option value="{{$bloodtype->BloodTypeID}}">{{$bloodtype->Description}}</option>
                                    @elseif($bloodtype->BloodTypeID == $data->BloodTypeID)
                                        <option value="{{$data->BloodTypeID}}" selected>{{$data->bloodtype->Description}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Contact_No" class="">Contact No.</label>
                        <input type="text" id="Contact_No" name="Contact_No" value="{{$data->Contact_No}}" class="form-control" placeholder="Contact No.">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="House_No" class="">House No.</label>
                            <input type="text" id="House_No" name="House_No" value="{{$data->House_No}}" class="form-control" placeholder="House No.">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="Street_Name" class="">Street</label>
                            <input type="text" id="Street_Name" name="Street_Name" value="{{$data->Street_Name}}" class="form-control" placeholder="Street Name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-6">
                            <label for="Sitio" class="">Sitio</label>
                            <input type="text" id="Sitio" name="Sitio" value="{{$data->Sitio}}" class="form-control" placeholder="Sitio">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="Purok" class="">Purok</label>
                            <input type="text" id="Purok" name="Purok" value="{{$data->Purok}}" class="form-control" placeholder="Purok">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Barangay" class="">Barangay</label>
                        <input type="text" id="Barangay" name="Barangay" value="{{$data->Barangay}}" class="form-control" placeholder="Barangay">
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

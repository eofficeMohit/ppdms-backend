<link href="{{ asset('assets') }}/css/custom.css" rel="stylesheet" />
<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="election-info"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Election Management"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Election Management</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <h3>Create New E-Info</h3>
                                    <div class="col-12 text-end">
                                        <a class="btn btn-primary" href="{{ route('election-info') }}"> Back</a>
                                    </div>
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                            @endif
                            {!! Form::open(array('route' => 'election-info.store','method'=>'POST','id'=>'elecInfoForm')) !!}
                            <div class="row">

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>State:</strong>
                                        <select class="form-control" id="state_id" name="state_id">
                                            <option value="">Select State</option>
                                            @foreach($states as $key => $value)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('state_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>District:</strong>
                                        <select class="form-control" id="district_id" name="district_id">
                                            <option value="">Select District</option>
                                        </select>
                                        @error('district_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Assembly:</strong>
                                        <select class="form-control" id="assemble_id" name="assemble_id">
                                            <option value="">Select Assembly</option>
                                        </select>
                                        @error('assemble_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>SO Officer:</strong>
                                        <select class="form-control" id="so_user_id" name="so_user_id">
                                            <option value="">Select SO Officer</option>
                                        </select>
                                        @error('so_user_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Booth:</strong>
                                        <select class="form-control" id="booth_id" name="booth_id">
                                            <option value="">Select Booth</option>
                                        </select>
                                        @error('booth_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div id="add-fields">
                                    </div>
                                </div>
                                <div class="clearfix">
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 mt-2">
                                    <a href="" class="btn btn-primary">Reset</a>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
        <div class="modal" tabindex="-1" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Mock Poll</h5>
                    </div>
                    <div class="modal-body">
                        <div class="error" id="err_pop"></div>
                        <div class="form-group">
                            <label>Mock Poll Status:-</label><br>
                            <input type="radio" id="mock_poll_status_yes" name="mock_poll_status" value="1">
                            <label for="mock_poll_status_yes">Yes</label><br>
                            <input type="radio" id="mock_poll_status_no" name="mock_poll_status" value="0">
                            <label for="mock_poll_status_no">No</label><br>
                        </div>
                        <div class="form-group">
                            <label>EVM Cleared Status:-</label><br>
                            <input type="radio" id="evm_cleared_status_yes" name="evm_cleared_status" value="1">
                            <label for="evm_cleared_status_yes">Yes</label><br>
                            <input type="radio" id="evm_cleared_status_no" name="evm_cleared_status" value="0">
                            <label for="evm_cleared_status_no">No</label><br>
                        </div>
                        <div class="form-group">
                            <label>VVPAT Cleared Status:-</label><br>
                            <input type="radio" id="vvpat_cleared_status_status_yes" name="vvpat_cleared_status" value="1">
                            <label for="vvpat_cleared_status_yes">Yes</label><br>
                            <input type="radio" id="vvpat_cleared_status_no" name="vvpat_cleared_status" value="0">
                            <label for="vvpat_cleared_status_no">No</label><br>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="close_modal()">Close</button>
                        <button type="button" class="btn btn-primary" onclick="submit_mockpoll_status()">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal" tabindex="-1" id="myModalVoting">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Voting</h5>
                    </div>
                    <div class="modal-body">
                        <div class="error" id="err_pop"></div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label><b>Voting:</b></label><br>
                                <input class="form-control" type="number" id="voting" name="voting" value="">
                                <div id="voting_error" class="error"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" onclick="close_voting_modal()">Close</button>
                        <button type="button" class="btn btn-primary" onclick="submit_voting()">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" tabindex="-1" id="myModalPollInterrupted">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Poll Interrupted</h5>
                    </div>
                    <div class="modal-body">
                        @php($types = getInterruptionTypes() )
                        @if(count($types) > 0)
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label><b>Interruption Type:</b></label><br>
                                @foreach($types as $key => $val)
                                <input type="radio" id="interruption_type" name="interruption_type" value="{{ $val->id }}">
                                <label for="interruption_type">{{ $val->name }}</label>
                                @endforeach
                                <div id="inter_type_error" class="error"></div>
                            </div>
                        </div>
                        @endif
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label><b>Stop Time:</b></label><br>
                                <input class="form-control" type="time" id="stop_time" name="stop_time" value="">
                                <div id="stop_time_error" class="error"></div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label><b>Resume Time:</b></label><br>
                                <input class="form-control" type="time" id="resume_time" name="resume_time" value="">
                                <div id="resume_time_error" class="error"></div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <label><b>Remarks:</b></label><br>
                                <textarea class="form-control" name="remarks" id="remarks">Enter Remarks Here</textarea>
                                <div id="remark_error" class="error"></div>
                            </div>
                        </div>
                        <div id="evm_fault_fields" style="display:none;">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label><b>Old CU:</b></label><br>
                                    <input class="form-control" type="text" id="old_cu" name="old_cu" value="">
                                    <div id="old_cu_error" class="error"></div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label><b>Old BU:</b></label><br>
                                    <input class="form-control" type="text" id="old_bu" name="old_bu" value="">
                                    <div id="old_bu_error" class="error"></div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label><b>New CU:</b></label><br>
                                    <input class="form-control" type="text" id="new_cu" name="new_cu" value="">
                                    <div id="new_cu_error" class="error"></div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <label><b>New BU:</b></label><br>
                                    <input class="form-control" type="text" id="new_bu" name="new_bu" value="">
                                    <div id="new_bu_error" class="error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="close_poll_interrupted_modal()">Close</button>
                            <button type="button" class="btn btn-primary" onclick="submit_poll_interrupted()">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <x-plugins></x-plugins>
</x-layout>
<script>
    //election info
    document.getElementById('state_id').addEventListener('change', function() {

        var selectedOption = this.value;
        jQuery('#district_id').find('option').not(':first').remove();
        // Make an AJAX request
        axios.get("/assemblies/getStates", {
                params: {
                    selectedOption: selectedOption
                }
            }).then(function(response) {
                console.log(response.data);
                // Iterate through the response and append data to the container
                response.data.forEach(function(value) {
                    jQuery('#district_id').append(jQuery('<option>').val(value.id).text(value.name))
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    });
    document.getElementById('district_id').addEventListener('change', function() {
        var selectedOption = this.value;
        jQuery('#assemble_id').find('option').not(':first').remove();
        // Make an AJAX request
        axios.get("/assemblies/getAssemblies", {
                params: {
                    selectedOption: selectedOption
                }
            }).then(function(response) {
                console.log(response.data);
                // Iterate through the response and append data to the container
                response.data.forEach(function(value) {
                    jQuery('#assemble_id').append(jQuery('<option>').val(value.id).text(value.asmb_name))
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    });
    document.getElementById('assemble_id').addEventListener('change', function() {
        var selectedOption = this.value;
        jQuery('#so_user_id').find('option').not(':first').remove();
        axios.get('/booths/getSoUsers', {
                params: {
                    selectedOption: selectedOption
                }
            })
            .then(function(response) {
                console.log(response);
                var so_users = response.data.so_users;
                // Iterate through the response and append data to the container
                so_users.forEach(function(value) {
                    jQuery('#so_user_id').append(jQuery('<option>').val(value.id).text(value.name))
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    });

    document.getElementById('so_user_id').addEventListener('change', function() {
        var selected_user = this.value;
        var selected_assemble = $('#assemble_id :selected').val();
        jQuery('#booth_id').find('option').not(':first').remove();
        // Make an AJAX request
        axios.get("/assemblies/getBooths", {
                params: {
                    selected_assemble: selected_assemble
                    , selected_user: selected_user
                }
            }).then(function(response) {
                console.log(response.data);
                // Iterate through the response and append data to the container
                response.data.forEach(function(value) {
                    jQuery('#booth_id').append(jQuery('<option>').val(value.id).text(value.booth_name))
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    });
    document.getElementById('booth_id').addEventListener('change', function() {
        var selected_booth = this.value;
        var selected_assemble = $('#assemble_id :selected').val();
        var selected_user = $('#so_user_id :selected').val();
        // Make an AJAX request
        axios.get("/event/getEventsForEInfo", {
                params: {
                    selected_assemble: selected_assemble
                    , selected_user: selected_user
                    , selected_booth: selected_booth
                }
            })
            .then(function(response) {
                console.log(response.data);
                jQuery('#add-fields').empty();
                // Iterate through the response and append data to the container
                response.data.forEach(function(value) {
                    var checked = "";
                    var disabled = "";
                    var present_id = value.id;
                    var last_id = "";
                    if (value.is_updated == "yes") {
                        var checked = "checked";
                        var disabled = "disabled";
                    } else {
                        last_id = parseFloat(present_id) - parseFloat(1);
                    }
                    jQuery('#event_' + last_id).prop('disabled', false);
                    const timeSlots = document.getElementById('add-fields');
                    const newRow = document.createElement('div');
                    newRow.className = 'row mb-2';
                    newRow.innerHTML = '<div class="col-md-12"><strong>' + value.name + '</strong><br><label class="switch"><input ' + disabled + ' data-id="' + value.id + '" id="event_' + value.id + '" class="toggle_state_cls_election_info form-control" ' + checked + ' type="checkbox"><span class="slider round"></span></label><span class="error_toggle_cls" id="error_' + value.id + '"></span></div>';
                    timeSlots.appendChild(newRow);
                });
            })
            .catch(function(error) {
                console.error(error);
            });
    });

    function close_modal() {
        $('#myModal').modal('hide');
        jQuery("#event_4").prop('checked', false);
    }

    function close_voting_modal() {
        $('#myModalVoting').modal('hide');
        jQuery("#event_6").prop('checked', false);
    }

    function close_poll_interrupted_modal() {
        $('#myModalPollInterrupted').modal('hide');
        jQuery("#event_13").prop('checked', false);
    }
    $('input[type=radio][name=interruption_type]').change(function() {
        console.log(this.value);
        $('.error').html('');
        if (this.value == 1) {
            $('#evm_fault_fields').css('display', 'none');
        } else {
            $('#evm_fault_fields').css('display', 'block');
        }
    });

</script>

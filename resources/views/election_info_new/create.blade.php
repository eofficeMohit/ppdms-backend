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
                                                @foreach($assembly as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
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
                                                @foreach($so_users as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
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
                                                @foreach($booth as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
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
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Voter Turnout:</strong>
                                            {!! Form::text('voting', null, array('placeholder' => 'Voting','class' => 'form-control')) !!}
                                            @error('voting')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Status:</strong>
                                            <select class="form-control" id="status" name="status">
                                                <option value="1">ON</option>
                                                <option value="0">OFF</option>
                                            </select>
                                            @error('status')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6 mt-2">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
</x-layout>
<script>
    document.getElementById('state_id').addEventListener('change', function() {
        var selectedOption = this.value;
        jQuery('#district_id').find('option').not(':first').remove();
        // Make an AJAX request
        axios.get('{{ route('assemblies.getStates') }}', {
            params: {
                selectedOption: selectedOption
            }
        })
        .then(function(response) {
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
        axios.get('{{ route('assemblies.getAssemblies') }}', {
            params: {
                selectedOption: selectedOption
            }
        })
        .then(function(response) {
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
    document.getElementById('so_user_id').addEventListener('change', function() {
        var selected_user = this.value;
        var selected_assemble = $('#assemble_id :selected').val();
        jQuery('#booth_id').find('option').not(':first').remove();
        // Make an AJAX request
        axios.get('{{ route('assemblies.getBooths') }}', {
            params: {
                selected_assemble: selected_assemble,
                selected_user: selected_user
            }
        })
        .then(function(response) {
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
        axios.get('{{ route('event.getEventsForEInfo') }}', {
            params: {
                selected_assemble: selected_assemble,
                selected_user: selected_user,
                selected_booth: selected_booth
            }
        })
        .then(function(response) {
            console.log(response.data);
            // Iterate through the response and append data to the container
            response.data.forEach(function(value) {
                var checked = "";
                var disabled = "";
                var present_id = value.id;
                var last_id = "";
                if(value.is_updated == "yes"){
                    var checked = "checked";
                    var disabled = "disabled";
                } else {
                    last_id = parseFloat(present_id) - parseFloat(1);
                }
                jQuery('#event_'+last_id).prop('disabled',false);
                const timeSlots = document.getElementById('add-fields');
                const newRow = document.createElement('div');
                newRow.className = 'row mb-2';
                newRow.innerHTML = '<div class="col-md-12"><strong>'+value.name+'</strong><br><label class="switch"><input '+disabled+' data-id="'+value.id+'" id="event_'+value.id+'" class="toggle_state_cls_election_info form-control" '+checked+' type="checkbox"><span class="slider round"></span></label><span class="error" id="error_'+value.id+'"></span></div>';
                timeSlots.appendChild(newRow);
            });
        })
        .catch(function(error) {
            console.error(error);
        });
    });
</script>
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
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                            {!! Form::open(array('route' => 'election-info.store','method'=>'POST')) !!}
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
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>District:</strong>
                                            <select class="form-control" id="district_id" name="district_id">
                                               <option value="">Select District</option>
                                            </select>
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
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Party Dispatch:</strong>
                                            <p>
                                            <label class="switch">
                                                <input  value="1" name="is_party_dispatch" class="toggle_state_cls" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Party Reached:</strong>
                                            <p>
                                            <label class="switch">
                                                <input value="1" name="is_party_reached" class="toggle_state_cls" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Setup of Polling Station:</strong>
                                            <p>
                                            <label class="switch">
                                                <input value="1" name="polling_station_setup" class="toggle_state_cls" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Mockpoll Done:</strong>
                                            <p>
                                            <label class="switch">
                                                <input value="1" name="is_mockpoll_done" class="toggle_state_cls" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Poll Started:</strong>
                                            <p>
                                            <label class="switch">
                                                <input value="1" name="is_poll_started" class="toggle_state_cls" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Voter Turnout:</strong>
                                            {!! Form::text('voting', null, array('placeholder' => 'Voting','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Voters in Queue at 6 PM:</strong>
                                            {!! Form::text('voter_in_queue', null, array('placeholder' => 'Voter In Queue','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Poll Ended:</strong>
                                            <p>
                                            <label class="switch">
                                                <input value="1" name="is_poll_ended" class="toggle_state_cls" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Machine Closed & EVM Switched Off:</strong>
                                            <p>
                                            <label class="switch">
                                                <input value="1" name="is_evm_switch_off" class="toggle_state_cls" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Party Departed from PS:</strong>
                                            <p>
                                            <label class="switch">
                                                <input value="1" name="is_booth_capt" class="toggle_state_cls" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Party Reached at Collection Centre:</strong>
                                            <p>
                                            <label class="switch">
                                                <input value="1" name="is_law_prob" class="toggle_state_cls" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>EVM Deposited:</strong>
                                            <p>
                                            <label class="switch">
                                                <input value="1" name="is_evm_prob" class="toggle_state_cls" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Poll Interrupted:</strong>
                                            <p>
                                            <label class="switch">
                                                <input value="1" name="is_mockpoll_clear" class="toggle_state_cls" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="clearfix">
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
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
    document.getElementById('assemble_id').addEventListener('change', function() {
        var selectedOption = this.value;
        jQuery('#booth_id').find('option').not(':first').remove();
        // Make an AJAX request
        axios.get('{{ route('assemblies.getBooths') }}', {
            params: {
                selectedOption: selectedOption
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
    
</script>
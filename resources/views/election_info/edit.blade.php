<link href="{{ asset('assets') }}/css/custom.css" rel="stylesheet" />
<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="election-info"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Election Management"></x-navbars.navs.auth>
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
                                    <h3>Edit E-Info</h3>
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
                            {!! Form::model($election_info, ['method' => 'PATCH','route' => ['election-info.update', $election_info->id],'id'=>'elecInfoForm']) !!}
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>State:</strong>
                                            <select class="form-control" id="state_id" name="state_id">
                                                <option value="">Select State</option>
                                                @foreach($states as $key => $value)
                                                    <option value="{{ $key }}" {{ $key == $election_info->state_id ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>District:</strong>
                                            <select class="form-control" id="district_id" name="district_id">
                                                <option value="">Select District</option>
											    @foreach($districts as $key => $value)
                                                    <option value="{{ $key }}" {{ $key == $election_info->district_id ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Assembly:</strong>
                                            <select class="form-control" id="assemble_id" name="assemble_id">
                                                <option value="">Select Assembly</option>
                                                @foreach($assembly as $key => $value)
                                                    <option value="{{ $key }}" {{ $key == $election_info->assemble_id ? 'selected' : '' }}>{{ $value }}</option>
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
                                                    <option value="{{ $key }}" {{ $key == $election_info->booth_id ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Event:</strong>
                                            <select class="form-control" id="event_id" name="event_id">
                                               <option value="">Select Event</option>
                                                @foreach($events as $key => $value)
                                                    <option value="{{ $key }}" {{ $key == $election_info->event_id ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
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
                                            <strong>Status:</strong>
                                            <select class="form-control" id="status" name="status">
                                                <option value="1" {{ 1 == $election_info->status ? 'selected' : '' }}>ON</option>
                                                <option value="0" {{ 0 == $election_info->status ? 'selected' : '' }}>OFF</option>
                                            </select>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $("#elecInfoForm").validate({
            rules: {
                state_id: {
                    required: true
                },
                district_id: {
                    required: true
                },
                booth_id: {
                    required: true
                },
                assemble_id: {
                    required: true
                },
                event_id: {
                    required: true
                },
                // Define rules for other fields
            },
            messages: {
                state_id: {
                    required: "State is required field."
                },
                district_id: {
                    required: "District is required field.",
                },
                booth_id: {
                    required: "Booth is required field.",
                },
                assemble_id: {
                    required: "Assembly is required field.",
                },
                event_id: {
                    required: "Event is required field.",
                },
                // Define custom error messages for other fields
            }
        });
    });
</script> 
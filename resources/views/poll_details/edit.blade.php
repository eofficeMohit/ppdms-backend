<link href="{{ asset('assets') }}/css/custom.css" rel="stylesheet" />
<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="poll-details"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Poll Details Management"></x-navbars.navs.auth>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Poll Details Management</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <h3>Edit Poll Details</h3>
                                    <div class="col-12 text-end">
                                        <a class="btn btn-primary" href="{{ route('poll-details') }}"> Back</a>
                                    </div>
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            {!! Form::model($pollDetail, ['method' => 'PATCH','route' => ['poll-details.update', $pollDetail->id],'id'=>'pollDetailForm']) !!}
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>State:</strong>
                                            <select class="form-control" id="state_id" disabled name="state_id">
                                                <option value="">Select State</option>
                                                @foreach($states as $key => $value)
                                                    <option value="{{ $key }}" {{ $key == $pollDetail->state_id ? 'selected' : '' }}>{{ $value }}</option>
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
                                            <select class="form-control" id="district_id" disabled name="district_id">
                                                <option value="">Select District</option>
											    @foreach($districts as $key => $value)
                                                    <option value="{{ $key }}" {{ $key == $pollDetail->district_id ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Assembly:</strong>
                                            <select class="form-control" id="assemble_id" disabled name="assemble_id">
                                                <option value="">Select Assembly</option>
                                                @foreach($assembly as $key => $value)
                                                    <option value="{{ $key }}" {{ $key == $pollDetail->assemble_id ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('assemble_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
									<div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>So Users:</strong>
                                            <select class="form-control" id="booth_id" disabled name="booth_id">
                                               <option value="">Select User</option>
                                                @foreach($users as $key => $value)
                                                    <option value="{{ $key }}" {{ $key == $pollDetail->user_id ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('user_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Booth:</strong>
                                            <select class="form-control" id="booth_id" disabled name="booth_id">
                                               <option value="">Select Booth</option>
                                                @foreach($booth as $key => $value)
                                                    <option value="{{ $key }}" {{ $key == $pollDetail->booth_id ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('booth_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                   
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Vote Polled:</strong>
                                            {!! Form::text('vote_polled', null, array('placeholder' => 'Vote Polled','class' => 'form-control')) !!}
                                            @error('vote_polled')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
									<div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Recieved At:</strong>
											<input type="datetime-local" name="date_time_recieved" value ="{{ $pollDetail->date_time_received }}" class = "form-control">
                                            @error('date_time_recieved')
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
        $("#pollDetailForm").validate({
            rules: {
                vote_polled: {
                    required: true,
					digits:true,
                },
                date_time_recieved: {
                    required: true
                }
                // Define rules for other fields
            },
            messages: {
                vote_polled: {
                    required: "Vote Polled is required field.",
                    digits: "Vote Polled must be digits only."
                },
                date_time_recieved: {
                    required: "Recieved at is required field.",
                }
                // Define custom error messages for other fields
            }
        });
    });
</script> 
<link href="{{ asset('assets') }}/css/custom.css" rel="stylesheet" />
<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="poll-interrupted"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Poll Interrupted Management"></x-navbars.navs.auth>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Poll Interrupted Management</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <h3>Edit Poll Interrupted</h3>
                                    <div class="col-12 text-end">
                                        <a class="btn btn-primary" href="{{ route('poll-interrupted') }}"> Back</a>
                                    </div>
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            {!! Form::model($pollInterrupted, ['method' => 'PATCH','route' => ['poll-interrupted.update', $pollInterrupted->id],'id'=>'pollInterruptedForm']) !!}
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>State:</strong>
                                            <select class="form-control" id="state_id" disabled name="state_id">
                                                <option value="">Select State</option>
                                                @foreach($states as $key => $value)
                                                    <option value="{{ $key }}" {{ $key == $pollInterrupted->state_id ? 'selected' : '' }}>{{ $value }}</option>
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
                                                    <option value="{{ $key }}" {{ $key == $pollInterrupted->district_id ? 'selected' : '' }}>{{ $value }}</option>
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
                                                    <option value="{{ $key }}" {{ $key == $pollInterrupted->assemble_id ? 'selected' : '' }}>{{ $value }}</option>
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
                                                    <option value="{{ $key }}" {{ $key == $pollInterrupted->user_id ? 'selected' : '' }}>{{ $value }}</option>
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
                                                    <option value="{{ $key }}" {{ $key == $pollInterrupted->booth_id ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('booth_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
									@php($types = getInterruptionTypes() )
									@if(count($types) > 0)
									<div class="col-xs-6 col-sm-6 col-md-6">
										<div class="form-group">
											<strong><b>Interruption Type:</b></strong><br>
											@foreach($types as $key => $val)
											<input type="radio" id="interrupted_type_{{ $val->id }}" name="interrupted_type" value="{{ $val->id }}" {{ $pollInterrupted->interrupted_type == $val->id ? 'checked' : '' }}>
											<label for="interrupted_type_{{ $val->id }}">{{ $val->name }}</label>
											@endforeach
										</div>
										@error('interruption_type')
											<div class="alert alert-danger">{{ $message }}</div>
										@enderror
									</div>
									@endif
									<div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Stop Time:</strong>
											<input type="time" required name="stop_time" value ="{{ $pollInterrupted->stop_time }}" class = "form-control">
                                            @error('stop_time')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
									<div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Resume Time:</strong>
											<input type="time" required name="resume_time" value ="{{ $pollInterrupted->resume_time }}" class = "form-control">
                                            @error('resume_time')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
									<div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Remarks:</strong>
											<textarea name="remarks" required class = "form-control">{{ $pollInterrupted->remarks }}</textarea>
                                            @error('remarks')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
								   <span class="interrupted_type" style="display: {{ $pollInterrupted->interrupted_type == 2 ? 'block' : 'none' }}">
									   <div class="col-xs-6 col-sm-6 col-md-6">
											<div class="form-group">
												<strong>Old CU:</strong>
												<input type="text" id="old_cu" required name="old_cu" value ="{{ $pollInterrupted->old_cu }}" class = "form-control">
												@error('old_cu')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
										<div class="col-xs-6 col-sm-6 col-md-6">
											<div class="form-group">
												<strong>Old BU:</strong>
												<input type="text" id="old_bu" required name="old_bu" value ="{{ $pollInterrupted->old_bu }}" class = "form-control">
												@error('old_bu')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
										<div class="col-xs-6 col-sm-6 col-md-6">
											<div class="form-group">
												<strong>New CU:</strong>
												<input type="text" id="new_cu" required name="new_cu" value ="{{ $pollInterrupted->new_cu }}" class = "form-control">
												@error('new_cu')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
										<div class="col-xs-6 col-sm-6 col-md-6">
											<div class="form-group">
												<strong>New BU:</strong>
												<input type="text" id="new_bu" required name="new_bu" value ="{{ $pollInterrupted->new_bu }}" class = "form-control">
												@error('new_bu')
													<div class="alert alert-danger">{{ $message }}</div>
												@enderror
											</div>
										</div>
									</span>
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
	$('input[type=radio][name=interrupted_type]').change(function() {
        console.log(this.value);
        $('.error').html('');
        if (this.value == 1) {
			$('.interrupted_type').css('display', 'none');
            $('#old_cu').prop('required', false);
            $('#old_bu').prop('required', false);
            $('#new_cu').prop('required', false);
            $('#new_bu').prop('required', false);
        } else {
            $('.interrupted_type').css('display', 'block');
			$('#old_cu').prop('required', true);
            $('#old_bu').prop('required', true);
            $('#new_cu').prop('required', true);
            $('#new_bu').prop('required', true);
        }
    });
</script>

<link href="{{ asset('assets') }}/css/custom.css" rel="stylesheet" />
<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="users"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="User Management"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">User Management</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <h3>Create New User</h3>
                                    <div class="col-12 text-end">
                                        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
                                    </div>
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            {!! Form::open(['route' => 'users.store', 'method' => 'POST', 'id' => 'add_user_form']) !!}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Email:</strong>
                                        {!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Primary Phone:</strong>
                                        {!! Form::number('mobile_number', null, ['placeholder' => 'Primary Phone ', 'class' => 'form-control']) !!}
                                        @error('mobile_number')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Secondary Phone:</strong>
                                        {!! Form::number('alternate_mobile', null, ['placeholder' => 'Secondary Phone ', 'class' => 'form-control']) !!}
                                        @error('alternate_mobile')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Designation:</strong>
                                        {!! Form::text('designation', null, ['placeholder' => 'Designation', 'class' => 'form-control']) !!}
                                        @error('designation')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Office Name:</strong>
                                        {!! Form::text('office_name', null, ['placeholder' => 'Office Name', 'class' => 'form-control']) !!}
                                        @error('office_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Department Name:</strong>
                                        {!! Form::text('dept_name', null, ['placeholder' => 'Department Name', 'class' => 'form-control']) !!}
                                        @error('dept_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>AC Code:</strong>
                                        {!! Form::text('ac_code', null, ['placeholder' => 'AC Code', 'class' => 'form-control']) !!}
                                        @error('ac_code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Other Name:</strong>
                                        {!! Form::text('other_name', null, ['placeholder' => 'Other Name', 'class' => 'form-control']) !!}
                                        @error('other_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>State:</strong>
                                        <select class="form-control" id="state_id" name="state_id">
                                            <option value="">Select State</option>
                                            @foreach ($states as $key => $value)
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
                                        <strong>Password:</strong>
                                        {!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control', 'id' => 'password']) !!}
                                        @error('password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Confirm Password:</strong>
                                        {!! Form::password('confirm_password', ['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}
                                        @error('confirm_password')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Role:</strong>
                                        {!! Form::select('roles[]', $roles, [], ['class' => 'form-control', 'multiple']) !!}
                                        @error('role[]')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Status:</strong>
                                        <select class="form-control" id="status" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">In-Active</option>
                                        </select>
                                        @error('status')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="clearfix"></div>
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
                    jQuery('#assemble_id').append(jQuery('<option>').val(value.id).text(value
                        .asmb_name))
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
                    jQuery('#booth_id').append(jQuery('<option>').val(value.id).text(value
                        .booth_name))
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
        $("#add_user_form").validate({
            rules: {
                name: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                mobile_number: {
                    required: true,
                    minlength: 10,
                    maxlength: 10
                },
                alternate_mobile: {
                    minlength: 10,
                    maxlength: 10
                },
                state_id: {
                    required: true
                },
                district_id: {
                    required: true
                },
                assemble_id: {
                    required: true
                },
                password: {
                    required: true,
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },
                "roles[]": "required",
                status: {
                    required: true,
                }
                // Define rules for other fields
            },
            messages: {
                name: {
                    required: "Name is required field."
                },
                email: {
                    required: "Email is required field.",
                    email: "Please enter an valid email.",
                },
                mobile_number: {
                    required: "Primary Phone is required field.",
                },
                state_id: {
                    required: "State is required field."
                },
                district_id: {
                    required: "District is required field.",
                },
                assemble_id: {
                    required: "Assembly is required field.",
                },
                password: {
                    required: "Password is required field.",
                },
                confirm_password: {
                    required: "Confirm Password is required field.",
                },
                "roles[]": {
                    required: "Roles is required field.",
                },
                status: {
                    required: "Status is required field.",
                }
                // Define custom error messages for other fields
            }
        });
    });
</script>

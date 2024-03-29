<x-layout bodyClass="g-sidenav-sho
w  bg-gray-200">

    <x-navbars.sidebar activePage="booth"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Booth Management"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Booth Management</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <h3>Edit Booth</h3>
                                    <div class="col-12 text-end">
                                        <a class="btn btn-primary" href="{{ route('booth') }}"> Back</a>
                                    </div>
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            {!! Form::model($booth, ['method' => 'PATCH', 'route' => ['booth.update', $booth->id]]) !!}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Booth Number:</strong>
                                        {!! Form::text('booth_no', null, ['placeholder' => 'Booth Number', 'class' => 'form-control']) !!}
                                        @error('booth_no')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Total Voters:</strong>
                                        {!! Form::text('tot_voters', null, ['placeholder' => 'Total Voters', 'class' => 'form-control']) !!}
                                        @error('tot_voters')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Booth Name:</strong>
                                        {!! Form::text('booth_name', null, ['placeholder' => 'Booth Name', 'class' => 'form-control']) !!}
                                        @error('booth_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Booth Name Uni:</strong>
                                        {!! Form::text('booth_name_uni', null, ['placeholder' => 'Booth Name Uni', 'class' => 'form-control']) !!}
                                        @error('booth_name_uni')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>State:</strong>
                                        <select class="form-control" id="state_id" name="state_id">
                                            @foreach ($states as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ $key == $booth->state_id ? 'selected' : '' }}>{{ $value }}
                                                </option>
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
                                            @foreach ($districts as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ $key == $booth->district_id ? 'selected' : '' }}>
                                                    {{ $value }}</option>
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
                                        <select class="form-control" id="assemble_id" name="assemble_id">
                                            <option value="">Select Assembly</option>
                                            @foreach ($assembly as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ $key == $booth->assemble_id ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('assemble_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>User:</strong>
                                        <select class="form-control" id="user_id" name="user_id">
                                            <option value="">Select User</option>
                                            @foreach ($user as $key => $value)
                                                <option value="{{ $key }}"
                                                    {{ $key == $booth->user_id ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Booth Latitude:</strong>
                                        {!! Form::text('latitude', null, ['placeholder' => 'Booth Latitude', 'class' => 'form-control']) !!}
                                        @error('latitude')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Booth Longitude</strong>
                                        {!! Form::text('longitude', null, ['placeholder' => 'Booth Longitude', 'class' => 'form-control']) !!}
                                        @error('longitude')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Status:</strong>
                                        <select class="form-control" name="status">
                                            <option value="1" {{ 1 == $booth->status ? 'selected' : '' }}>ON
                                            </option>
                                            <option value="0" {{ 0 == $booth->status ? 'selected' : '' }}>OFF
                                            </option>
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
</script>

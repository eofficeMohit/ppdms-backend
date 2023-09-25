<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="assemblies"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Assembly Management"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Assembly Management</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <h3>Edit Assembly</h3>
                                        <div class="col-12 text-end">
                                            <a class="btn btn-primary" href="{{ route('assemblies') }}"> Back</a>
                                        </div>
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            {!! Form::model($assembly, ['method' => 'PATCH','route' => ['assemblies.update', $assembly->id]]) !!}
                            <div class="row">
                                   {{-- <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>ST Code:</strong>
                                            {!! Form::text('st_code', null, array('placeholder' => 'ST Code','class' => 'form-control')) !!}
                                        </div>
                                    </div> --}}
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>ASMB Code:</strong>
                                            {!! Form::text('asmb_code', null, array('placeholder' => 'ASMB Code','class' => 'form-control')) !!}
                                            @error('asmb_code')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>AC Type:</strong>
                                            {!! Form::text('ac_type', null, array('placeholder' => 'AC Type','class' => 'form-control')) !!}
                                            @error('ac_type')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                   {{-- <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>PC Type:</strong>
                                            {!! Form::text('pc_type', null, array('placeholder' => 'PC Type','class' => 'form-control')) !!}
                                        </div>
                                    </div> --}}
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>State:</strong>
                                            <select class="form-control" id="state_id" name="state_id">
                                                @foreach($states as $key => $value)
                                                    <option value="{{ $key }}" {{ $key == $assembly->state_id ? 'selected' : '' }}>{{ $value }}</option>
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
                                                @foreach($districts as $key => $value)
                                                    <option value="{{ $key }}" {{ $key == $assembly->district_id ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>PC Number:</strong>
                                            <select class="form-control" id="pc_id" name="pc_id">
                                                <option value="">Select Parliament</option>
                                                @foreach($parliament as $key => $value)
                                                    <option value="{{ $key }}" {{ $key == $assembly->pc_id ? 'selected' : '' }}>{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            @error('pc_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>ASMB Name:</strong>
                                            {!! Form::text('asmb_name', null, array('placeholder' => 'ASMB Code','class' => 'form-control')) !!}
                                            @error('asmb_name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>AC Name Uni:</strong>
                                            {!! Form::text('ac_name_uni', null, array('placeholder' => 'ASMB Code','class' => 'form-control')) !!}
                                            @error('ac_name_uni')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <strong>Status:</strong>
                                            <select class="form-control" name="status">
                                                <option value="1" {{ 1 == $assembly->status ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ 0 == $assembly->status ? 'selected' : '' }}>In-Active</option>
                                            </select>
                                            @error('status')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
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
</script>
<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="districts"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="District Management"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">District Management</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <h3>Edit District</h3>
                                    <div class="col-12 text-end">
                                        <a class="btn btn-primary" href="{{ route('districts.index') }}"> Back</a>
                                    </div>
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            {{-- @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                             --}}
                            {!! Form::model($district, [
                                'method' => 'PATCH',
                                'route' => ['districts.update', $district->id],
                                'id' => 'district_manage_form',
                            ]) !!}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Disctrict Name:</strong>
                                        {!! Form::text('name', null, ['placeholder' => 'Disctrict Name', 'class' => 'form-control']) !!}
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>District Code:</strong>
                                        {!! Form::text('d_code', null, ['placeholder' => 'Disctrict Code', 'class' => 'form-control']) !!}
                                        @error('d_code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>District Hindi Name:</strong>
                                        {!! Form::text('d_name_hindi', null, ['placeholder' => 'Disctrict Hindi Name', 'class' => 'form-control']) !!}
                                        @error('d_name_hindi')
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
                                                    {{ $key == $district->state_id ? 'selected' : '' }}>
                                                    {{ $value }}</option>
                                            @endforeach
                                        </select>
                                        @error('state_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Status:</strong>
                                        <select class="form-control" name="status">
                                            <option value="1" {{ 1 == $district->status ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="0" {{ 0 == $district->status ? 'selected' : '' }}>
                                                In-Active</option>
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

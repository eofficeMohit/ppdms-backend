<link href="{{ asset('assets') }}/css/custom.css" rel="stylesheet" />
<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="map_booth"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Booth Mapping"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Booth Mapping</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
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
                            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Assembly:</strong>
                                        <select id="sel_assembly" name="sel_assembly">
                                        <option value="">--Select Assembly--</option>
                                        @foreach($assembly as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->asmb_name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>SO Officer:</strong>
                                        <select id="so_officer" name="so_officer">
                                        <option value="">--Select So Officer--</option>
                                        @foreach($users as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div id="box_div1" class="box form-group" ondrop="dragDrop(event, this)" ondragover="allowDrop(event)">
                                        <strong>Un-assigned Booth:</strong>
                                        <ul class="div1" id="box1">
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div id="box_div2" class="box form-group" ondrop="dragDrop(event, this)" ondragover="allowDrop(event)">
                                        <strong>Assigned Booth:</strong>
                                        <ul class="div1" id="box2">
                                        </ul>
                                    </div>
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

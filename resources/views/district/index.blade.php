<link href="{{ asset('assets') }}/css/custom.css" rel="stylesheet" />
<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="districts"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->    
        <x-navbars.navs.auth titlePage="Districts Management"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3"><strong>District Add, Edit, Delete and listings features are
                                        functional!</strong></h6>
                            </div>
                        </div>
                         <div class=" me-3 my-3 text-end">
                         <a class="btn bg-gradient-dark mb-0" href="{{ route('districts.create') }}"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                District</a>
                        </div> 
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="cus_msg_div">
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ID
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Name</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                State</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(! $data->isEmpty())
                                        @foreach ($data as $key => $district)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ ++$i }}</p>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $district->name }}</h6>

                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs text-secondary mb-0">{{$district->state->name }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                    <label class="switch">
                                                    <input data-id="{{ $district->id }}" class="toggle_state_cls_district" type="checkbox" {{ $district->status ? 'checked' : '' }}>
                                                    <span class="slider round"></span>
                                                    </label>
                                            </td>
                                            <td class="">
                                                <a rel="tooltip" class="btn btn-info btn-link"
                                                href="{{ route('districts.show',$district->id) }}" data-original-title="Show District"
                                                title="Show District">
                                                <i class="material-icons">visibility</i>
                                                <div class="ripple-container"></div>
                                                </a>
                                                @can('parliament-edit')
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('districts.edit',$district->id) }}" data-original-title="Edit District"
                                                    title="Edit District">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                @endcan
                                                @can('parliament-delete')
                                                {!! Form::open(['method' => 'DELETE','route' => ['districts.destroy', $district->id],'style'=>'display:inline']) !!}
                                                    {!! Form::button('<i class="material-icons">close</i>', ['type'=>'submit','class' => 'btn btn-danger btn-link']) !!}
                                                {!! Form::close() !!}
                                                @endcan
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3"></td>
                                            <td class="align-middle text-center text-sm">
                                                <div class="d-flex text-center">
                                                    <div>
                                                    <p class="mb-0 text-sm">No Record's Found.</p>
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-center">
                                    {!! $data->links() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>
<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="dashboard-settings"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Dashboard Settings"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">  
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3"><strong>Dashboard Settings Add, Edit, Delete and listings features are
                                        functional!</strong></h6>
                            </div>
                        </div>
                        @can('settings-add')
                        <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="{{ route('dashboard-settings.create') }}"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Settings</a>
                        </div>
                        @endcan
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
                                                Status
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(! $data->isEmpty())
                                        @foreach ($data as $key => $settings)
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
                                                    <p class="mb-0 text-sm">{{ $settings->name }}</p>

                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <label class="switch">
                                                <input data-id="{{ $settings->id }}" class="toggle_state_cls_settings" type="checkbox" {{ $settings->status ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a rel="tooltip" class="btn btn-info btn-link"
                                                    href="{{ route('dashboard-settings.show',$settings->id) }}" data-original-title="Show Settings"
                                                    title="Show Settings">
                                                    <i class="material-icons">visibility</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                @can('settings-edit')
												<a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('dashboard-settings.edit',$settings->id) }}" data-original-title="Edit Settings"
                                                    title="Edit Settings">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                @endcan
                                                @can('settings-edit')
                                                {!! Form::open(['method' => 'DELETE','route' => ['dashboard-settings.destroy', $settings->id],'style'=>'display:inline']) !!}
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
                                @if(! $data->isEmpty())
                                    <div class="d-flex justify-content-center">
                                        {{ $data->links() }}
                                    </div>
                                @endif
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

<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="roles"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Roles"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3"><strong> Role Management Listings and control their CRUD Functionality.
                                       </strong> </h6>
                            </div>
                        </div>
                        {{-- <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Role Management</h6>
                        </div> --}}
                        {{-- <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2"> --}}
                            <div class="me-3 my-3 text-end">
                                @can('role-create')
                                    <a class="btn bg-gradient-dark mb-0" href="{{ route('roles.create') }}"> Create New Role</a>
                                @endcan
                            </div>
                            <div class="card-body px-0 pb-2">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                            <th class="text-secondary opacity-7" width="280px">Action</th>
                                        </tr>
                                    </thead>
                                        @foreach ($roles as $key => $role)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ ++$i }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <p class="mb-0 text-sm">{{ $role->name }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}" data-original-title="" title="Show">Show</a>
                                                @can('role-edit')
                                                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}" data-original-title="" title="Edit">Edit</a>
                                                @endcan
                                                @can('role-delete')
                                                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                                        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-link']) !!}
                                                    {!! Form::close() !!}
                                                @endcan
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            <div class="d-flex justify-content-center">
                                {!! $roles->links() !!}
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

<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="manage-assembly"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Assembly Management"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3"><strong>Assembly Add, Edit, Delete and listings features are
                                        functional!</strong></h6>
                            </div>
                        </div>
                        <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="{{ route('assemblies.create') }}"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                Assembly</a>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
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
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                ST CODE
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                ASMB CODE</th>
                                                <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                ASMB Name</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                AC TYPE</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                PC TYPE</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                PC NO
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(! $data->isEmpty())
                                        @foreach ($data as $key => $user)
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
                                                    <div>
                                                    <h6 class="mb-0 text-sm">{{ $user->st_code }}</h6>
                                                    </div>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $user->asmb_code }}</h6>

                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                    <h6 class="mb-0 text-sm">{{ $user->asmb_name }}</h6>
                                                    </div>

                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <p class="text-xs text-secondary mb-0">{{ $user->ac_type }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                            <p class="text-xs text-secondary mb-0">{{ $user->pc_type }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="text-secondary text-xs font-weight-bold">{{ $user->pc_no }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a rel="tooltip" class="btn btn-info btn-link"
                                                href="{{ route('assemblies.show',$user->id) }}" data-original-title="show User"
                                                title="Show Assembly">
                                                <i class="material-icons">visibility</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                                <a rel="tooltip" class="btn btn-success btn-link"
                                                    href="{{ route('assemblies.edit',$user->id) }}" data-original-title="Edit User"
                                                    title="Edit Assembly">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                                {!! Form::open(['method' => 'DELETE','route' => ['assemblies.destroy', $user->id],'style'=>'display:inline']) !!}
                                                    {!! Form::button('<i class="material-icons">close</i>', ['type'=>'submit','class' => 'btn btn-danger btn-link']) !!}
                                                {!! Form::close() !!}
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

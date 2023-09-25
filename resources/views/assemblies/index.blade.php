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
                        @can('assembly-create')
                            <div class=" me-3 my-3 text-end">
                                <a class="btn bg-gradient-dark mb-0" href="{{ route('assemblies.create') }}"><i
                                        class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                    Assembly</a>
                            </div>
                        @endcan
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class="cus_msg_div">
                        </div>
                        <div class="card-body px-4 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0" id="empTable">
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
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                STATUS
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action</th>
                                        </tr>
                                    </thead>
                                </table>
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

<script type="text/javascript">
    var $ = jQuery.noConflict();
    var permission_delete = "{{ checkPermission('assembly-delete') }}";
    var permission_edit = "{{ checkPermission('assembly-edit') }}";
    $(function() {
        var table = $('#empTable').DataTable({
            dom: 'Bfrtip',
            buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print', 'colvis' ],
            processing: true,
            serverSide: true,
            order: [
                [0, 'desc']
            ],
            pageLength: 25,
            ajax: "{{ route('assemblies.getdatatabledata') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'st_code',
                    name: 'st_code'
                },
                {
                    data: 'asmb_name',
                    name: 'asmb_name'
                },
                {
                    data: 'asmb_name',
                    name: 'asmb_name'
                },
                {
                    data: 'ac_type',
                    name: 'ac_type'
                },
                {
                    data: 'pc_type',
                    name: 'pc_type'
                },
                {
                    data: 'pc_no',
                    name: 'pc_no'
                },
                {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        var checked = "";
                        if (data == 1) {
                            checked = "checked";
                        }
                        return '<label class="switch"><input data-id="' + full.id +
                            '" class="toggle_state_cls_assemble" ' + checked +
                            ' type="checkbox"><span class="slider round"></span></label>';
                    }
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        var btn =
                            '<a rel="tooltip" class="btn btn-info btn-link m-2" href="assemblies/show/' +
                            full.id +
                            '" data-original-title="Show Assembly" title="Show Assembly"><i class="material-icons">visibility</i><div class="ripple-container"></div></a>';
                        if (permission_edit == "granted") {
                            btn +=
                                '<a rel="tooltip" class="btn btn-success btn-link m-2" href="assemblies/edit/' +
                                full.id +
                                '" data-original-title="Edit Assembly" title="Edit Assembly"><i class="material-icons">edit</i><div class="ripple-container"></div></a>';
                        }
                        if (permission_delete == "granted") {
                            btn +=
                                '<a rel="tooltip" class="btn btn-danger btn-link m-2" href="assemblies/destroy/' +
                                full.id +
                                '" data-original-title="Delete Assembly" title="Delete Assembly"><i class="material-icons">delete</i><div class="ripple-container"></div></a>';
                        }
                        return btn;
                    }
                },
            ]
        });
        table.buttons().container()
                 .insertBefore( '#empTable_filter' );
    });
</script>

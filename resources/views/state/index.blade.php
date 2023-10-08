<link href="{{ asset('assets') }}/css/custom.css" rel="stylesheet" />
<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="states"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="States Management"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3"><strong>State Add, Edit, Delete and listings features are
                                        functional!</strong></h6>
                            </div>
                        </div>
                        @can('state-create')
                         <div class=" me-3 my-3 text-end">
                         <a class="btn bg-gradient-dark mb-0" href="{{ route('states.create') }}"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                State</a>
                        </div>
                        @endcan
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
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                NAME</th>
                                                <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                STATE CODE</th>

                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                STATUS
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Action
                                            </th>
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
@if ($message = Session::get('success'))
    <script>
        var message = "{{ $message }}";
        jQuery('#toast_body_msg').html(message); 
        let myAlert = document.querySelector('.toast');
        let bsAlert = new  bootstrap.Toast(myAlert);
        bsAlert.show();
    </script>
@endif
<script type="text/javascript">
    var $ = jQuery.noConflict();
    var permission_delete = "{{ checkPermission('state-delete') }}";
    var permission_edit = "{{ checkPermission('state-edit') }}";
    $(function () {
        var table = $('#empTable').DataTable({
                dom: 'Bfrtip',
                buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print', 'colvis' ],
                processing: true,
                serverSide: true,
                pageLength: 25,
                ajax: "{{ route('state.getdatatabledata') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'st_code', name: 'st_code'},
                    {
                    data: 'status',
                    name: 'status',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        var checked ="";
                        if(data == 1){
                          checked = "checked";
                        }
                        return '<label class="switch"><input data-id="'+full.id+'" class="toggle_state_cls_state" '+checked+' type="checkbox"><span class="slider round"></span></label>';
                    }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            var confirmation = "'Are you sure you want to delete?'";
                            var btn = '<a rel="tooltip" class="btn btn-info btn-link m-2" href="states/'+full.id+'" data-original-title="Show State" title="Show State"><i class="material-icons">visibility</i><div class="ripple-container"></div></a>';
                            if(permission_edit == "granted"){
                                btn += '<a rel="tooltip" class="btn btn-success btn-link m-2" href="states/'+full.id+'/edit/" data-original-title="Edit State" title="Edit State"><i class="material-icons">edit</i><div class="ripple-container"></div></a>';
                            }
                            if(permission_delete == "granted"){
                                btn += '<a rel="tooltip" onclick="return confirm('+confirmation+')" class="btn btn-danger btn-link m-2" href="state/delete/'+full.id+'" data-original-title="Delete State" title="Delete State"><i class="material-icons">delete</i><div class="ripple-container"></div></a>';
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


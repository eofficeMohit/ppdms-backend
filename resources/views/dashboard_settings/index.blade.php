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
                        @can('settings-create')
                        <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="{{ route('dashboard-settings.create') }}"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Settings</a>
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
                                                Name</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status
                                            </th>
                                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
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
    var permission_delete = "{{ checkPermission('settings-delete') }}";
    var permission_edit = "{{ checkPermission('settings-edit') }}";
    $(function () {
        var table = $('#empTable').DataTable({
                pageLength: 25,
                dom: 'Blfrtip',
                buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print', 'colvis' ],
                processing: true,
                serverSide: true,
                order: [
                    [0, 'desc']
                ],
                ajax: "{{ route('dashboard-settings.getdatatabledata') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
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
                        return '<label class="switch"><input data-id="'+full.id+'" class="toggle_state_cls_settings" '+checked+' type="checkbox"><span class="slider round"></span></label>';
                    }
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            var confirmation = "'Are you sure you want to delete?'";
                            var btn = '<a rel="tooltip" class="btn btn-info btn-link m-2" href="dashboard-settings/show/'+full.id+'" data-original-title="Show Dashboard Settings" title="Show Dashboard Settings"><i class="material-icons">visibility</i><div class="ripple-container"></div></a>';
                            if(permission_edit == "granted"){
                                btn += '<a rel="tooltip" class="btn btn-success btn-link m-2" href="dashboard-settings/edit/'+full.id+'" data-original-title="Edit Dashboard Settings" title="Edit Dashboard Settings"><i class="material-icons">edit</i><div class="ripple-container"></div></a>';
                            }
                            if(permission_delete == "granted"){
                                btn += '<a rel="tooltip" onclick="openConfirmModal('+full.id+')" class="btn btn-danger btn-link m-2" data-original-title="Delete Dashboard Settings" title="Delete Dashboard Settings"><i class="material-icons">delete</i><div class="ripple-container"></div></a>';
                            }
                            return btn;
                        }
                    },
                ]
            });
        });
        function openConfirmModal(id){
            var btn_html = '<a href="/dashboard-settings/destroy/'+id+'" class="btn  btn-outline-danger">Yes</a><a type="button" class="btn  btn-danger waves-effect" onclick="closeConfirmModal()">No</a>';
            jQuery('#mod_btn_div').html(btn_html);
            jQuery('#modalConfirmDelete').modal('show');
        }
        function closeConfirmModal(){
            jQuery('#modalConfirmDelete').modal('hide');
        }
   </script>

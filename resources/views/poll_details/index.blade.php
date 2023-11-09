<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="poll-details"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Poll Details"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3"><strong>Poll Details Edit, Delete and listings features are
                                        functional!</strong></h6>
                            </div>
                        </div>
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
                                                District
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Assembly</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Booth</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Vote Polled
                                            </th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Recieved AT
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
    var permission_delete = "{{ checkPermission('poll-detail-delete') }}";
    var permission_edit = "{{ checkPermission('poll-detail-edit') }}";
    $(function() {
        var table = $('#empTable').DataTable({
            dom: 'Blfrtip',
            buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print', 'colvis' ],
            processing: true,
            serverSide: true,
            pageLength: 25,
            ajax: "{{ route('poll-details.getdatatabledata') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'district',
                    name: 'district'
                },
                {
                    data: 'assembly',
                    name: 'assembly'
                },
                {
                    data: 'booth',
                    name: 'booth'
                },
                {
                    data: 'vote_polled',
                    name: 'vote_polled'
                },
                {
                    data: 'date_time_received',
                    name: 'date_time_received'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        var confirmation = "'Are you sure you want to delete?'";
                        var btn = "";
                        /*var btn =
                            '<a rel="tooltip" class="btn btn-info btn-link m-2" href="event/show/' +
                            full.id +
                            '" data-original-title="Show Event" title="Show Event"><i class="material-icons">visibility</i><div class="ripple-container"></div></a>';*/
                        if (permission_edit == "granted") {
                            btn +=
                                '<a rel="tooltip" class="btn btn-success btn-link m-2" href="/poll-details/edit/' +
                                full.id +
                                '" data-original-title="Edit Poll Detail" title="Edit Poll Detail"><i class="material-icons">edit</i><div class="ripple-container"></div></a>';
                        }
                        if (permission_delete == "granted") {
                            btn +=
                                '<a rel="tooltip" onclick="openConfirmModal('+full.id+')" class="btn btn-danger btn-link m-2" data-original-title="Delete Poll Detail" title="Delete Poll Detail"><i class="material-icons">delete</i><div class="ripple-container"></div></a>';
                        }
                        return btn;
                    }
                },
            ]
        });
        table.buttons().container()
                 .insertBefore( '#empTable_filter' );
    });
    function openConfirmModal(id){
        var btn_html = '<a href="/poll-details/delete/'+id+'" class="btn  btn-outline-danger">Yes</a><a type="button" class="btn  btn-danger waves-effect" onclick="closeConfirmModal()">No</a>';
        jQuery('#mod_btn_div').html(btn_html);
        jQuery('#modalConfirmDelete').modal('show');
    }
    function closeConfirmModal(){
        jQuery('#modalConfirmDelete').modal('hide');
    }
</script>

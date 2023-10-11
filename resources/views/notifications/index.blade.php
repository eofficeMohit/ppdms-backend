<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="notifications"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Notifications"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white mx-3"><strong>Notifications!</strong></h6>
                            </div>
                        </div>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <div class=" me-3 my-3 text-end">
                            <a class="btn btn-danger mb-0" href="{{ route('notifications') }}">&nbsp;&nbsp;Reset</a>
                        </div>
                        <div class="card-body px-0 pb-2">
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
                                                User
                                            </th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Title</th>
                                                <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Message</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Notification TYPE</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Status</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Seen</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Notification For
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

<script type="text/javascript">
    var param = "{{ app('request')->input('id') }}";
    console.log(param);
    if(param == ""){
        param = "all";
    }
    var $ = jQuery.noConflict();
    function datatables(){
    $(function () {
        var table = $('#empTable').DataTable({
                dom: 'Blfrtip',
                buttons: [ 'copy', 'csv', 'excel', 'pdf', 'print', 'colvis' ],
                processing: true,
                serverSide: true,
                order: [
                    [0, 'desc']
                ],
                pageLength: 25,
                ajax: "notifications/getdatatabledata/"+param,
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'user_name', name: 'user_name'},
                    {data: 'title', name: 'title'},
                    {data: 'message', name: 'message'},
                    {data: 'notification_type', name: 'notification_type'},
                    {
                    data: 'seen',
                    name: 'status',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        var checked ="";
                        if(data == 1){
                          checked = "checked";
                        }
                        return '<label class="switch"><input data-id="'+full.id+'" class="toggle_state_cls_notification_status" '+checked+' type="checkbox"><span class="slider round"></span></label>';
                    }
                    },
                    {
                    data: 'seen',
                    name: 'seen',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        var checked ='<span class=" text-xs font-weight-bold badge bg-warning">Un-Read</span>';
                        if(data == 1){
                          checked = '<span class=" text-xs font-weight-bold badge bg-success">Read</span>';
                        }
                        return checked;
                    }
                    },
                    {data: 'notification_for', name: 'notification_for'},
                ]
            });
        });
    }
    datatables();
    jQuery(document).on('change', '.toggle_state_cls_notification_status', function () {
        var id = jQuery(this).attr('data-id');
        var status = jQuery(this).prop('checked') == true ? 1 : 0; 
        // Make an AJAX request
        axios.get('/notifications/updateNotiStatus', {
            params: {
                id: id,
                status: status
            }
        })
        .then(function(response) {
            console.log(response.data);
            jQuery(this).attr('data-id',id);
            jQuery('#toast_body_msg').html("Status updated successfully."); 
            let myAlert = document.querySelector('.toast');
            let bsAlert = new  bootstrap.Toast(myAlert);
            bsAlert.show();
            if ($.fn.DataTable.isDataTable('#empTable')) {
                $('#empTable').DataTable().destroy();
            }
            $('#empTable tbody').empty();
            datatables();
            jQuery('.notification_ul_cls').empty();
            jQuery('.bell-count').html(response.data.count);
            jQuery('.notification_ul_cls').append(response.data.data);
        })
        .catch(function(error) {
            console.error(error);
        });
    });
   </script>

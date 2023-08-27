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
                         <div class=" me-3 my-3 text-end">
                         {{-- <a class="btn bg-gradient-dark mb-0" href="{{ route('state.create') }}"><i
                                    class="material-icons text-sm">add</i>&nbsp;&nbsp;Add New
                                State</a> --}}
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
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(! $data->isEmpty())
                                        @foreach ($data as $key => $state)
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
                                                    <h6 class="mb-0 text-sm">{{ $state->name }}</h6>

                                                </div>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                    <label class="switch">
                                                    <input data-id="{{ $state->id }}" class="toggle_state_cls" type="checkbox" {{ $state->status ? 'checked' : '' }}>
                                                    <span class="slider round"></span>
                                                    </label>
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    jQuery('.toggle_state_cls').on('change', function() {
        var id = jQuery(this).attr('data-id');
        var status = jQuery(this).prop('checked') == true ? 1 : 0; 
        // Make an AJAX request
        axios.get('{{ route('states.updateStatus') }}', {
            params: {
                id: id,
                status: status
            }
        })
        .then(function(response) {
            console.log(response.data);
            jQuery(this).attr('data-id',id);
            jQuery('.cus_msg_div').html('<p class="alert alert-success">Status changed successfully.</p>');
            setTimeout(function() { jQuery('.cus_msg_div').html(''); }, 3000);

            // Iterate through the response and append data to the container
        })
        .catch(function(error) {
            console.error(error);
        });
    });
</script>
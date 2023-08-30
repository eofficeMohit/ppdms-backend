<link href="{{ asset('assets') }}/css/custom.css" rel="stylesheet" />
<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="event.edit"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <x-navbars.navs.auth titlePage="Event Management"></x-navbars.navs.auth>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Events Management</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <h3>Edit Event</h3>
                                    <div class="col-12 text-end">
                                        <a class="btn btn-primary" href="{{ route('events') }}"> Back</a>
                                    </div>
                                </div>
                            </div>
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                </div>
                            @endif
                            {{-- {{dd($event)}} --}}
                            {!! Form::model($event, ['method' => 'PATCH','route' => ['event.update', $event->id], 'id'=>'myForm']) !!}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Event Name:</strong>
                                        {!! Form::text('event_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Event Sequence:</strong>
                                        {!! Form::number('event_sequence', null, array('placeholder' => 'Sequence number ','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Event Start Date:</strong>
                                        {!! Form::input('dateTime-local', 'start_date_time',$event->start_date_time ?? now(), ['id' => 'start_date_time', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Event End Date:</strong>
                                        {!! Form::input('dateTime-local', 'end_date_time', $event->end_date_time ?? now(), ['id' => 'start_date_time', 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Status:</strong>
                                        <select class="form-control" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">In-Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="clearfix">
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $("#myForm").validate({
            rules: {
                event_name: {
                    required: true,
                    minlength: 3
                },
                event_sequence: {
                    required: true
                },
                event_start_date: {
                    required: true
                },
                event_end_date: {
                    required: true
                },
                status: {
                    required: true
                },
                // Define rules for other fields
            },
            messages: {
                event_name: {
                    required: "Name is required field.",
                    minlength: "Name must be at least 3 characters"
                },
                event_sequence: {
                    required: "Squence is required field.",
                },
                event_start_date: {
                    required: "Start Date is required field.",
                },
                event_end_date: {
                    required: "End Date is required field.",
                },
                status: {
                    required: "Status is required field.",
                },
                // Define custom error messages for other fields
            }
        });
    });
</script>
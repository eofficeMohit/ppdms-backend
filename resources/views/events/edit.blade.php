<link href="{{ asset('assets') }}/css/custom.css" rel="stylesheet" />
<style>
    .slot {
        margin-bottom: 10px;
    }

</style>
<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="event.create"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Event Management"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Event Management</h6>
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
                            <div id="validation-success">
                            </div>
                            <div id="validation-errors">
                            </div>
                            {!! Form::model($event, ['id' => 'myForm']) !!}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        {!! Form::hidden('id', $event->id, ['class' => 'form-control event_id']) !!}
                                        <strong>Event Name:</strong>
                                        {!! Form::text('event_name', null, ['placeholder' => 'Event name', 'class' => 'form-control event_name']) !!}
                                        <span id="event_name_id" class="error"></span>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Event Sequence:</strong>
                                        {!! Form::number('event_sequence', null, [
                                        'placeholder' => 'Sequence number ',
                                        'class' => 'form-control event_sequence',
                                        ]) !!}
                                        <span id="event_seq_id" class="error"></span>
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
                                @if (count($eventslots) > 0)
                                <div id="time-slots">
                                    @foreach ($eventslots as $key => $value)
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            @if ($key == 0)
                                            <strong>Date:</strong>
                                            @endif
                                            {!! Form::input('date', 'start_date[]', $value['date'], ['id' => '', 'class' => 'form-control start_date']) !!}

                                        </div>
                                        <div class="col-md-2">
                                            @if ($key == 0)
                                            <strong>Start Time:</strong>
                                            @endif
                                            {!! Form::input('time', 'start_time[]', $value['start_time'], [
                                            'id' => '',
                                            'class' => 'form-control start_time',
                                            ]) !!}
                                        </div>
                                        <div class="col-md-2">
                                            @if ($key == 0)
                                            <strong>End Time:</strong>
                                            @endif
                                            {!! Form::input('time', 'end_time[]', $value['end_time'], ['id' => '', 'class' => 'form-control end_time']) !!}
                                        </div>
                                        <div class="col-md-2">
                                            @if ($key == 0)
                                            <strong>Locking Time:</strong>
                                            @endif
                                            {!! Form::input('time', 'locking_time[]', $value['locking_time'], ['id' => '', 'class' => 'form-control locking_time']) !!}
                                        </div>
                                        @if ($key == 0)
                                        <div class="col-md-3">
                                            <span class="btn btn-danger mt-4" onclick="addTimeSlot(this)" type="button">ADD</span>
                                        </div>
                                        @else
                                        <div class="col-md-3">
                                            <span class="btn btn-danger" onclick="removeTimeSlot(this)" type="button">REMOVE</span>
                                        </div>
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                @else
                                <div id="time-slots">
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <strong>Date:</strong>
                                            {!! Form::input('date', 'start_date[]', date('Y-m-d'), ['id' => '', 'class' => 'form-control start_date']) !!}

                                        </div>
                                        <div class="col-md-2">
                                            <strong>Start Time:</strong>
                                            {!! Form::input('time', 'start_time[]', date('H:i'), ['id' => '', 'class' => 'form-control start_time']) !!}
                                        </div>
                                        <div class="col-md-2">
                                            <strong>End Time:</strong>
                                            {!! Form::input('time', 'end_time[]', date('H:i'), ['id' => '', 'class' => 'form-control end_time']) !!}
                                        </div>
                                        <div class="col-md-2">
                                            <strong>Locking Time:</strong>
                                            {!! Form::input('time', 'locking_time[]', date('H:i',strtotime('30 minutes')), ['id' => '', 'class' => 'form-control locking_time']) !!}
                                        </div>
                                        <div class="col-md-3">
                                            <span class="btn btn-danger mt-4" onclick="addTimeSlot(this)" type="button">ADD</span>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="clearfix"></div>
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
{{-- <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    var today = new Date().toISOString().slice(0, 16);
    document.getElementsByClassName("start_date")[0].min = today;
    const timeSlots = document.getElementById('time-slots');

    function addTimeSlot() {

        const newRow = document.createElement('div');
        var now_date = "{{ date('Y-m-d') }}";
        var now_time = "{{ date('H:i') }}";
        var locking_time = "{{ date('H:i',strtotime('30 minutes')) }}";
        newRow.className = 'row mb-2';
        newRow.innerHTML = '<div class="col-md-3"><input min="' + now_date +
            '" class="form-control start_date" name="start_date[]" type="date" required value="' + now_date +
            '" onfocus="focused(this)" onfocusout="defocused(this)"></div>';
        newRow.innerHTML +=
            '<div class="col-md-2"><input class="form-control start_time" name="start_time[]" type="time" required value="' +
            now_time + '" onfocus="focused(this)" onfocusout="defocused(this)"></div>';
        newRow.innerHTML +=
            '<div class="col-md-2"><input class="form-control end_time" name="end_time[]" type="time" required value="' +
            now_time + '" onfocus="focused(this)" onfocusout="defocused(this)"></div>';
        newRow.innerHTML +=
            '<div class="col-md-2"><input class="form-control locking_time" name="locking_time[]" type="time" required value="' +
            locking_time + '" onfocus="focused(this)" onfocusout="defocused(this)"></div>';
        newRow.innerHTML +=
            '<div class="col-md-3"><span class="btn btn-danger" onclick="removeTimeSlot(this)" type="button">Remove</span></div>';
        timeSlots.appendChild(newRow);
    }
    // min="'+now_time+'"
    // min="'+now_time+'"
    function removeTimeSlot(button) {
        const row = button.closest('.row');
        row.remove();
    }
    $(document).ready(function() {
        $('#myForm').submit(function(e) {
            var form_id = "{{ $event->id }}";
            e.preventDefault();
            $('#event_name_id').html("");

            $('#event_seq_id').html("");
            $('#validation-success').html("");
            $('#validation-errors').html("");

            var id = parseInt($('.event_id').val());
            var event_name = $('.event_name').val();
            var event_sequence = $('.event_sequence').val();
            var flag = 0;
            if (event_name == "") {
                $('#event_name_id').html("Event Name is required.");
                flag = 1;
            }
            if (event_name == "") {
                $('#event_seq_id').html("Event Sequence is required.");
                flag = 1;
            }
            if (flag == 1) {
                return false;
            }
            $.ajax({
                type: 'POST'
                , url: '/event/update/' + form_id
                , data: $(this).serialize()
                , success: function(response) {
                    if (response.success) {
                        jQuery('#toast_body_msg').html('Event updated successfully.');
                        let myAlert = document.querySelector('.toast');
                        let bsAlert = new bootstrap.Toast(myAlert);
                        bsAlert.show();
                        setTimeout(function() {
                            window.location.href = "/events";
                        }, 2000);
                    } else {
                        $('#validation-errors').html('');
                        $.each(response.errors, function(key, value) {
                            var name = $("input[name='" + key + "']");
                            if (key.indexOf(".") != -1) {
                                var arr = key.split(".");
                                name = $("input[name='" + arr[0] + "[]']:eq(" + arr[1] + ")");
                            }
                            name.parent().append('<div class="error right-align pink-text text-mute">' + value[0] + '</div>');
                        });
                    }
                }
            });
        });
    });

</script>

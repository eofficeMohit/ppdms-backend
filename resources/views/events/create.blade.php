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
                                    <h3>Create New Event</h3>
                                        <div class="col-12 text-end">
                                            <a class="btn btn-primary" href="{{ route('events') }}"> Back</a>
                                        </div>
                                </div>
                            </div>
							<div id="validation-success">
							</div>
							<div id="validation-errors">
							</div>
                            {!! Form::open(array('id'=>'myForm')) !!}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Event Name:</strong>
                                        {!! Form::text('event_name', null, array('placeholder' => 'Event name','class' => 'form-control event_name')) !!}
										<span id="event_name_id" class="error"></span>
									</div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Event Sequence:</strong>
                                        {!! Form::number('event_sequence', null, array('placeholder' => 'Sequence number ','class' => 'form-control event_sequence')) !!}
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
                                <div id="time-slots">
                                    <div class="row mb-2">
                                        <div class="col-md-3">
                                            <strong>Date:</strong>
                                            {!! Form::input('date', 'start_date[]', date('Y-m-d'), ['id' => '', 'class' => 'form-control start_date']) !!}
											
                                        </div>
                                        <div class="col-md-3">
                                            <strong>Start Time:</strong>
                                            {!! Form::input('time', 'start_time[]', date('H:i'), ['id' => '', 'class' => 'form-control start_time']) !!}
                                        </div>
										<div class="col-md-3">
                                            <strong>End Time:</strong>
                                            {!! Form::input('time', 'end_time[]', date('H:i'), ['id' => '', 'class' => 'form-control end_time']) !!}
                                        </div>
                                        <div class="col-md-3">
											<span class="btn btn-danger mt-4" onclick="addTimeSlot(this)" type="button">ADD</span>
                                        </div>
                                    </div>  
                                </div>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	var today = new Date().toISOString().slice(0, 16);
	document.getElementsByClassName("start_date")[0].min = today;
	function addTimeSlot() {
		const timeSlots = document.getElementById('time-slots');
		const newRow = document.createElement('div');
		var now_date = "{{ date('Y-m-d') }}";
		var now_time = "{{ date('H:i') }}";
		newRow.className = 'row mb-2';
		newRow.innerHTML = '<div class="col-md-3"><input min="'+now_date+'" class="form-control start_date" name="start_date[]" type="date" required value="'+now_date+'" onfocus="focused(this)" onfocusout="defocused(this)"></div>';
		newRow.innerHTML += '<div class="col-md-3"><input min="'+now_time+'" class="form-control start_time" name="start_time[]" type="time" required value="'+now_time+'" onfocus="focused(this)" onfocusout="defocused(this)"></div>';
		newRow.innerHTML += '<div class="col-md-3"><input min="'+now_time+'" class="form-control end_time" name="end_time[]" type="time" required value="'+now_time+'" onfocus="focused(this)" onfocusout="defocused(this)"></div>';
		newRow.innerHTML += '<div class="col-md-3"><span class="btn btn-danger" onclick="removeTimeSlot(this)" type="button">Remove</span></div>';
		timeSlots.appendChild(newRow);
	}

	function removeTimeSlot(button) {
		const row = button.closest('.row');
		row.remove();
	}
    $(document).ready(function () {
            $('#myForm').submit(function (e) {
                e.preventDefault();
				$('#event_name_id').html("");
				$('#event_seq_id').html("");
				$('#validation-success').html("");
				$('#validation-errors').html("");
				var event_name = $('.event_name').val();
				var event_sequence = $('.event_sequence').val();
				var flag = 0;
				if(event_name == ""){
					$('#event_name_id').html("Event Name is required.");
					flag =1;
				}
				if(event_name == ""){
					$('#event_seq_id').html("Event Sequence is required.");
					flag =1;
				}
				if(flag == 1){
					return false;
				}	
                $.ajax({
                    type: 'POST',
                    url: '/event/store',
                    data: $(this).serialize(),
                    success: function (response) {
						if(response.success){
							console.log(response);
							$('#validation-success').append('<div class="alert alert-success">Event added successfully.</div'); 
							setTimeout(function(){
								window.location.href = "/events"; 
							}, 2000);
						} else {
							console.log(response.errors);
							$('#validation-errors').html('');
							$.each(response.errors, function(key,value) {
								$('#validation-errors').append('<div class="alert alert-danger">'+value+'</div');
							});
						}
                    }
                });
            });
        });
</script>
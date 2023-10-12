<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="dashboard-settings"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Create Settings"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Create New Setting</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                        <div class="col-12 text-end">
                                            <a class="btn btn-primary" href="{{ route('dashboard-settings') }}"> Back</a>
                                        </div>
                                </div>
                            </div>
							<div id="validation-success">
							</div>
							<div id="validation-errors">
							</div>
                            {!! Form::open(array('id'=>'myForm')) !!}
                            <div class="row">
                                <div id="add-fields">
                                    <div class="row mb-2">
                                        <div class="col-xs-5 col-sm-5 col-md-5">
                                            <strong>Setting Title:</strong>
                                            {!! Form::input('text', 'setting_title', '', ['id' => '','placeholder' => 'Setting Title', 'class' => 'form-control setting_title']) !!}
											<span class="error" id="set_lab_err"></span>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
											<span class="btn btn-danger mt-4" onclick="addField(this)">ADD</span>
                                        </div>
                                    </div>  
                                </div>
                            </div>    
                            <div class="clearfix"></div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
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
	function addField() {
		const timeSlots = document.getElementById('add-fields');
		const newRow = document.createElement('div');
		newRow.className = 'row mb-2';
		newRow.innerHTML = '<div class="col-md-5"><strong>Title:</strong><input required placeholder="Title" class="form-control label_cls" name="label[]" type="text" value=""><span class="error"></span></div>';
		newRow.innerHTML += '<div class="col-md-5"><strong>Value:</strong><input required placeholder="Value" class="form-control value_cls" name="value[]" type="text" value=""><span class="error"></span></div>';
		newRow.innerHTML += '<div class="col-md-2 mt-4"><span class="btn btn-danger" onclick="removeField(this)">Remove</span></div>';
		timeSlots.appendChild(newRow);
	}

	function removeField(button) {
		const row = button.closest('.row');
		row.remove();
	}
    $(document).ready(function () {
            $('#myForm').submit(function (e) {
                console.log('here');
                e.preventDefault();
				$('#validation-success').html("");
				$('#validation-errors').html("");
                $('#set_lab_err').html("");
				var settings_label = $('.setting_title').val();
				var flag = 0;
                const inputLables = document.querySelectorAll('input[name="label[]"]');
                const inputValues = document.querySelectorAll('input[name="value[]"]');
                //const labelsarr = [];
                console.log(inputLables.length);
                if(inputLables.length == 0){
                    $('#set_lab_err').html("Please add atleast one setting field.");
					flag =1;
                }
                if(settings_label == ""){
					$('#set_lab_err').html("Setting Title is required.");
					flag =1;
				}
                inputLables.forEach((field) => {
                    const errorContainer = field.nextElementSibling;
                    if (field.value.trim() === '') {
                        flag = 1;
                        errorContainer.textContent = 'This field is required.';
                    } else {
                        errorContainer.textContent = ''; // Clear the error message
                    }
                });
                inputValues.forEach((field) => {
                    const errorContainer = field.nextElementSibling;
                    if (field.value.trim() === '') {
                        flag = 1;
                        errorContainer.textContent = 'This field is required.';
                    } else {
                        errorContainer.textContent = ''; // Clear the error message
                    }
                });
				if(flag == 1){
					return false;
				}	
                $.ajax({
                    type: 'POST',
                    url: '/dashboard-settings/store',
                    data: $(this).serialize(),
                    success: function (response) {
						if(response.success){
							console.log(response);
							$('#toast_body_msg').html('Setting added successfully'); 
							let myAlert = document.querySelector('.toast');
                            let bsAlert = new  bootstrap.Toast(myAlert);
                            bsAlert.show();
							setTimeout(function(){
								window.location.href = "/dashboard-settings"; 
							}, 3000);
						} else {
							$('#validation-errors').html('');
							$.each(response.errors, function (key, value) {
                            var name = $("input[name='"+key+"']");
                            if(key.indexOf(".") != -1){
                                var arr = key.split(".");
                                name = $("input[name='"+arr[0]+"[]']:eq("+arr[1]+")");
                            }
                            name.parent().append('<div class="error right-align pink-text text-mute">'+value[0]+'</div>');
                            }); 
						}
                    }
                });
            });
        });
</script>
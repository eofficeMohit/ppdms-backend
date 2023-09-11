<style>
	.div1 {
		width: 240px;
		height: 75px;
		padding: 10px;
		border: 1px solid black;
		background-color: #F5F5F5;
	}
	p {
		font-size: 20px;
		font-weight: bold;
	}
	.gfg {
		font-size: 40px;
		color: #009900;
		font-weight: bold;
	}
    .div1{
        overflow-y: scroll;  
        height:500px; 
        width:400px;
    }
	</style>
<x-layout bodyClass="g-sidenav-show  bg-gray-200">

    <x-navbars.sidebar activePage="map_booth"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Booth Mapping"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Booth Mapping</h6>
                        </div>
                        <div class="card-body pt-4 p-3">
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
                            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>SO Officer:</strong>
                                        <select id="so_officer" name="so_officer">
                                        <option value="">--Select So Officer--</option>
                                        @foreach($users as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <strong>Assembly:</strong>
                                        <select id="sel_assembly" name="sel_assembly">
                                        <option value="">--Select Assembly--</option>
                                        @foreach($assembly as $key => $value)
                                        <option value="{{ $value->id }}">{{ $value->asmb_name }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                               
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div id="box_div1" class="box form-group" ondrop="dragDrop(event, this)" ondragover="allowDrop(event)">
                                        <strong>Un-assigned Booth:</strong>
                                        <ul class="div1" id="box1">
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div id="box_div2" class="box form-group" ondrop="dragDrop(event, this)" ondragover="allowDrop(event)">
                                        <strong>Assigned Booth:</strong>
                                        <ul class="div1" id="box2">
                                        </ul>
                                    </div>
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
<script>
function allowDrop(ev) {
    ev.preventDefault();
}
function dragStart(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}
function dragDrop(ev, target) {
    ev.preventDefault();
    var selectedAssem = document.getElementById('sel_assembly').value;
    var selectedOff = document.getElementById('so_officer').value;
    var data = ev.dataTransfer.getData("text");
    var booth_id = data;
    var box_type = target.id;
    if(selectedAssem && selectedOff){
        ev.target.appendChild(document.getElementById(data));
        map_booth(booth_id,box_type);
    } else {
        alert("Assembly and Officer are required fields.");
    }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.getElementById('sel_assembly').addEventListener('change', function() {
        var selectedOption = this.value;
        jQuery('#so_officer').find('option').not(':first').remove();
        // Make an AJAX request
        axios.get('{{ route('booths.getSoUsers') }}', {
            params: {
                selectedOption: selectedOption
            }
        })
        .then(function(response) {
            console.log(response);
            var so_users = response.data.so_users;
           // Iterate through the response and append data to the container
            so_users.forEach(function(value) {
                jQuery('#so_officer').append(jQuery('<option>').val(value.id).text(value.name))
            });
        })
        .catch(function(error) {
            console.error(error);
        });
    });
    document.getElementById('so_officer').addEventListener('change', function() {
        var selectedOfficer = this.value;
        var selectedAssem = document.getElementById('sel_assembly').value;
        jQuery('#box1').find('li').remove();
        jQuery('#box2').find('li').remove();
        // Make an AJAX request
        axios.get('{{ route('booths.getMapBooths') }}', {
            params: {
                selectedOfficer: selectedOfficer,
                selectedAssem: selectedAssem
            }
        })
        .then(function(response) {
            console.log(response.data);
            var ass_booths = response.data.ass_booths;
            var unass_booths = response.data.unass_booths;
            // Iterate through the response and append data to the container
            console.log('ass_booths',ass_booths);
            console.log('unass_booths',unass_booths);
            if(unass_booths){
                var i =1;
                unass_booths.forEach(function(value) {
                    jQuery('#box1').append('<li id="'+value.id+'" data-attr-booth = "'+value.id+'" draggable="true" ondragstart="dragStart(event)" >'+value.booth_name+'</li>');
                    i++;
                });
            }
            
            if(ass_booths){
                var j =1;
                ass_booths.forEach(function(value) {
                    jQuery('#box2').append('<li id="'+value.id+'" data-attr-booth = "'+value.id+'" draggable="true" ondragstart="dragStart(event)" >'+value.booth_name+'</li>');
                    j++;
                });
            }
        })
        .catch(function(error) {
            console.error(error);
        });
    });
    function map_booth(booth_id,box_type){
        var status = 0;
        if(box_type == "box_div2"){
            status = 1;
        } else {
            status = 0;
        }
        var selectedAssem = document.getElementById('sel_assembly').value;
        var selectedOff = document.getElementById('so_officer').value;
        // Make an AJAX request
        axios.post('{{ route('booths.mapOffBooths') }}', {
            params: {
                booth_id: booth_id,
                status: status,
                selectedAssem: selectedAssem,
                selectedOff: selectedOff,
            }
        })
        .then(function(response) {
            console.log(response.data);
            // Iterate through the response and append data to the container
            response.data.forEach(function(value) {
                jQuery('#booth_id').append(jQuery('<option>').val(value.id).text(value.booth_name))
            });
        })
        .catch(function(error) {
            console.error(error);
        });

    }
</script>

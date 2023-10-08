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
jQuery('#sel_assembly').on('change', function() {
    var selectedOption = this.value;
    jQuery('#so_officer').find('option').not(':first').remove();
    jQuery('#box1').find('li').remove();
    jQuery('#box2').find('li').remove();
    axios.get('booths/getSoUsers', {
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
jQuery('#so_officer').on('change', function() {
    var selectedOfficer = this.value;
    var selectedAssem = document.getElementById('sel_assembly').value;
    jQuery('#box1').find('li').remove();
    jQuery('#box2').find('li').remove();
    // Make an AJAX request
    axios.get('booths/getMapBooths', {
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
    axios.post('booths/mapOffBooths', {
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
    })
    .catch(function(error) {
        console.error(error);
    });

}

jQuery(document).ready(function() {
    jQuery("#parliament_manage_form").validate({
        rules: {
            pc_no: {
                required: true
            },
            pc_name: {
                required: true
            },
            pc_type: {
                required: true
            },
            state_id: {
                required: true
            },
            // Define rules for other fields
        },
        messages: {
            pc_no: {
                required: "PC Number is required field."
            },
            pc_name: {
                required: "PC Name is required field.",
            },
            pc_type: {
                required: "PC Type is required field.",
            },
            state_id: {
                required: "State is required field.",
            },
            // Define custom error messages for other fields
        }
    });
});

jQuery(document).ready(function() {
    jQuery("#state_manage_form").validate({
        rules: {
            st_code: {
                required: true
            },
            name: {
                required: true
            },
            status: {
                required: true
            },
            // Define rules for other fields
        },
        messages: {
            st_code: {
                required: "ST Code is required field."
            },
            name: {
                required: "State Name is required field.",
            },
            status: {
                required: "Status is required field.",
            },
            // Define custom error messages for other fields
        }
    });
});

jQuery(document).ready(function() {
    jQuery("#district_manage_form").validate({
        rules: {
            name: {
                required: true
            },
            d_code: {
                required: true
            },
            d_name_hindi: {
                required: true
            },
            state_id: {
                required: true
            },
            status: {
                required: true
            },
            // Define rules for other fields
        },
        messages: {
            name: {
                required: "District Name is required field."
            },
            d_code: {
                required: "District Code is required field.",
            },
            d_name_hindi: {
                required: "District Hindi Name is required field.",
            },
            state_id: {
                required: "State ID is required field.",
            },
            status: {
                required: "Status is required field.",
            },
            // Define custom error messages for other fields
        }
    });
});
$(document).ready(function() {
    $("#elecInfoForm").validate({
        rules: {
            state_id: {
                required: true
            },
            district_id: {
                required: true
            },
            booth_id: {
                required: true
            },
            assemble_id: {
                required: true
            },
            event_id: {
                required: true
            },
            // Define rules for other fields
        },
        messages: {
            state_id: {
                required: "State is required field."
            },
            district_id: {
                required: "District is required field.",
            },
            booth_id: {
                required: "Booth is required field.",
            },
            assemble_id: {
                required: "Assembly is required field.",
            },
            event_id: {
                required: "Event is required field.",
            },
            // Define custom error messages for other fields
        }
    });
});
jQuery(document).on('change', '.toggle_state_cls_assemble', function () {
    var id = jQuery(this).attr('data-id');
    var status = jQuery(this).prop('checked') == true ? 1 : 0; 
    // Make an AJAX request
    axios.get('assemblies/updateStatus', {
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

jQuery(document).on('change', '.toggle_state_cls_booth', function () {
    var id = jQuery(this).attr('data-id');
    var status = jQuery(this).prop('checked') == true ? 1 : 0; 
    // Make an AJAX request
    axios.get('booth/updateStatus', {
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
jQuery(document).on('change', '.toggle_state_cls_user', function () {
    var id = jQuery(this).attr('data-id');
    var status = jQuery(this).prop('checked') == true ? 1 : 0; 
    // Make an AJAX request
    axios.get('user/updateStatus', {
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
jQuery(document).on('change', '.toggle_state_cls_parliament', function () {
    var id = jQuery(this).attr('data-id');
    var status = jQuery(this).prop('checked') == true ? 1 : 0; 
    // Make an AJAX request
    axios.get('parliament/updateStatus', {
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
jQuery(document).on('change', '.toggle_state_cls_event', function () {
    var id = jQuery(this).attr('data-id');
    var status = jQuery(this).prop('checked') == true ? 1 : 0; 
    // Make an AJAX request
    axios.get('event/updateStatus', {
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
jQuery(document).on('change', '.toggle_state_cls_election', function () {
    var id = jQuery(this).attr('data-id');
    var status = jQuery(this).prop('checked') == true ? 1 : 0; 
    // Make an AJAX request
    axios.get('election/updateStatus', {
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
jQuery(document).on('change', '.toggle_state_cls_state', function () {
    var id = jQuery(this).attr('data-id');
    var status = jQuery(this).prop('checked') == true ? 1 : 0; 
    // Make an AJAX request
    axios.get('states/updateStatus', {
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
jQuery(document).on('change', '.toggle_state_cls_district', function () {
    var id = jQuery(this).attr('data-id');
    var status = jQuery(this).prop('checked') == true ? 1 : 0; 
    // Make an AJAX request
    axios.get('districts/updateStatus', {
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
jQuery(document).on('change', '.toggle_state_cls_settings', function () {
    var id = jQuery(this).attr('data-id');
    var status = jQuery(this).prop('checked') == true ? 1 : 0; 
    // Make an AJAX request
    axios.get('dashboard-settings/updateStatus', {
        params: {
            id: id,
            status: status
        }
    })
    .then(function(response) {
        console.log(response.data);
        jQuery(this).attr('data-id',id);
        $('#toast_body_msg').html('Status changed successfully'); 
        let myAlert = document.querySelector('.toast');
        let bsAlert = new  bootstrap.Toast(myAlert);
        bsAlert.show();
        setTimeout(function() { jQuery('.cus_msg_div').html(''); }, 3000);

        // Iterate through the response and append data to the container
    })
    .catch(function(error) {
        console.error(error);
    });
});
jQuery(document).on('change', '.toggle_state_cls_election_info', function () {
    var id = jQuery(this).attr('data-id');
    var assemble_id = $('#assemble_id :selected').val();
    var so_user = $('#so_user_id :selected').val();
    var booth_id = $('#booth_id :selected').val();
    var state_id = $('#state_id :selected').val();
    var district_id = $('#district_id :selected').val();
    var status = jQuery(this).prop('checked') == true ? 1 : 0; 
    var mock_poll_status = 0;
    var evm_cleared_status = 0;
    var vvpat_cleared_status = 0;
    var voting = 0;
    // Make an AJAX request
    if(id == 4){
        if(status == 1){
            $('#myModal').modal('show');
        } else {
            update_election_info(id,assemble_id,so_user,booth_id,state_id,district_id,status,mock_poll_status,evm_cleared_status,vvpat_cleared_status,voting);
        }
        
    } else if(id == 6){
        if(status == 1){
            $('#myModalVoting').modal('show');
        } else {
            update_election_info(id,assemble_id,so_user,booth_id,state_id,district_id,status,mock_poll_status,evm_cleared_status,vvpat_cleared_status,voting);
        }
    } else {    
        update_election_info(id,assemble_id,so_user,booth_id,state_id,district_id,status,mock_poll_status,evm_cleared_status,vvpat_cleared_status,voting);
    }
    
});

function submit_voting(){
    var id = 6;
    var assemble_id = $('#assemble_id :selected').val();
    var so_user = $('#so_user_id :selected').val();
    var booth_id = $('#booth_id :selected').val();
    var state_id = $('#state_id :selected').val();
    var district_id = $('#district_id :selected').val();
    var status = jQuery("event_"+id).prop('checked') == true ? 1 : 0;
    jQuery('#voting_error').html("");
    if ($('#voting').val() == "") {
        jQuery('#voting_error').html("Field is required.");
        return false; // allow whatever action would normally happen to continue
    }else {
        var mock_poll_status = 0;
        var evm_cleared_status = 0;
        var vvpat_cleared_status = 0;
        var voting =$('#voting').val();
        update_election_info(id,assemble_id,so_user,booth_id,state_id,district_id,status,mock_poll_status,evm_cleared_status,vvpat_cleared_status,voting);
        $('#myModalVoting').modal('hide');
    } 
    
}

function submit_mockpoll_status(){
    var id = 4;
    var assemble_id = $('#assemble_id :selected').val();
    var so_user = $('#so_user_id :selected').val();
    var booth_id = $('#booth_id :selected').val();
    var state_id = $('#state_id :selected').val();
    var district_id = $('#district_id :selected').val();
    var status = jQuery("event_"+id).prop('checked') == true ? 1 : 0;
    jQuery('#err_pop').html("");
    if ($('input[name=mock_poll_status]:checked').length == 0) {
        jQuery('#err_pop').html("All fields are required.");
        return false; // allow whatever action would normally happen to continue
    }else if($('input[name=evm_cleared_status]:checked').length == 0){
        jQuery('#err_pop').html("All fields are required.");
        return false; // stop whatever action would normally happen
    } else if($('input[name=vvpat_cleared_status]:checked').length == 0){
        jQuery('#err_pop').html("All fields are required.");
        return false; // stop whatever action would normally happen
    } else {
        var mock_poll_status = $('input[name=mock_poll_status]:checked').val();
        var evm_cleared_status = $('input[name=evm_cleared_status]:checked').val();
        var vvpat_cleared_status = $('input[name=vvpat_cleared_status]:checked').val();
        var voting =0;
        update_election_info(id,assemble_id,so_user,booth_id,state_id,district_id,status,mock_poll_status,evm_cleared_status,vvpat_cleared_status,voting);
        $('#myModal').modal('hide');
    } 
    
}    
function update_election_info(id,assemble_id,so_user,booth_id,state_id,district_id,status,mock_poll_status,evm_cleared_status,vvpat_cleared_status,voting){
    axios.post('/election-info/updateEventToggle', {
        params: {
            event_id: id,
            assemble_id: assemble_id,
            so_user: so_user,
            booth_id: booth_id,
            district_id: district_id,
            state_id:state_id,
            mock_poll_status:mock_poll_status,
            evm_cleared_status:evm_cleared_status,
            vvpat_cleared_status:vvpat_cleared_status,
            status: status,
            voting:voting
        }
    })
    .then(function(response) {
        console.log(response.data);
        jQuery('.error_toggle_cls').html("");
        if(response.data.success){
            jQuery('.cus_msg_div').html('<p class="alert alert-success">Election Info added successfully.</p>');
            jQuery('#'+response.data.key).html("<p style='color:green; font-size:15px;'>"+response.data.message+"</p>");
            get_all_events_data(assemble_id,so_user,booth_id);
        } else {
            jQuery('#'+response.data.key).html("<p style='color:red; font-size:15px;'>"+response.data.message+"</p>");
            jQuery("#event_"+id).prop('checked',false);
        }

        // Iterate through the response and append data to the container
    })
    .catch(function(error) {
        console.error(error);
    });

    function get_all_events_data(selected_assemble,selected_user,selected_booth){
        axios.get('/event/getEventsForEInfo', {
            params: {
                selected_assemble: selected_assemble,
                selected_user: selected_user,
                selected_booth: selected_booth
            }
        })
        .then(function(response) {
            console.log(response.data);
            jQuery('#add-fields').empty();
            // Iterate through the response and append data to the container
            response.data.forEach(function(value) {
                var checked = "";
                var disabled = "";
                var present_id = value.id;
                var last_id = "";
                if(value.is_updated == "yes"){
                    var checked = "checked";
                    var disabled = "disabled";
                } else {
                    last_id = parseFloat(present_id) - parseFloat(1);
                }
                jQuery('#event_'+last_id).prop('disabled',false);
                const timeSlots = document.getElementById('add-fields');
                const newRow = document.createElement('div');
                newRow.className = 'row mb-2';
                newRow.innerHTML = '<div class="col-md-12"><strong>'+value.name+'</strong><br><label class="switch"><input '+disabled+' data-id="'+value.id+'" id="event_'+value.id+'" class="toggle_state_cls_election_info form-control" '+checked+' type="checkbox"><span class="slider round"></span></label><span class="error_toggle_cls" id="error_'+value.id+'"></span></div>';
                timeSlots.appendChild(newRow);
            });
        })
        .catch(function(error) {
            console.error(error);
        });
        
    }  

}

jQuery(document).on('click', '.mark_as_read', function () {
    var id = jQuery(this).attr('data-id');
    axios.post('/notifications/updateStatus', {
        params: {
            id: id,
        }
    })
    .then(function(response) {
        console.log(response.data);
        let myAlert = document.querySelector('.toast');
        let bsAlert = new  bootstrap.Toast(myAlert);
        bsAlert.show();
        //setTimeout(function() { location.reload(); }, 2000);
    })
    .catch(function(error) {
        console.error(error);
    });
});
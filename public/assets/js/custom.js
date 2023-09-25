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
        jQuery('.cus_msg_div').html('<p class="alert alert-success">Status changed successfully.</p>');
        setTimeout(function() { jQuery('.cus_msg_div').html(''); }, 3000);

        // Iterate through the response and append data to the container
    })
    .catch(function(error) {
        console.error(error);
    });
});

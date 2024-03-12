$(function() {
    getUsers();

    $('#inputSearch').on('keyup change', function() {
        let searchTerm = $(this).val().trim();
        getUsers();
    });
    
});

function getUsers(pageNumber) {
    $.ajax({
        type: "GET",
        url: getUserURL,
        data: {
            'search': $('#inputSearch').val(),
            'page': pageNumber,
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status == 'success') {
                let html = '';
                if (response.users.data.length > 0) {
                    $.each(response.users.data, function (key, val) {
                        html += '<div class="col-md-6">'+
                            '<div class="user-card">'+
                                '<h5 class="user-card_name">'+
                                    val.name+
                                '</h5>'+
                                '<h5 class="user-card_department">'+
                                    val.department.name+
                                '</h5>'+
                                '<h6 class="user-card_designation">'+
                                    val.designation.name+
                                '</h6>'+
                                '<div class="edit-btn-group">'+
                                    '<a href="javascript:void(0)" title="Edit" class="edit-btn" data-id="' + val.id + '" data-name="' + val.name +'">'+
                                        '<i class="far fa-edit">'+
                                        '</i>'+
                                    '</a>'+
                                '</div>'+
                            '</div>'+
                        '</div>';
                    });
                } else {
                    html +='<span class="no-result">'+
                        'No users found!'+
                    '</span>';
                }
                
                $('.user-details').html(html);
                // console.log(response.users.total);
                if (response.users.total > 8) { 
                    $('.pagination').html(''); 
                    for (let i = 1; i <= Math.ceil(response.users.total / 8); i++) {
                        $('.pagination').append('<button onclick="getUsers(' + i + ')">' + i + '</button>');
                    }
                } 
            }
        },
        error: function (error) {
            toastr.error("Something went wrong.", 'Error');
        }
    });
}

$("#myModal").on("hidden.bs.modal", function(){
    $('#user_form').validate().resetForm();
});

function getDepartments() {
	$('#department_id').html('');
	$.ajax({
		type: "GET",
		url: getDepartmentsURL,
		data: {
            'id': $('#id').val()
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status == 'success') {
                $.each(response.departments, function (key, val) {
                    let title = 'Select Department';
                    let titleOption = new Option(title,"", true,true);
                    $('#department_id').append(titleOption).trigger('change');
                    let newOptionDepartment = new Option(val.name, val.id, false, false);
                    $('#department_id').append(newOptionDepartment).trigger('change');
                });
                if ($('#id').val() > 0) { //for edit case
                    $('#department_id').val(response.department.department_id).trigger('change');
                }
            } else {
                toastr.error(response.message, 'Error');
            } 
        },
        error: function (error) {
            console.log(error);
        }
	});
}

function getDesignations() {
	$('#designation_id').html('');
	$.ajax({
		type: "GET",
		url: getDesignationsURL,
		data: {
            'id': $('#id').val()
        },
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            if (response.status == 'success') {
                $.each(response.designations, function (key, val) {
                    let title = 'Select Designation';
                    let titleOption = new Option(title,"", true,true);
                    $('#designation_id').append(titleOption).trigger('change');
                    let newOptionDesignation = new Option(val.name, val.id, false, false);
                    $('#designation_id').append(newOptionDesignation).trigger('change');
                });
                if ($('#id').val() > 0) { 
                    $('#designation_id').val(response.designation.designation_id).trigger('change');
                }
            } else {
                toastr.error(response.message, 'Error');
            } 
        },
        error: function (error) {
            console.log(error);
        }
	});
}

$(document).on('click', '.add-btn', function () {
	$('#user_form').trigger("reset");
	$('.modal-title').html('Add User');
	$("label.error").hide();
    $(".error").removeClass("error");
    $("#id").val('');
    $('#department_id').select2({ 
        placeholder: 'Select Department'
    });
    $('#designation_id').select2({ 
        placeholder: 'Select Designation'
    });
    getDepartments();
    getDesignations();
});

$(document).on('click', '.edit-btn', function () {
    let name = $(this).attr('data-name');
    let id = $(this).attr('data-id');
    $('.modal-title').html('Edit User');
    $("label.error").hide();
    $(".error").removeClass("error");
    $('#name').val(name);
    $('#id').val(id);
    $('#myModal').modal('toggle');
    $('#department_id').select2({ 
        placeholder: 'Select Department'
    });
    $('#designation_id').select2({ 
        placeholder: 'Select Designation'
    });
    getDepartments();
    getDesignations();
});

$('#user_form').validate({
	rules: {
		name: {
			required: true,
		},
		department_id: {
			required: true,
		},
		designation_id: {
			required: true,
		},
	},
	messages: {
		name: {
			required: 'Enter Name.',
		},
		department_id: {
			required: 'Select Department.',
		},
		designation_id: {
			required: 'Select Designation.',
		},
	},
	errorPlacement: function(error, element) {
        if(element.hasClass('select2') && element.next('.select2-container').length) {
            error.insertAfter(element.next('.select2-container'));
        } else {
            if(element.parent().hasClass('input-group')) { //input fields with icon
                element.parent().after(error);
            } else {
                element.after(error);
            }
        }
    },
    submitHandler: function (form, e) {
    	e.preventDefault();
        $('#cover-spin').show();
        let formData = $('#user_form').serializeArray();
        $.ajax({
        	type: "POST",
        	url: saveURL,
        	data: formData,
        	headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
            	$('#cover-spin').hide();
            	if (response.status == 'success') {
            		$('#myModal').modal('toggle');
                    $('#company_form').trigger("reset");
                    $('#status').prop('checked', true).change();
                    toastr.success(response.message, 'Success');
                    getUsers();
            	} else if (response.status == 'validationError') {
             		$.each(response.messages, function (index, value) {
                        $("input[name='" + index + "']").after('<label class="error">' + value[0] + '</label>');
                        if (index == 'department_id') {
                        	$("select[name='" + index + "']").after('<label class="error">' + value[0] + '</label>');
                        }
                        if (index == 'designation_id') {
                        	$("select[name='" + index + "']").after('<label class="error">' + value[0] + '</label>');
                        }
                    });
             	} else if (response.status == 'error') {
             		toastr.error("Something went wrong.", 'Error');
             	}
            },
            error: function (error) {
                $('#cover-spin').hide();
	            toastr.error("Something went wrong.", 'Error');
	        }
        });
    }
 });
$(function() {
	getDepartments();
	var table = "";
});

function getDepartments() {
	table = $('#department_table').DataTable({
        processing: true,
        serverSide: true,
        ordering: false,
        stateSave: true,
        ajax: tableURL,
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        dom: 'Bfrtpli',
        buttons: [
        ],
        initComplete: function () {
            var exportButton = $('.dt-button');
            exportButton.removeClass('dt-button');
        },
        columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                searchable: false,
                orderable: false
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'actions',
                name: 'actions'
            },
        ]
    });
}


$(document).on('click', '.add-btn', function () {
	$('#department_form').trigger("reset");
	$('.modal-title').html('Add Department');
	$("label.error").hide();
    $(".error").removeClass("error");
    $("#id").val('');
});

$(document).on('click', '.edit-btn', function() {
	$("label.error").hide();
    $(".error").removeClass("error");
    $('#cover-spin').show();
    $.ajax({
    	type: "GET",
    	url: getURL,
    	data: {
    		'id' : $(this).attr('data-id')
    	},
    	headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
        	$('#cover-spin').hide();
        	if (response.status == 'success') {
                let data = response.data;
                $('.modal-title').html('Edit Department');
        		$('#id').val(data.id);
                $('#name').val(data.name);
        	    $('#myModal').modal('toggle');
            } else {
        		toastr.error(response.message, 'Error!');
        	}
        },
        error: function (error) {
            toastr.error("Something went wrong", 'Error!');
            $('#cover-spin').hide();
            $("#submit").prop('disabled', false);
        }
    });
});

$('#department_form').validate({
	submitHandler:function(form, e) {
		e.preventDefault();
		$('#cover-spin').show();
		$.ajax({
			type: "POST",
			url: saveURL,
			data: {
				'id': $('#id').val(),
				'name': $('#name').val(),
			},
			headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
            	$('#cover-spin').hide();
            	if (response.status == 'success') {
            		$('#myModal').modal('toggle');
                    $('#department_form').trigger("reset");
                    toastr.success(response.message, 'Success');
                    table.ajax.reload();
             	} else if (response.status == 'validationError') {
             		$.each(response.messages, function (index, value) {
                        $("input[name='" + index + "']").after('<label class="error">' + value[0] + '</label>');
                    });
             	} else if (response.status == 'error') {
             		toastr.error("Something went wrong.", 'Error');
             	}
            },
            error: function (error) {
                toastr.error("Something went wrong");
                $('#cover-spin').hide();
                $("#form_submit").prop('disabled', false);
            }
		});
	},
});

$(document).on('click', '.delete-btn', function(){
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $('#cover-spin').show();
            $.ajax({
                type: "DELETE",
                data: {
                    'id': $(this).attr('data-id')
                },
                url: deleteURL,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    $('#cover-spin').hide();
                    if (response.status == "success") {
                        table.destroy();
                        Swal.fire({
                            title: "Deleted",
                            text: response.message,
                            type: "success",
                            icon: "success"
                        }).then(function () {
                            getDepartments();
                        });
                    } else if (response.status == 'validationError') {
                        Swal.fire({
                            title: "Sorry!",
                            text: response.message,
                            type: "error",
                            icon: 'error'
                        });
                    } else if (response.status == 'error') {
                        Swal.fire({
                            title: "Sorry!",
                            text: "Something went wrong.",
                            type: "error",
                            icon: 'error'
                        });
                    }
                },
                error: function (error) {
                    loadEnd();
                    Swal.fire({
                        title: "Sorry!",
                        text: "Something went wrong.",
                        type: "error",
                        icon: 'error'
                    });
                }
            });
        }
    })
});
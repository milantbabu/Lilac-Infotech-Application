$(function(){

    // for password change confirmation [starts]
   $(document).on('change','#change_password',function(){
        if($(this).prop('checked')){
            $("#user_password").removeAttr("disabled");
            $("#confirm_password").removeAttr("disabled");
        }
        else{
            $("#user_password").val('');
            $("#user_password").attr("disabled","disabled");
            $("#confirm_password").val('');
            $("#confirm_password").attr("disabled","disabled");
            // to remove the error class [Starts]
            $("label#user_password-error").hide();
            $("input#user_password").removeClass("error");
            $("label#confirm_password-error").hide();
            $("input#confirm_password").removeClass("error");
            // to remove the error class [Ends]
        }
    });
    // for password change confirmation [ends]

    $('#profile_form').validate({
        rules:{
            name:{
                required:true,
            },
            email:{
                email: true,
                required:true,
            },
            user_password: {
                required: true
            },
            confirm_password: {
                required: true,
                equalTo: '#user_password',
            },

        },
        messages:{
            name:{
                required: "Enter Name",
            },
            email:{
                required: "Enter Email ID",
            },
            user_password:{
                required: "Enter Password",
            },
            confirm_password:{
                required: "Enter Confirmation Password",
                equalTo: "Password Mismatch!"
            },
        },
        errorPlacement: function(error, element) {
          if(element.parent().hasClass('input-group')) { //input fields with icon
              element.parent().after(error);
          } else {
              element.after(error);
          }
        },
        submitHandler:function(form,e){
            e.preventDefault();
            $('#cover-spin').show(); //loader
            var formData = $('#profile_form').serializeArray();
            // console.log(formData);
            $.ajax({
                type:"POST",
                url:saveURL,
                data: formData,
                dataType: "json",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(output){
                    $('#cover-spin').hide(); //loader
                    if(output.status=='success'){
                        setTimeout(function(){
                            window.location.replace(output.next);
                        });
                    }
                    else {
                        $.each(output.messages, function (key, val) {
                           toastr.error(val, 'Error!');
                        });
                    }
                },
                error: function (error) {
                    console.log(error);
                }
            });
        }
    });

});

$(document).ready(function (){
    var base_url = $('input[name="base_url"]').val();
    let strElement = '';

    $(document).on('click','.close', function(){
        $(this).parents('.modal').modal('hide');
    });

    $('#change-password-btn').click(function(){
        $('#change-password-form').submit();
    });

    $('#change-password-form').submit(function (e){
        e.preventDefault();
        var old_pas = $('#old_password').val().trim();
        var new_pas = $('#n_password').val().trim();
        var confirm_pas = $('#c_password').val().trim();

        if(old_pas == "" || new_pas == ""  || confirm_pas == "" ){
            swal.fire('ERROR', 'Please fill up the form accordingly.', 'error');
        }
        else if(new_pas != confirm_pas){
            swal.fire('ERROR', 'Invalid Confirmation Password.', 'error');
        }
        else{
            $.ajax({
                url: `${base_url}general/changepassword`,
                type: 'POST',
                data: new FormData(this),
                cache: false,
                contentType: false,
                processData: false,
                success: function(res){
                    response = JSON.parse(res);
                    if(response.status){
                        swal.fire({
                            title: "",
                            html:`<h3>Successfully Updated Password.</h3>`,
                            icon: "success",
                            button: "Proceed"
                        }).then(function(){
                            location.reload();
                        });
                    }else{
                        swal.fire('ERROR', 'Invalid Old Password.', 'error');
                    }
                }
            });
        }
    });


    $(document).on('click','#logout-from-familytofamily', function(){
        $.ajax({
            type: 'POST',
            url: `${base_url}logout`,
            async: false,
            beforeSend: function (){
                strElement = `<div class="spinner-border" id="custom-spinner-in-logout" role="status"><span class="sr-only">Loading...</span></div> Logging Out...`;
                $('#logout-from-familytofamily').html(strElement);
            },
            success: function (response) {
                parse_res = JSON.parse(response);
               if(parse_res.status){
                 window.location = `${base_url}login`;
               }else{
                swal.fire('', 'An error has occured logging out.', 'error');
               }
            },
            error: function (err) {
                swal.fire('', 'An error has occured logging out.', 'error');
            }
        });
    });
});
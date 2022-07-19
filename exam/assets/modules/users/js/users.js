var base_url = $('input[name="base_url"]').val();
$(document).ready(function() {

    usersTable();

    // Datepicker
    $('.birthdate').datepicker();

    $(document).on('submit', '#form_addUser', function(e) {
        e.preventDefault();
        clearError();
        var files = $('input[name="job_description"]').val();
        if(files == '') {
            $('.fileSelected').parent().next('.err').html('Job Description Required');
        }
    });

    $(document).on('submit', '#form_updateUser', function(e) {
        e.preventDefault();
        clearError();
        var files = $('input[name="job_description"]').val();
        if(files == '') {
            var form_data = new FormData($('.form_updateUser')[0]);
            var sendAjaxVar = sendAjax({ url: base_url + 'users/updateUser', data: form_data }, false);
            if (sendAjaxVar) {
                clearError();
                if (sendAjaxVar.status == "success") {
                    swal(sendAjaxVar.msg, sendAjaxVar.status);
                    $('.form_updateUser')[0].reset();
                    usersTable();
                    $('#modal_updateUser').modal('hide');
                } else {
                    $.each(sendAjaxVar, function (key, value) {
                        $('input[name="' + key + '"]').next('.err').html(value);
                        $('textarea[name="' + key + '"]').next('.err').html(value);
                        $('select[name="' + key + '"]').next('.err').html(value);
                    });
                }
            }
        }
    });

    $('#form_addUser, #form_updateUser').fileupload({
        acceptFileTypes: /(\.|\/)(pdf)$/i,
        autoUpload: false,
        add: function(e, data) {
            $('.fileSelected').val(data.files[0].name);
            $(document).on('submit','.form_addUser',function(e){
                e.preventDefault();
                var form_data = new FormData($('.form_addUser')[0]);
                form_data.append( 'job_description', data.files[0]);
                var sendAjaxVar = sendAjax({ url: base_url + 'users/addUser', data: form_data }, false);
                if (sendAjaxVar) {
                    clearError();
                    if (sendAjaxVar.status == "success") {
                        
                        swal(sendAjaxVar.msg, sendAjaxVar.status);
                        $('.form_addUser')[0].reset();
                        usersTable();
                        $('#modal_addUser').modal('hide');
                    } else {
                        $.each(sendAjaxVar, function (key, value) {
                            $('input[name="' + key + '"]').next('.err').html(value);
                            $('textarea[name="' + key + '"]').next('.err').html(value);
                            $('select[name="' + key + '"]').next('.err').html(value);
                        });
                    }
                }
                
            });

            $(document).on('submit','.form_updateUser',function(e){
                e.preventDefault();
                var form_data = new FormData($('.form_updateUser')[0]);
                form_data.append( 'job_description', data.files[0]);
                var sendAjaxVar = sendAjax({ url: base_url + 'users/updateUser', data: form_data }, false);
                if (sendAjaxVar) {
                    clearError();
                    if (sendAjaxVar.status == "success") {
                        swal(sendAjaxVar.msg, sendAjaxVar.status);
                        $('.form_updateUser')[0].reset();
                        usersTable();
                        $('#modal_updateUser').modal('hide');
                    } else {
                        $.each(sendAjaxVar, function (key, value) {
                            $('input[name="' + key + '"]').next('.err').html(value);
                            $('textarea[name="' + key + '"]').next('.err').html(value);
                            $('select[name="' + key + '"]').next('.err').html(value);
                        });
                    }
                }
            });
           
        },
    });

    $(document).on('click','.updateUser',function(){
        user_id = $(this).data('id');
        var data = sendAjax({ url: base_url + 'users/getUserInfo', data: { user_id: user_id}});
        $('.form_updateUser')[0].reset();
        input('input[name="user_id"]', user_id);
        input('input[name="fullname"]', data.fullname);
        input('input[name="birthdate"]', data.birthdate);
        input('input[name="salary"]', data.salary);
        input('textarea[name="description"]', data.description);
        input('input[name="current_job_description"]', data.job_description);
        $('.form_addUser')[0].reset();
    });

    $(document).on('click','.removeUser',function(e){
        e.preventDefault();
        var user_id = $(this).data('id');
        confirm_swal('Are you sure you want to remove this User?', 'Remove').then(function (val) {
            if (val === true) {
                const sendAjaxVar = sendAjax({
                    url: base_url + 'users/removeUser',
                    data: { user_id: user_id }
                });
                if (sendAjaxVar) {
                    swal(sendAjaxVar.msg, sendAjaxVar.type);
                    usersTable();
                }
            }
        });
    });

    $(document).on('focus','.salary', function() {
        $(this).val('');
    });

    $(document).on('change','.salary', function() {
        $(this).val( '$' + $(this).val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
    });

    $(document).on('click', '.exportPDF', function() {
        window.open(base_url+'users/exportPDF', '_blank'); 
    });


}); // End of Document Ready


function usersTable() {
    $('#usersTable').DataTable({
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "responsive": true,
        "destroy":    true,
        "order": [[0, 'desc']], //Initial no order.
        "columns": [
            { "data": "user_id", "width":"5%"},
            { "data": "fullname", "width":"20%" },
            { "data": "birthdate", "width":"15%" },
            { "data": "salary", "width":"15%" },
            { "data": "description", "width":"15%" },
            {
                "data": "job_description", "width":"20%", "render": function (data, type, row, meta) {
                    var str = '';
                    str += `<a href="${base_url+'assets/uploads/pdf/'+row.job_description}" target="_blank">${row.job_description}</a>`;
                    return str;
                }
            },
            {
                "data": "user_id", "width":"15%", "render": function (data, type, row, meta) {
                    var str = '';
                    str += '<button data-bs-toggle="modal" data-bs-target="#modal_updateUser" data-id="'+row.user_id+'" class="btn btn-sm btn-outline-warning updateUser" title="Click to update"><i class="fa fa-edit"></i></button>&nbsp;';
                    str += '<button data-id="'+row.user_id+'" class="btn btn-sm btn-outline-danger removeUser" title="Click to remove"><i class="fa fa-times-circle"></i></button>';
                    return str;
                }
            },
        ],
        "language": { "search": '', "searchPlaceholder": "Search keyword...","infoFiltered": "" },
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url + "users/getUsersList",
            "type": "POST",
        },
        //Set column definition initialisation properties.
        "columnDefs": [
            {
                "targets": [5,6], //first column / numbering column
                "orderable": false, //set not orderable
            },
        ],
    });
}

function sendAjax(param = {},isReturn = true){
    if(isReturn === false){
        var return_response = null;
        $.ajax({
            url:param.url,
            type: 'post',
            data:param.data,
            async:false,
            processData: false,
            contentType: false,
            dataType:'json',
            beforeSend: function() {
              $('.overlay').show();
            },
            success:function(response){
                $('.overlay').hide();
                console.log(response);
                return_response = response;
            },error:function(e){
                console.log(e);
            }
        });
        return return_response;
    } else {
        var return_data = null;
        $.ajax({
            url:param.url,
            type: 'post',
            data:param.data,
            async:false,
            dataType:'json',
            success:function(response){
                return_data = response;
            },error:function(e){
                console.log(e);
            }
        });

        if(isReturn){
            return return_data;
        }
    }
}

function confirm_swal(text,confirmBtnText){
    var isSuccess = false;
    return new Promise(function(resolve, reject) {
        Swal.fire({
            title: 'Are you sure?',
            text: text,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: confirmBtnText
        }).then((result) => {
            if (result.value) {
                resolve(true);
            } else {
                resolve(false);
            }
        });
   });
}

function swal(content,response = 'success'){
    if(response == 'success'){
        Swal.fire("Success",content,response);
    }else{
        Swal.fire("Error",content,response);
    }
}

function clearError() {
    $('.err').html('');
}

function input(element,value){
    $(element).val(value);
}
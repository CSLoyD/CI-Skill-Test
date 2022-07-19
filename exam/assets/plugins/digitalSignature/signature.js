var canvas_1 = document.getElementsByClassName('signature-pad')[0];
var canvas_2 = document.getElementsByClassName('signature-pad')[1];
var canvas_3 = document.getElementsByClassName('signature-pad')[2];
var canvas_4 = document.getElementsByClassName('signature-pad')[3];
var canvas_5 = document.getElementsByClassName('signature-pad')[4];
var signaturePad_1 = new SignaturePad(canvas_1, {
  backgroundColor: 'rgb(255, 255, 255)'
});
var signaturePad_2 = new SignaturePad(canvas_2, {
  backgroundColor: 'rgb(255, 255, 255)'
});
var signaturePad_3 = new SignaturePad(canvas_3, {
  backgroundColor: 'rgb(255, 255, 255)'
});
var signaturePad_4 = new SignaturePad(canvas_4, {
  backgroundColor: 'rgb(255, 255, 255)'
});
var signaturePad_5 = new SignaturePad(canvas_5, {
  backgroundColor: 'rgb(255, 255, 255)'
});

function resizeCanvas() {
    var ratio =  Math.max(window.devicePixelRatio || 1, 1);
    canvas_1.width = canvas_1.offsetWidth * ratio;
    canvas_1.height = canvas_1.offsetHeight * ratio;
    canvas_1.getContext("2d").scale(ratio, ratio);
    canvas_1.getContext("2d").lineWidth = 1;

    canvas_2.width = canvas_2.offsetWidth * ratio;
    canvas_2.height = canvas_2.offsetHeight * ratio;
    canvas_2.getContext("2d").scale(ratio, ratio);

    canvas_3.width = canvas_3.offsetWidth * ratio;
    canvas_3.height = canvas_3.offsetHeight * ratio;
    canvas_3.getContext("2d").scale(ratio, ratio);

    canvas_4.width = canvas_4.offsetWidth * ratio;
    canvas_4.height = canvas_4.offsetHeight * ratio;
    canvas_4.getContext("2d").scale(ratio, ratio);

    canvas_5.width = canvas_5.offsetWidth * ratio;
    canvas_5.height = canvas_5.offsetHeight * ratio;
    canvas_5.getContext("2d").scale(ratio, ratio);
}

window.onresize = resizeCanvas;
resizeCanvas();

// save
// $(document).on('click','.save_one',function(e){
//     if (signaturePad_1.isEmpty()) {
//       return alert("Please provide Student Signature.");
//     }
//     var data = signaturePad_1.toDataURL('image/png');
//     $('input[name="student_signature"]').val(data);
//     $(this).hide();
// });
// $(document).on('click','.save_two',function(e){
//     if (signaturePad_2.isEmpty()) {
//       return alert("Please provide Direct Service Worker Signature.");
//     }
//     var data = signaturePad_2.toDataURL('image/png');
//     $('input[name="dsw_signature"]').val(data);
//     $(this).hide();
// });
// $(document).on('click','.save_three',function(e){
//     if (signaturePad_3.isEmpty()) {
//       return alert("Please provide Employee Signature.");
//     }
//     var data = signaturePad_3.toDataURL('image/png');
//     $('input[name="employee_signature"]').val(data);
//     $(this).hide();
// });
// $(document).on('click','.save_four',function(e){
//     if (signaturePad_4.isEmpty()) {
//       return alert("Please provide Supervisor Signature.");
//     }
//     var data = signaturePad_4.toDataURL('image/png');
//     $('input[name="supervisor_signature"]').val(data);
//     $(this).hide();
// });

// clear
// $(document).on('click','.clear_one',function(e){
//     signaturePad_1.clear();
//     $('.save_one').show();
//     $('input[name="student_signature"]').val('');
// });
// $(document).on('click','.clear_two',function(e){
//     signaturePad_2.clear();
//     $('.save_two').show();
//     $('input[name="dsw_signature"]').val('');
// });
// $(document).on('click','.clear_three',function(e){
//     signaturePad_3.clear();
//     $('.save_three').show();
//     $('input[name="employee_signature"]').val('');
// });
// $(document).on('click','.clear_four',function(e){
//     signaturePad_4.clear();
//     $('.save_four').show();
//     $('input[name="supervisor_signature"]').val('');
// });

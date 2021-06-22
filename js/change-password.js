$('#_pass1').change(function(){
	validateText( $('#_pass1').val().trim(), 3, '#_pass1', '.msg-pass1', 'Debe escribir una contraseña de almenos 3 carácteres');
});

$('#_pass1').focusout(function(){
	validateText( $('#_pass1').val().trim(), 3, '#_pass1', '.msg-pass1', 'Debe escribir una contraseña de almenos 3 carácteres');
});

$('#_pass2').change(function(){
	validateText( $('#_pass2').val().trim(), 3, '#_pass2', '.msg-pass2', 'Debe escribir una contraseña de almenos 3 carácteres');
	let pass1 = $('#_pass1').val().trim();
	let pass2 = $('#_pass2').val().trim();

	if(pass1 === pass2){
		$('.msg-pass2 .error-msg').text('La nueva contraseña no puede ser igual a la actual.');
        $('.msg-pass2').removeClass('hidden');
	}else{
		$('.msg-pass2 .error-msg').text('');
        $('.msg-pass2').addClass('hidden');
	}
});

$('#_pass2').focusout(function(){
	validateText( $('#_pass2').val().trim(), 3, '#_pass2', '.msg-pass2', 'Debe escribir una contraseña de almenos 3 carácteres');

	let pass1 = $('#_pass1').val().trim();
	let pass2 = $('#_pass2').val().trim();

	if(pass1 === pass2){
		$('.msg-pass2 .error-msg').text('La nueva contraseña no puede ser igual a la actual.');
        $('.msg-pass2').removeClass('hidden');
	}else{
		$('.msg-pass2 .error-msg').text('');
        $('.msg-pass2').addClass('hidden');
	}
});


$('#pass-form').submit(function(event) {
	event.preventDefault();

    let pass1 = $('#_pass1').val();
    let pass2 = $('#_pass2').val();

    if( pass1 !== pass2){
    	let link = $(this).attr('action');
        let formData = new FormData(document.getElementById("pass-form"));
        $.ajax({
            type: 'POST',
            url: link,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            error:function(resp){
                $('.msg-log .error-msg').html('<span style="color:#EA4335;">'+resp.responseJSON.message+'</span>');
                $('.msg-log').removeClass('hidden');
            },
            success: function(resp){
                let obj = JSON.parse(resp);
                $('.msg-log .error-msg').html('<span style="color:green;">'+obj.message+'</span>');
                $('.msg-log').removeClass('hidden');
            }
        });
    }
});


function validateText(txt, long, element, elementError, msgError){
    if(txt.length < long){
        $(elementError + ' .error-msg').text(msgError);
        $(elementError).removeClass('hidden');
        $(element).addClass('border-red');
        return false;
    }else{
        $(elementError + ' .error-msg').text();
        $(elementError).addClass('hidden');
        $(element).removeClass('border-red');
        return true;
    }
}
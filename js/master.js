$(document).ready(function(){
	

});

$('#_name').change(function(){
	validateText( $('#_name').val().trim(), 3, '#_name', '.msg-name', 'El nombre debe ser de almenos 3 letras');
});

$('#_name').focusout(function(){
	validateText( $('#_name').val().trim(), 3, '#_name', '.msg-name', 'El nombre debe ser de almenos 3 letras');
});

$('#_lastname').change(function(){
	validateText( $('#_lastname').val().trim(), 5, '#_lastname', '.msg-name', 'Los apellidos deben ser de almenos 5 letras');
});

$('#_lastname').focusout(function(){
	validateText( $('#_lastname').val().trim(), 5, '#_lastname', '.msg-name', 'Los apellidos deben ser de almenos 5 letras');
});

$('#_email').change(function(){
	validateMail( $('#_email').val().trim(), '#_email', '.msg-mail', 'Ingrese un correo electrónico válido');
});

$('#_email').focusout(function(){
	validateMail( $('#_email').val().trim(),'#_email', '.msg-mail', 'Ingrese un correo electrónico válido');
});

$('#_reemail').change(function(){
	confirmEmail( $('#_email').val().trim(), $('#_reemail').val().trim());
});

$('#_reemail').focusout(function(){
	confirmEmail( $('#_email').val().trim(), $('#_reemail').val().trim());
});

function validateText(txt, long, element, elementError, msgError){
	if(txt.length < long){
		$(elementError + ' .error-msg').text(msgError);
		$(elementError).removeClass('hidden');
		$(element).addClass('border-red');
	}else{
		$(elementError + ' .error-msg').text();
		$(elementError).addClass('hidden');
		$(element).removeClass('border-red');
	}
}

function validateMail(email, element, elementError, msgError ){
	let validate = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

	if(!validate){
		$(elementError + ' .error-msg').text(msgError);
		$(elementError).removeClass('hidden');
		$(element).addClass('border-red');
	}else{
		$(elementError + ' .error-msg').text();
		$(elementError).addClass('hidden');
		$(element).removeClass('border-red');
	}
}
function confirmEmail(email1, email2){
	if(email1.length > 0 && email2.length > 0 && email1 === email2 && /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email1)){
		$('.msg-mail' + ' .error-msg').text();
		$('.msg-mail').addClass('hidden');
		$('#_reemail').removeClass('border-red');
	}else{
		$('.msg-mail' + ' .error-msg').text('Los correos no coinciden.');
		$('.msg-mail').removeClass('hidden');
		$('#_reemail').addClass('border-red');
	}
}
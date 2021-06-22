$('#login-form').submit(function(event) {
	event.preventDefault();

    let user = validateText($('#_username').val(), 3, '#_username', '.msg-user', 'Ingrese su nombre de usuario.');
    let pass = validateText($('#_pass').val(), 3, '#_pass', '.msg-pass', 'Ingrese su contraseña.');

    if( user && pass){
    	let link = $(this).attr('action');
        let formData = new FormData(document.getElementById("login-form"));
        $.ajax({
            type: 'POST',
            url: link,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            error:function(resp){
                $('.msg-log .error-msg').html('<span style="color:#EA4335;">Credenciales inválidas</span>');
                $('.msg-log').removeClass('hidden');
            },
            success: function(resp){
            	window.location.replace("change-password.php");
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

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

$('#_username').autocomplete({
    source: function (request, response) {
        $.ajax({
            url: "php/TestClass.php",
            dataType: "json",
            data: {q: request.term},
            method: 'POST',
            success: function (data) {
                if(Object.keys(data).length > 0){
                    //response({0: 'Ya existe un usuario registrado con ese nombre'})
                    $('.msg-user .error-msg').text('Ya existe un usuario registrado con ese nombre');
                    $('.msg-user').removeClass('hidden');
                }else{
                    //let myobj = {0:'El usuario es válido'};
                    //response(myobj);
                    $('.msg-user .error-msg').text('El usuario es válido');
                    $('.msg-user').removeClass('hidden');
                    $('.msg-user').addClass('msg-green');
                }
            },
            error: function(e){
                let myobj = {0: 'Error al realizar la búsqueda'};
                response(myobj);
            }
        });
    },
    minLength: 3
});

$('#register-form').submit(function(event) {
	event.preventDefault();
	let link = $(this).attr('action');
    let formData = new FormData(document.getElementById("register-form"));
    $.ajax({
        xhr: function() {
            let xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function(evt) {
                if (evt.lengthComputable) {
                    let percentComplete = ((evt.loaded / evt.total) * 100);
                    $(".progress-bar").width(percentComplete + '%');
                    $(".progress-bar").html(percentComplete+'%');
                }
            }, false);
               return xhr;
        },
        type: 'POST',
        url: link,
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function(){
            $(".progress-bar").width('0%');
        },
        error:function(resp){
            $('#uploadStatus').html('<p style="color:#EA4335;">Guardado falló, intente de nuevo.</p>');
        },
        success: function(resp){
        	console.log(resp);
        	if(resp > 0){
        		$('#uploadStatus').html('<p style="color:green; font-weight:bold;">Guardado!!.</p>');
        	}else{
        		$('#uploadStatus').html('<p style="color:#EA4335;">Guardado falló, intente de nuevo.</p>');        	}
        }
    });
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
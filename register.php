<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="css/master.css">

	<title>Registrar Usuario</title>
</head>
<body>
	<header>
        <nav class="navbar navbar-expand-lg">
            <div class="navbar-collapse">
                <ul class="navbar-nav options-menu">
                    <ul class="navbar-nav options-menu">
                    <li class="nav-item active">
                        <a class="nav-link" href="signin.php">Inicia Session</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="register.php" id="navbarDropdown" >
                            Regístrate
                        </a>
                    </li>
                </ul>
                </ul>
                
            </div>
        </nav>
    </header>
	<div class="container">
		<div class="row">
			<h1>Registro De Usuario</h1>
		</div>
		<div class="row">
			<div class="col-xl-2 col-lg-2 col-md-3 col-sm-0 col-xs-0"></div>
			<div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-xs-12">
				<form class="col-md-12" id="register-form" action="php/TestClass.php" >
					<div class="form-row">
						<div class="form-group  col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<label for="_name">Nombre(s):</label><span class="required">*</span>
							<input type="text" name="_name" id="_name" class="form-control" placeholder="Escriba su nombre" maxlength="60" required="required" >
						</div>
						<div class="form-group  col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<label for="_lastname">Apellidos:</label><span class="required">*</span>
							<input type="text" name="_lastname" id="_lastname" class="form-control" placeholder="Escriba sus apellidos" maxlength="80" required="required" >
						</div>
					</div>
					<div class="form-row msg msg-name hidden">
						<div class="form-group col-12">
							<label class="error-msg"></label>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="_email">Correo electrónico:</label><span class="required">*</span>
							<input type="text" name="_email" id="_email" class="form-control" placeholder="Ingrese su correo electrónico" maxlength="80" required="required">
						</div>
					</div>
					<div class="form-row">
						<div class="form-group  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="_reemail">Confirmar correo electrónico:</label><span class="required">*</span>
							<input type="text" name="_reemail" id="_reemail" class="form-control" placeholder="Vuelva a escribir su correo"  required="required">
						</div>
					</div>
					<div class="form-row msg msg-mail hidden">
						<div class="form-group col-12">
							<label class="error-msg"></label>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group  col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<label for="_username">Nombre de usuario:</label><span class="required">*</span>
							<input type="text" name="_username" id="_username" class="form-control" placeholder="Escriba su nombre" maxlength="12" required="required" >
						</div>
						<div class="form-group  col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
							<label for="_pass">Contraseña:</label><span class="required">*</span>
							<input type="password" name="_pass" id="_pass" class="form-control" placeholder="Escriba su contraseña" maxlength="16" required="required">
						</div>
					</div>
					<div class="form-row msg msg-user hidden">
						<div class="form-group col-12">
							<label class="error-msg"></label>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<button class="btn btn-primary" name="register">Registrar</button>
						</div>
					</div>
					<div class="form-row" id="prcess" >
                        <div class="col-12 progress">
                            <div class="progress-bar .progress-bar-animated" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                        </div>
                        <div class="col-12">
                        	<div id="uploadStatus"></div>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</div>

<script type="text/javascript" src="plugins/jquery-3.6.0/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="js/register.js"></script>
</body>
</html>
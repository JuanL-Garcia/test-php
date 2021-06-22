<?php
session_start();
if(isset($_SESSION['id_session']) && $_SESSION['id_session'] !== null ){
	header('Location: change-password.php');
}
?>
<!DOCTYPE html>
<html lang="es-MX">
<head>
	<meta charset="utf-8">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1/jquery-ui.min.css">
	<link rel="stylesheet" type="text/css" href="css/master.css">

	<title>Inicia Sesion</title>
</head>
<body>

	<header>
        <nav class="navbar navbar-expand-lg">
            <div class="navbar-collapse">
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
                
            </div>
        </nav>
    </header>
	<div class="container">
		<div class="row">
			<h1>Inicio de Sesión</h1>
		</div>
		<div class="row">
			<div class="col-xl-2 col-lg-2 col-md-3 col-sm-0 col-xs-0"></div>
			<div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-xs-12">
				<form class="col-md-12" id="login-form" action="php/Signin.php" >
					<div class="form-row">
						<div class="form-group  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="_username">Nombre de usuario:</label><span class="required">*</span>
							<input type="text" name="_username" id="_username" class="form-control" placeholder="Escriba su usuario" maxlength="12" required="required" >
						</div>
					</div>
					<div class="form-row msg msg-user hidden">
						<div class="form-group col-12">
							<label class="error-msg"></label>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="_pass">Contraseña:</label><span class="required">*</span>
							<input type="password" name="_pass" id="_pass" class="form-control" placeholder="Escriba su contraseña" maxlength="16" required="required">
						</div>
					</div>
					<div class="form-row msg msg-pass hidden">
						<div class="form-group col-12">
							<label class="error-msg"></label>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<button class="btn btn-primary" name="register">Iniciar Sesión</button>
						</div>
					</div>
					<div class="form-row msg msg-log hidden">
						<div class="form-group col-12">
							<label class="error-msg"></label>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

<script type="text/javascript" src="plugins/jquery-3.6.0/jquery-3.6.0.min.js"></script>
<script type="text/javascript" src="plugins/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="plugins/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="js/singin.js"></script>
</body>
</html>
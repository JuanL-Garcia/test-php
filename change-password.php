<?php
session_start();
if(isset($_SESSION['id_session']) && $_SESSION['id_session'] == null ){
	header('Location: signin.php');
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

	<title>Actualizar contraseña</title>
</head>
<body>

	<header>
        <nav class="navbar navbar-expand-lg">
            <div class="navbar-collapse">
                <ul class="navbar-nav user-info">
                    <li class="nav-item">
                        <a class="nav-link" href="#" id="navbarLogin" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="text-yellow strong">
                                Hola, <?php echo $_SESSION['name'];?>
                            </span>
                        </a>
                    </li>
                    <li class="v">
                    	<a class="nav-link" href="logout.php">cierra Sesión</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
	<div class="container">
		<div class="row">
			<h1>Actualiza Contraseña</h1>
		</div>
		<div class="row">
			<div class="col-xl-2 col-lg-2 col-md-3 col-sm-0 col-xs-0"></div>
			<div class="col-xl-8 col-lg-8 col-md-6 col-sm-12 col-xs-12">
				<form class="col-md-12" id="pass-form" action="php/Changepass.php" >
					<div class="form-row">
						<div class="form-group  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="_pass1">Contraseña actual:</label><span class="required">*</span>
							<input type="password" name="_pass1" id="_pass1" class="form-control" placeholder="Escriba su contraseña actual" minlength="3" maxlength="16" required="required" >
						</div>
					</div>
					<div class="form-row msg msg-pass1 hidden">
						<div class="form-group col-12">
							<label class="error-msg"></label>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group  col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<label for="_pass2">Nueva contraseña:</label><span class="required">*</span>
							<input type="password" name="_pass2" id="_pass2" class="form-control" placeholder="Escriba su nueva contraseña" minlength="3" maxlength="16" required="required">
						</div>
					</div>
					<div class="form-row msg msg-pass2 hidden">
						<div class="form-group col-12">
							<label class="error-msg"></label>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-12">
							<button class="btn btn-primary" name="register">Actualizar contraseña</button>
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
<script type="text/javascript" src="js/change-password.js"></script>
</body>
</html>
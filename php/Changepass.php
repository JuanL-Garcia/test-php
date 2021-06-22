<?php 
session_start();
require('DatabaseClass.php');


class Changepass{
	public function updatePass($pass1, $pass2){
		$password1 = sha1(trim($pass1));
		$password2 = sha1(trim($pass2));

		if($password1 !== $password2){
			$sqlString = "SELECT * FROM users WHERE id = ? AND password = ?";

			$db = new DatabaseClass();
        	$result = $db->Select($sqlString, array('is', $_SESSION['id_session'], $password1));

        	if($result !== null && count($result) == 1){
        		$sqlString = "UPDATE users set password = ? WHERE id = ?";
        		
        		if($db->Update($sqlString, array('si', $password2, $_SESSION['id_session']))){
        			return 1;
        		}
        	}
        	return 3;
		}
		return 4;
	}
	
}

if(isset($_POST['_pass1']) && isset($_POST['_pass2'])){
	$changepass = new Changepass();
	$result = $changepass->updatePass($_POST['_pass1'], $_POST['_pass2']);

	if($result == 1){
        echo json_encode(array('message' => 'La contraseña ha sido actualizada correctamente.', 'code' => 200));
	}
	if ($result == 3) {
		header('HTTP/1.1 401 Unauthorized');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => 'La contraseña actual no coincide con la contraseña del usuario registrada en el sistema.', 'code' => 401)));
	}
	if($result == 4){
		header('HTTP/1.1 401 Unauthorized');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => 'La nueva contraseña no puede ser igual a la contraseña actual.', 'code' => 401)));
	}
	
}

?>
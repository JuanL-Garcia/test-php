<?php 

require('DatabaseClass.php');

class Signin{

	public function checkCredentials($user, $pass){
		$username = $this->validateText(trim($user));
		$pass = sha1($this->validateText(trim($pass)));

		$sqlString = "SELECT * FROM users WHERE username = ? AND password = ?";

		$db = new DatabaseClass();
		$result = $db->Select($sqlString, array('ss', $username, $pass));

		if(count($result) == 1){
			session_start();
			$result = $result[0];
			$_SESSION['id_session'] = $result['id'];
			$_SESSION['name'] = $result['name'];
			return json_encode($result);
		}
        
        return false;
	}

	public function validateText($stringToValidate){
        if(strlen($stringToValidate) > 0){
            if (get_magic_quotes_gpc()) {
                $stringToValidate = stripslashes($stringToValidate);
            }
            $search = array(
                '@<script[^>]*?>.*?</script>@si',   // Elimina javascript
                '@<[\/\!]*?[^<>]*?>@si',            // Elimina las etiquetas HTML
                '@<style[^>]*?>.*?</style>@siU',    // Elimina las etiquetas de estilo
                '@<![\s\S]*?--[ \t\n\r]*>@'         // Elimina los comentarios multi-línea
            );
            $output = preg_replace($search, '', $stringToValidate);
            $output = $stringToValidate;
            return $output;
        }
        return '';
    }
}

if(isset($_POST['_username']) && isset($_POST['_pass'])){
	$signin = new Signin();

	$result = $signin->checkCredentials($_POST['_username'], $_POST['_pass']);
	if($result === false){
		header('HTTP/1.1 401 Unauthorized');
        header('Content-Type: application/json; charset=UTF-8');
        die(json_encode(array('message' => 'Credenciales inválidas', 'code' => 401)));
	}else{
		
        return $result;
	}
}

?>
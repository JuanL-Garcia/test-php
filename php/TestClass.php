<?php

require('DatabaseClass.php');
/**
 * 
 */
class TestClass
{
	
	public function searchUser($stringSearch){

		$sqlString = "SELECT
	              UPPER(
	                username
	              ) AS username
	            FROM users
	            WHERE 
	              UPPER(
	               username
	              ) LIKE ? ";

	    $db = new DatabaseClass();
	    $rows = $db->Select($sqlString, array('s',$stringSearch.'%'));
	    return json_encode($rows);
	}

	public function createUser($params){
		
        $params['name'] = $this->validateText($params['name']);
        $params['lastname'] = $this->validateText($params['lastname']);
        $params['email'] = $this->validateEmail($params['email']);
        $params['email2'] = $this->validateEmail($params['email2']);
        $params['username'] = $this->validateText($params['username']);
        $params['password'] = sha1($params['password']);

        if($params['email'] !== $params ['email2']){
            return false;
        }

        $sqlString = "INSERT INTO `users` (`name`, `lastname`, `email`, `username`, `password`) VALUES(?, ?, ?, ?, ?)";


        $db = new DatabaseClass();
        $result = $db->Insert($sqlString, array('sssss', $params['name'], $params['lastname'], $params['email'], $params['username'], $params['password']));
        
        return $result;
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

    public function validateEmail($email){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        }
        return '';
    }

    
	
}



if(isset($_POST['q'])){
	$testClass = new TestClass();
	echo $testClass->searchUser($_POST['q']);
}

if(isset($_POST['_name'])){
    $params = array(
        'name'     => trim($_POST['_name']),
        'lastname' => trim($_POST['_lastname']),
        'email'    => trim($_POST['_email']),
        'email2'   => trim($_POST['_reemail']),
        'username' => trim($_POST['_username']),
        'password' => trim($_POST['_pass'])
    );
    
	$testClass = new TestClass();
	echo $testClass->createUser($params);

}

if(isset($_POST['_']))


?>
<?php

class DatabaseClass{
	
    private $connection = null;

    
    public function __construct($dbhost = "127.0.0.1", $dbname = "test", $username = "root", $password = "juanl"){
        try{
	
            $this->connection = new mysqli($dbhost, $username, $password, $dbname);
		
            if( mysqli_connect_errno() ){
                throw new Exception("No se puede conectar a la base de datos.");   
            }
		
        }catch(Exception $e){
            throw new Exception($e->getMessage());   
        }			
	
    }

    // Inserta una fila en la tabla
    public function Insert( $query = "" , $params = [] ){
	
        try{
		
        $stmt = $this->executeStatement( $query , $params );
            $stmt->close();
		
            return $this->connection->insert_id;
		
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
	
        return false;
	
    }

    // Selecciona filas 
    public function Select( $query = "" , $params = [] ){
	
        try{
		
            $stmt = $this->executeStatement( $query , $params );
		
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);				
            $stmt->close();
		
            return $result;
		
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
	
        return false;
    }

    // Actualiza registro
    public function Update( $query = "" , $params = [] ){
        try{
		
            $this->executeStatement( $query , $params )->close();
            return true;
		
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
	
        return false;
    }		

    // Elimina registro
    public function Remove( $query = "" , $params = [] ){
        try{
		
            $this->executeStatement( $query , $params )->close();
		
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
	
        return false;
    }

    // Ejecuta las consultas
    private function executeStatement( $query = "" , $params = [] ){
        try{
		
            $stmt = $this->connection->prepare( $query );
		
            if($stmt === false) {
                throw New Exception("Imposible ejecutar consulta: " . $query);
            }
		
            if( $params ){
                call_user_func_array(array($stmt, 'bind_param'), $this->refValues($params));
            }
		
            $stmt->execute();
		
            return $stmt;
		
        }catch(Exception $e){
            throw New Exception( $e->getMessage() );
        }
    }

    //Código de stackoverflow para solventar un problema de referencias en versiones de php superiores a 5.3
    private function refValues($arr){
        if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
        {
            $refs = array();
            foreach($arr as $key => $value)
                $refs[$key] = &$arr[$key];
            return $refs;
        }
        return $arr;
    }
}

?>
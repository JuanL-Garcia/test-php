# test-php
website for testing in job application 


# DATABASE

Run the file *"test.sql"* on the DGBA (Data Base Management System)  to create the data structure for the web page.


# CONFIG DATABASE CONNECTION SETTINGS

Modify the constructor of the *"DatabaseClass"* class in the php / DatabaseClass.php file to add the connection data of the database server that you have configured.


	
    "php/DatabaseClass.php"
    
    
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
    .
    .
    .

<?php
class Database{
 
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "ruta-api-db-recome";
    private $username = "root";
    private $password = "";
    public $conn = null;
 
    // get the database connection
    public function getConnection(){
 
        // $this->conn = null;
 
        // try{
        //     $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        //     $this->conn->exec("set names utf8");
        // }catch(PDOException $exception){
        //     echo "Connection error: " . $exception->getMessage();
        // }
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        if(!$this->conn){
            echo "Error: {$this->conn->connect_errno}";
            exit();
        } else {
            return $this->conn;
        }
 
        // return $this->conn;
    }
}
?>
<?php
class Subscribe {
 
    // database connection and table name
    private $conn;
    private $table_name = "subscribers";
 
    // object properties
    public $email;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read products
    function read(){
    
        // select all query
        $query = "SELECT * FROM {$this->table_name}";
    
        // prepare query statement
        // $stmt = $this->conn->prepare($query);
    
        // // execute query
        // if(!$stmt->execute()) return FALSE;
    
        // return $stmt;

        $execute = $this->conn->query($query);
        return $execute;
    }

function create() {
 
    // query to insert record

    
    // sanitize
    $this->email = htmlspecialchars(strip_tags($this->email));
    
    // $query = 'INSERT INTO '. $this->table_email .' (first_name) VALUES ("$this->name")';
    $stmt = $this->conn->query("INSERT INTO subscribers(email) VALUES ('" . $this->email . "')");
 
    // prepare query
    // $stmt = $this->conn->query($query);
    
    // bind values
    
    // execute query
    if($stmt) {
        return true;
    } else {
        return $stmt;
    }
}

    function checkEmail() {
    // query to insert record
    // sanitize
    $this->email = htmlspecialchars(strip_tags($this->email));
    
    // $query = 'INSERT INTO '. $this->table_email .' (first_name) VALUES ("$this->name")';
        $stmt = $this->conn->query("SELECT * FROM subscribers WHERE email='$email'");
        if ($stmt->num_rows) {
            return true;
        } else {
            return $stmt;
        }
    }


}
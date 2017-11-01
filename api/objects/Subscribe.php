<?php
class Subscribe {
 
    // database connection and table name
    private $conn;
    private $table_name = "subscribers";
 
    // object properties
    public $name;
 
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
    $this->name = htmlspecialchars(strip_tags($this->name));
    // $query = 'INSERT INTO '. $this->table_name .' (first_name) VALUES ("$this->name")';
    $stmt = $this->conn->query("INSERT INTO subscribers(email) VALUES (" . $this->name . ")");
 
    // prepare query
    // $stmt = $this->conn->query($query);
    
    // bind values
    
    // execute query
    if($stmt) {
        return true;
    } else {
        // return $stmt;
        var_dump($stmt);
        die;
    }
}


}
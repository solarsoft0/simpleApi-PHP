<?php
class Subscribe{
 
    // database connection and table name
    private $conn;
    private $table_name = "Subscriber";
 
    // object properties
    public $id;
    public $name;
    public $created;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }





}
<?php
class Register {
 
    // database connection and table name
    private $conn;
    private $table_name = "riders";
 
    // object properties
    public $first_name;
    public $surname;
    public $phone_number;
    public $gender;
    public $email;
    public $dob;
    public $photo;
    public $address;
    public $city;
    public $state;
    public $country;
 
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

public function create() {
 
    // query to insert record

    
    // sanitize
    $this->first_name = htmlspecialchars(strip_tags($this->first_name));
    $this->surname = htmlspecialchars(strip_tags($this->surname));
    $this->phone_number = htmlspecialchars(strip_tags($this->phone_number));
    $this->gender = htmlspecialchars(strip_tags($this->gender));
    $this->email = htmlspecialchars(strip_tags($this->email));
    $this->dob = htmlspecialchars(strip_tags($this->dob));
    $this->photo = htmlspecialchars(strip_tags($this->photo));
    $this->address = htmlspecialchars(strip_tags($this->address));
    $this->city = htmlspecialchars(strip_tags($this->city));
    $this->state = htmlspecialchars(strip_tags($this->state));
    $this->country = htmlspecialchars(strip_tags($this->country));

    // Check if Email is registered
    $stmt2 = $this->conn->query("SELECT * FROM {$this->table_name} WHERE email='$this->email'")->num_rows;
    
    // $query = 'INSERT INTO '. $this->table_email .' (first_name) VALUES ("$this->name")';
    $stmt = $this->conn->query("INSERT INTO {$this->$table_name}(first_name, surname, phone_number, gender, email, dob, photo, address, city, state, country) VALUES ('$this->first_name', '$this->surname', '$this->phone_number', '$this->gender', '$this->email', '$this->dob', '$this->photo', '$this->address', '$this->city', '$this->state', '$this->country')");
 
    // prepare query
    // $stmt = $this->conn->query($query);
    
    // bind values
    
    // execute query
    if($stmt2 >= 1) {
        return false;
    } elseif($stmt) {
        return true;
    } else {
        return 0;
    }
}

}

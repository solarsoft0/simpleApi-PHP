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

            $execute = $this->conn->query($query);
            return $execute;
        }

    public function create() {
    
        // query to insert record

        
        // sanitize
        $this->email = htmlspecialchars(strip_tags($this->email));

        $stmt_first = $this->conn->query("SELECT * FROM {$this->table_name} WHERE email='$this->email'")->num_rows;
        
        // $query = 'INSERT INTO '. $this->table_email .' (first_name) VALUES ("$this->name")';
        $stmt = $this->conn->query("INSERT INTO {$this->table_name}(email) VALUES ('" . $this->email . "')");
    
        if($stmt_first >= 1) {
            return false;
        } elseif($stmt) {
            return true;
        } else {
            return 0;
        }
    }

    }
?>
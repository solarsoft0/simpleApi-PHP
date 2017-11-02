<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // get database connection
    include_once '../config/database.php';
    
    // instantiate product object
    include_once '../objects/register.php';
    
    $database = new Database();
    $db = $database->getConnection();
    
    $register = new Register($db);
    
    // get posted data
    $register->first_name = $_GET['first_name'];
    $register->surname = $_GET['surname'];
    $register->phone_number = $_GET['phone_number'];
    $register->gender = $_GET['gender'];
    $register->email = $_GET['email'];
    $register->dob = $_GET['dob'];
    $register->photo = $_GET['photo'];
    $register->address = $_GET['address'];
    $register->city = $_GET['city'];
    $register->state = $_GET['state'];
    $register->country = $_GET['country'];
    
    // create the product
    $registerNow = $register->create();

    if($registrNow == false) {
        echo json_encode(
            array("message" => "Email is already registered.")
        );
    } elseif($registerNow == true) {
        echo json_encode(
            array("message" => "Registeration Successfull.")
        );
    } else {
        // if unable to create the product, tell the user
        echo json_encode(
            array("message" => "Unable to Register.")
        );
    }




?>
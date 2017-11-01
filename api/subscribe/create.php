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
include_once '../objects/subscribe.php';
 
$database = new Database();
$db = $database->getConnection();
 
$subscribe = new Subscribe($db);
 
// get posted data
$subscribe->email = $_GET['email'];

$checkExist = $subscribe->checkEmail();

// set product property values
 
// create the product
if($checkExist == true) {
    echo json_encode(
        array("message" => "Email is already subscribed")
    );
} elseif($subscribe->create() == true) {
    echo json_encode(
        array("message" => "Subscription  Successfull")
    );
} else {
    // if unable to create the product, tell the user
    echo json_encode(
        array("message" => "Unable to Subscribe.")
    );
}




?>
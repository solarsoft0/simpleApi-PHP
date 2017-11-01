<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/subscribe.php';
 
// instantiate database and subscribe object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$subscribe = new Subscribe($db);
 
// query subscribes
$stmt = $subscribe->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // subscribes array
    $subscribes_arr=array();
    $subscribes_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $subscribe_item=array(
            "id" => $id,
            "name" => $name,
            "description" => html_entity_decode($description),
            "price" => $price,
            "category_id" => $category_id,
            "category_name" => $category_name
        );
 
        array_push($subscribes_arr["records"], $subscribe_item);
    }
 
    echo json_encode($subscribes_arr);
}
 
else{
    echo json_encode(
        array("message" => "No subscribes found.")
    );
}
?>
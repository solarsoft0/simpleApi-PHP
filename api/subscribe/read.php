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

$num = $stmt->num_rows;

// echo $num;
// die;
// $num = $stmt->rowCount();
// if($num) {
//     echo "Alleluia Meje o to rara";
// }

// check if more than 0 record found
if($num>0){
 
    // subscribes array
    $subscribes_arr = array();
    $subscribes_arr["records"] = array();
 
    // while ($row = $stmt->fetch_assoc()){
    //     // extract row
    //     // this will make $row['name'] to
    //     // just $name only
    //     // extract($row);
 
    //     // $subscribe_item=array(
    //     //     "id" => $row['id'],
    //     //     "email" => $row['name']
    //     // );
 
    //     // array_push($subscribes_arr["records"], $subscribe_item);
    //     // echo "Wetin you wan go do for ketu self?";

    //     $data = array (
    //         'id' => 
    //     )
    // }

    while ($row = $stmt->fetch_assoc()) {
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);

        $subscribe_item = array(
            "id" => $row['id'],
            "email" => $row['email']
        );

        array_push($subscribes_arr["records"], $subscribe_item);
    }

    echo json_encode($subscribes_arr);

    // $array = [];
    // for($i = 0; $i<=$num; $i++) {
    //     while($row = $stmt->fetch_assoc()) {
    //         $array[$i++] = $row;

    //         echo json_encode($array)."\n";
    //     }
    // }
} else {
    echo json_encode(
        array("message" => "No subscribes found.")
    );
}
?>
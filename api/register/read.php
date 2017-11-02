<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/register.php';
 
// instantiate database and register object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$register = new register($db);
 
// query registers
$stmt = $register->read();

$num = $stmt->num_rows;

// echo $num;
// die;
// $num = $stmt->rowCount();
// if($num) {
//     echo "Alleluia Meje o to rara";
// }

// check if more than 0 record found
if($num>0){
 
    // registers array
    $registers_arr = array();
    $registers_arr["records"] = array();
 
    // while ($row = $stmt->fetch_assoc()){
    //     // extract row
    //     // this will make $row['name'] to
    //     // just $name only
    //     // extract($row);
 
    //     // $register_item=array(
    //     //     "id" => $row['id'],
    //     //     "email" => $row['name']
    //     // );
 
    //     // array_push($registers_arr["records"], $register_item);
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

        $register_item = array(
            "id" => $row['id'],
            "first_name" => $row['first_name'],
            "surname" => $row['surname'],
            "phone_number" => $row['phone_number'],
            "gender" => $row['gender'],
            "dob" => $row['dob'],
            "photo" => $row['photo'],
            "address" => $row['address'],
            "city" => $row['city'],
            "state" => $row['state'],
            "country" => $row['country'],
            "time" => $row['time']
        );

        array_push($registers_arr["records"], $register_item);
    }

    echo json_encode($registers_arr);

    // $array = [];
    // for($i = 0; $i<=$num; $i++) {
    //     while($row = $stmt->fetch_assoc()) {
    //         $array[$i++] = $row;

    //         echo json_encode($array)."\n";
    //     }
    // }
} else {
    echo json_encode(
        array("message" => "No Riders found.")
    );
}
?>
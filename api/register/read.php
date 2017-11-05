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

    // check if more than 0 record found
    if($num>0){
    
        // registers array
        $registers_arr = array();
        $registers_arr["records"] = array();

        while ($row = $stmt->fetch_assoc()) {

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

    } else {
        echo json_encode(
            array("message" => "No Riders found.")
        );
    }
?>
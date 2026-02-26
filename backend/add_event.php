<?php
include 'config.php';
$data = json_decode(file_get_contents("php://input"));

$heading = $data->heading;
$description = $data->description;
$date = $data->date;
$place = $data->place;
$presenter_name = $data->presenter_name;

$sql = "INSERT INTO event_details (heading,description,date,place,presenter_name)
        VALUES ('$heading','$description','$date','$place','$presenter_name')";

if($conn->query($sql) === TRUE){
    echo json_encode(["message"=>"Event added successfully"]);
} else {
    echo json_encode(["message"=>"Error: " . $conn->error]);
}
?>
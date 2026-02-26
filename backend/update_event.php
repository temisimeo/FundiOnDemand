<?php
// 1. Temporarily comment this out to see errors if the script fails
// error_reporting(0); 

include 'config.php';
header('Content-Type: application/json');

// 2. Read the JSON data
$data = json_decode(file_get_contents("php://input"));

// 3. Check if data exists
if (!$data || empty($data->id)) {
    echo json_encode(["status" => "error", "message" => "No data or ID provided"]);
    exit;
}

// 4. CHANGE TABLE NAME HERE: FROM 'events' TO 'event_details'
// Also ensure your config.php uses 'eventdb'
$stmt = $conn->prepare("UPDATE event_details SET heading=?, presenter_name=?, date=?, place=? WHERE id=?");

// 5. Bind parameters (s = string, i = integer)
$stmt->bind_param("ssssi", 
    $data->heading, 
    $data->presenter_name, 
    $data->date, 
    $data->place, 
    $data->id
);

// 6. Execute and return JSON
if ($stmt->execute()) {
    echo json_encode(["status" => "success"]);
} else {
    // If this runs, it will tell you exactly why the SQL failed
    echo json_encode(["status" => "error", "message" => $stmt->error]);
}

$stmt->close();
$conn->close();
?>
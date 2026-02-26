<?php
include 'config.php';
header('Content-Type: application/json');

// Check if ID is provided
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convert to integer for security
    
    // Use the correct table name: event_details
    $sql = "DELETE FROM event_details WHERE id = $id";
    
    if ($conn->query($sql)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "No ID provided"]);
}

$conn->close();
?>
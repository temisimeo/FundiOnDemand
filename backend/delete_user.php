<?php
header("Content-Type: application/json");
include 'config.php';

// Check if ID is provided via GET request
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Convert to integer for safety

    // Prepare the delete statement
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            echo json_encode(["status" => "success", "message" => "User deleted successfully"]);
        } else {
            echo json_encode(["status" => "error", "message" => "User not found"]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Database error: " . $conn->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "No ID provided"]);
}

$conn->close();
?>
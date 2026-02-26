<?php
header("Content-Type: application/json");
include 'config.php';

// Get the raw POST data
$json = file_get_contents('php://input');
$data = json_decode($json, true);

if ($data && isset($data['id'])) {
    $id = intval($data['id']);
    $username = $conn->real_escape_string($data['username']);
    $email = $conn->real_escape_string($data['email']);
    $user_role = $conn->real_escape_string($data['user_role']);

    // Ensure the column name here is EXACTLY as it appears in MySQL
    $sql = "UPDATE users SET username=?, email=?, user_role=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $username, $email, $user_role, $id);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Updated successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => $stmt->error]);
    }
    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid data received"]);
}
$conn->close();
?>
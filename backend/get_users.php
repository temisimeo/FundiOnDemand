<?php
header("Content-Type: application/json");
include 'config.php'; // Ensure this file has your $conn connection

$sql = "SELECT id, username, email, user_role FROM users ORDER BY id DESC";
$result = $conn->query($sql);

$users = [];

if ($result) {
    while($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
    echo json_encode($users);
} else {
    echo json_encode(["error" => $conn->error]);
}

$conn->close();
?>
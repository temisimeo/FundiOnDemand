<?php
header("Content-Type: application/json");
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT id, username, email, role FROM users WHERE id = $id");
    echo json_encode($result->fetch_assoc());
}
?>
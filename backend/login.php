<?php
ob_start(); // Start output buffering: captures any accidental text/warnings
include 'config.php';
header('Content-Type: application/json');
session_start();

// ... [rest of your logic] ...

// Before your FINAL echo json_encode, clear any accidental output
ob_clean(); 
echo json_encode([
    "status" => "success", 
    "message" => "Login success", 
    "user" => $user
]);
exit;
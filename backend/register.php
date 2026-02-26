<?php
include 'config.php';
$data = json_decode(file_get_contents("php://input"));

$username = $data->username;
$email = $data->email;
$password = password_hash($data->password, PASSWORD_DEFAULT); // hashed
$user_role = $data->user_role ?? 'user';

$sql = "INSERT INTO users (username,email,password,user_role) VALUES ('$username','$email','$password','$user_role')";

if($conn->query($sql) === TRUE){
    echo json_encode(["message"=>"User registered successfully"]);
} else {
    echo json_encode(["message"=>"Error: " . $conn->error]);
}
?>
<?php
session_start();
session_unset();
session_destroy();

// Redirect or send success response
header("location: ../frontend/login.html");
exit();
?>
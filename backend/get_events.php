<?php
include 'config.php';

$sql = "SELECT * FROM event_details ORDER BY date ASC";
$result = $conn->query($sql);

$events = [];
while($row = $result->fetch_assoc()){
    $events[] = $row;
}

echo json_encode($events);
?>
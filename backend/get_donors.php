<?php
include 'db.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); 
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json; charset=UTF-8");

$result = $conn->query("SELECT * FROM donors");

$donors = [];
while ($row = $result->fetch_assoc()) {
    $donors[] = $row;
}

echo json_encode($donors);

$conn->close();
?>

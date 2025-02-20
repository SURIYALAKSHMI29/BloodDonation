<?php
$host = "localhost:3390";
$user = "root";  // Change if necessary
$pass = "";      // Change if necessary
$dbname = "blood_donation";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

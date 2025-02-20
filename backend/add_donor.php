<?php
include 'db.php';
header("Access-Control-Allow-Origin: *"); 
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); 
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

// Handle preflight OPTIONS request
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit();
}

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->name) && !empty($data->blood_group) && !empty($data->phone)) {
    $stmt = $conn->prepare("INSERT INTO donors (name, blood_group, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $data->name, $data->blood_group, $data->phone);
    
    if ($stmt->execute()) {
        echo json_encode(["message" => "Donor added successfully"]);
    } else {
        echo json_encode(["message" => "Failed to add donor"]);
    }
    
    $stmt->close();
} else {
    echo json_encode(["message" => "Invalid input"]);
}

$conn->close();
?>

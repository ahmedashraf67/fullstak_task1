<?php
header("Content-Type: application/json");
include "db.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $data = json_decode(file_get_contents("php://input"), true);

    $title = $data['title'] ?? null;
    $price = $data['price'] ?? null;
    $hours = $data['hours'] ?? null;

    
    if (!$title ||  !$price || !$hours) {
        echo json_encode(["status" => "error", "message" => "missing data"]);
        exit;
    }

    
    $sql = "INSERT INTO courses (title, price, hours) VALUES ('$title', '$price', '$hours')";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "inserted", "message" => "course added successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => mysqli_error($conn)]);
    }

} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>
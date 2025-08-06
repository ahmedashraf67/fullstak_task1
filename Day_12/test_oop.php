<?php

$conn = new mysqli("localhost", "root", "", "admin_user");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = 1;

$stmt = $conn->prepare("SELECT * FROM admin WHERE id = ?");
$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    echo "Name: " . $row['name'] . "<br>";
}

?>

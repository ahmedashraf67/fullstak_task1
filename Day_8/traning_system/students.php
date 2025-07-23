<?php
require 'db.php';
$conn = new mysqli("localhost", "root", "", "training_system");

$sql = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE,
    phone VARCHAR(20),
    date_of_birth DATE
)";

if ($conn->query($sql) == TRUE) {
    echo "Table 'students' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

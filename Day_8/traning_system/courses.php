<?php
require 'db.php';

$sql = "CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    price FLOAT(10,2) NOT NULL,
    hours  INT  NOT NULL
)";

$checkColumn = $conn->query("SHOW COLUMNS FROM courses LIKE 'hours'");
if ($checkColumn->num_rows == 0) {
    $conn->query("ALTER TABLE courses ADD hours INT NOT NULL");
}


if ($conn->query($sql) == TRUE) {
    echo "Table 'courses' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

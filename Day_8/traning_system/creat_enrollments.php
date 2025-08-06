<?php
require 'db.php';

$sql = "CREATE TABLE IF NOT EXISTS enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    course_id INT,
    grade VARCHAR(10),
    enrolled_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(id),
    FOREIGN KEY (course_id) REFERENCES courses(id)
)";

if ($conn->query($sql) == TRUE) {
    echo "Table 'enrollments' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>


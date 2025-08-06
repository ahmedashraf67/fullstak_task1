<?php
require 'db.php';

$sql = "SELECT 
            enrollments.id,
            students.name AS student_name,
            courses.title AS course_title,
            enrollments.grade
            
        FROM enrollments
        JOIN students ON enrollments.student_id = students.id
        JOIN courses ON enrollments.course_id = courses.id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enrollments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Enrollments List</h2>
    <a href="add_enrollment.php" class="btn btn-success mb-3">Add New Enrollment</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Student</th>
                <th>Course</th>
                <th>Grade</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['student_name'] ?></td>
                <td><?= $row['course_title'] ?></td>
                <td><?= $row['grade'] ?></td>
                
               
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>

<?php
require 'db.php';

$success = "";
$error = "";

// جلب الطلاب من قاعدة البيانات
$students = $conn->query("SELECT id, name FROM students");

// جلب الكورسات
$courses = $conn->query("SELECT id, title FROM courses");

// عند إرسال النموذج
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];
    $grade = $_POST['grade'];

    if ($student_id && $course_id && $grade !== '') {
        $stmt = $conn->prepare("INSERT INTO enrollments (student_id, course_id, grade) VALUES (?, ?, ?)");
        $stmt->bind_param("iid", $student_id, $course_id, $grade);

        if ($stmt->execute()) {
            $success = "Enrollment added successfully!";
        } else {
            $error = "Failed to add enrollment: " . $conn->error;
        }
    } else {
        $error = "Please fill in all fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Enrollment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Add Enrollment</h2>

    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php endif; ?>
    
    <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="student_id" class="form-label">Select Student</label>
            <select name="student_id" id="student_id" class="form-select" required>
                <option value="">-- Choose Student --</option>
                <?php while ($student = $students->fetch_assoc()): ?>
                    <option value="<?= $student['id'] ?>"><?= $student['name'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="course_id" class="form-label">Select Course</label>
            <select name="course_id" id="course_id" class="form-select" required>
                <option value="">-- Choose Course --</option>
                <?php while ($course = $courses->fetch_assoc()): ?>
                    <option value="<?= $course['id'] ?>"><?= $course['title'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="grade" class="form-label">Grade</label>
            <input type="number" name="grade" id="grade" class="form-control" step="0.01" min="0" max="100" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Enrollment</button>
        <a href="enrollments.php" class="btn btn-secondary">Back to List</a>
    </form>
</div>
</body>
</html>

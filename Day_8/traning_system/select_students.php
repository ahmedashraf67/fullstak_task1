<?php
require 'db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    die("Student ID is required.");
}


$result = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
$student = mysqli_fetch_assoc($result);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $dob   = $_POST['dob'];

    $update_sql = "UPDATE students 
                   SET name='$name', email='$email', phone='$phone', date_of_birth='$dob' 
                   WHERE id = $id";

    mysqli_query($conn, $update_sql);

    header("Location: add_student.php"); 
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Update Student</h4>
        </div>
        <div class="card-body">
            <form method="post">
                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" required 
                        value="<?= htmlspecialchars($student['name']) ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" name="email" class="form-control" required 
                        value="<?= htmlspecialchars($student['email']) ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control" 
                        value="<?= htmlspecialchars($student['phone']) ?>">
                </div>

                <div class="mb-3">
                    <label class="form-label">Date of Birth</label>
                    <input type="date" name="dob" class="form-control" 
                        value="<?= htmlspecialchars($student['date_of_birth']) ?>">
                </div>

                <button type="submit" class="btn btn-primary">Update Student</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>

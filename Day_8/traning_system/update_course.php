<?php
require 'db.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    echo "No course ID provided.";
    exit;
}


$sql = "SELECT * FROM courses WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    echo "Course not found.";
    exit;
}

$course = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $price = $_POST['price'];
    $hours = $_POST['hours'];

    $update_sql = "UPDATE courses SET title = '$title', price = '$price',hours = '$hours' WHERE id = $id";
    $conn->query($update_sql);

    header("Location: select_courses.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">Update Course</h2>

    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Course Title</label>
            <input type="text" name="title" class="form-control" value="<?= $course['title'] ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" class="form-control" value="<?= $course['price'] ?>" required>
        </div>

         <div class="mb-3">
            <label class="form-label">hours</label>
            <input type="number" name="hours" class="form-control" value="<?= $course['hours'] ?>" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="select_courses.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>

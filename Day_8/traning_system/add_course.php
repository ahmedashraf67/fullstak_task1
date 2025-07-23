<?php
require 'db.php';

$title = $_POST['title'] ?? '';
$price = $_POST['price'] ?? '';
$hours = $_POST['hours'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $conn->query("INSERT INTO courses (title, price, hours) VALUES ('$title', $price, $hours)");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Course</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h2 class="mb-4">Add Course</h2>

        <form method="POST" action="">
            <div class="mb-3">
                <label class="form-label">Course Title</label>
                <input type="text" name="title" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Price</label>
                <input type="number" name="price" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Hours</label>
                <input type="number" name="hours" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</div>

</body>
</html>

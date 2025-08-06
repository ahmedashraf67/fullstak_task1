<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-primary d-flex justify-content-center align-items-center vh-100">

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['w'];
    $email = $_POST['x'];
    $age = $_POST['y'];
    $city = $_POST['z'];
}
?>

<div class="card p-4">
    <h4 class="mb-3">User Profile</h4>
    <div class="alert alert-success">
        Welcome, <strong><?php echo $name; ?></strong>!
    </div>
    <ul class="list-group">
        <li class="list-group-item"><strong>Full Name:</strong> <?php echo $name; ?></li>
        <li class="list-group-item"><strong>Email:</strong> <?php echo $email; ?></li>
        <li class="list-group-item"><strong>Age:</strong> <?php echo $age; ?></li>
        <li class="list-group-item"><strong>City:</strong> <?php echo $city; ?></li>
    </ul>
    <a href="day5task3_form.html" class="btn btn-primary mt-3">Back to Form</a>
</div>

</body>
</html>

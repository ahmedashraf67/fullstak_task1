<?php
session_start();


if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

$success = "";
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim($_POST['name']);
    $password = $_POST['password'];
    $email = trim($_POST['email']);
    $gender = $_POST['gender'] ?? '';
    $job = $_POST['job'];
    $image = $_FILES['profile_image'];

    
    if (empty($name) || empty($password) || empty($email) || empty($gender) || empty($job)) {
        $errors[] = "All fields are required.";
    }

    if ($image['error'] == 0) {
        $target_dir = "user_images/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        $image_path = $target_dir . basename($image['name']);
        move_uploaded_file($image['tmp_name'], $image_path);
    } else {
        $image_path = "";
        $errors[] = "Image upload failed.";
    }

     
    if (empty($errors)) {
        $_SESSION['users'][$name] = [
            'password' => $password,
            'email' => $email,
            'gender' => $gender,
            'job' => $job,
            'image' => $image_path
        ];
        $success = "Registration successful. You can now login.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
    <div class="card p-4 bg-secondary">
        <h2 class="mb-4">Register</h2>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <?php foreach ($errors as $err) echo "<div>$err</div>"; ?>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="alert alert-success"><?= $success ?></div>
        <?php endif; ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label>
                <select name="gender" class="form-select" required>
                    <option value="">-- Select --</option>
                    <option value="male">male</option>
                    <option value="female">female</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Job</label>
                <input type="text" name="job" class="form-control" required>
            </div>

            <div class="mb-3 input-group">
                <input type="file" name="profile_image" class="form-control" accept="image/*" required>
            </div>

            <button type="submit" class="btn btn-light">Register</button>
        </form>

        <div class="mt-3">
            <a href="login.php" class="text-white">Already registered? Login here</a>
        </div>
    </div>
</div>
</body>
</html>

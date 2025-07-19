<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $image = $_FILES['image'];

    $errors = [];

    
    if (empty($name) || empty($email) || empty($password)) {
        $errors[] = "All fields are required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if ($image['error'] !== 0) {
        $errors[] = "Profile image is required.";
    } else {
        $allowed = ['image/jpeg', 'image/png', 'image/jpg'];
        if (!in_array($image['type'], $allowed)) {
            $errors[] = "Image must be JPG or PNG.";
        }
    }

    if (empty($errors)) {
        $imageName = time() . '_' . basename($image['name']);
        move_uploaded_file($image['tmp_name'], 'user_images/' . $imageName);

        $_SESSION['users'][] = [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'image' => $imageName
        ];

        header("Location: user_card.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Account</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white">

<div class="container py-5">
    <h2 class="text-center mb-4">Create Account</h2>

    <?php if (!empty($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach ($errors as $e): ?>
                    <li><?= $e ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="POST" enctype="multipart/form-data" class="bg-secondary p-4 rounded shadow">

        <div class="mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Profile Image</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-light">Register</button>
    </form>
</div>

</body>
</html>

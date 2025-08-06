<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

require 'db.php';

$success = '';
$error = '';


$uploadDir = 'uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['product_image'])) {
    $file = $_FILES['product_image'];

    if ($file['error'] === 0) {
        $tmpPath = $file['tmp_name'];
        $originalName = basename($file['name']);

        
        $encryptedName = md5(time() . $originalName) . '.' . pathinfo($originalName, PATHINFO_EXTENSION);
        $finalPath = $uploadDir . $encryptedName;

        if (move_uploaded_file($tmpPath, $finalPath)) {
            
            $stmt = $conn->prepare("INSERT INTO products (image_path) VALUES (?)");
            $stmt->bind_param("s", $finalPath);
            if ($stmt->execute()) {
                $success = "Product image uploaded successfully.";
            } else {
                $error = "DB Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $error = "Failed to move uploaded file.";
        }
    } else {
        $error = "Upload error code: " . $file['error'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
<div class="container">
    <h2>Upload Product Image</h2>

    <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
    <?php elseif ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="product_image" class="form-label">Choose Product Image</label>
            <input type="file" name="product_image" id="product_image" class="form-control" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <div class="mt-4">
        <a href="logout.php" class="btn btn-secondary">Logout</a>
    </div>
</div>
</body>
</html>

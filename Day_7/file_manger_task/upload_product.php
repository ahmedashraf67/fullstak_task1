<?php
session_start();

if (!isset($_SESSION['logged_in_user'])) {
    header("Location: login.php");
    exit;
}

$upload_message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image_file'])) {
    $file = $_FILES['image_file'];
    $type = $_POST['image_type']; 

    
    if ($type == "avatar") {
        $upload_dir = "user_images/";
    } else {
        $upload_dir = "uploads/products/";
    }

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    if ($file['error'] === 0) {
        $filename = basename($file['name']);
        $destination = $upload_dir . $filename;

        if (move_uploaded_file($file['tmp_name'], $destination)) {
            $upload_message = "<div class='alert alert-success'>Image uploaded successfully!</div>";

            // تسجيل في ملف log
            $log_path = "logs/uploads.log";
            $username = $_SESSION['logged_in_user'];
            $datetime = date("Y-m-d H:i:s");
            $mime = mime_content_type($destination);
            $log_line = "[$datetime] Username: $username | Type: $type | Path: " . realpath($destination) . " | MIME: $mime\n";
            file_put_contents($log_path, $log_line, FILE_APPEND);
        } else {
            $upload_message = "<div class='alert alert-danger'>Upload failed!</div>";
        }
    } else {
        $upload_message = "<div class='alert alert-warning'>Please select a valid file.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
    <div class="card p-4 bg-secondary">
        <h2 class="mb-4">Upload Image</h2>

        <?= $upload_message ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="row mb-3">
                <div class="col-md-6 input-group">
                    <input type="file" name="image_file" class="form-control" accept="image/*" required>
                </div>

                <div class="col-md-6">
                    <select name="image_type" class="form-select" required>
                        <option value="">-- Select Type --</option>
                        <option value="avatar">Avatar</option>
                        <option value="product">Product</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-light">Upload</button>
        </form>

        <div class="mt-4">
            <a href="gallery.php" class="text-white me-3">View Gallery</a>
            <a href="dashboard.php" class="text-white">Back to Dashboard</a>
        </div>
    </div>
</div>
</body>
</html>

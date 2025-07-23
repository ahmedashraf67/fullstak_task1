<?php
session_start();
if (!isset($_SESSION['logged_in_user'])) {
    header("Location: login.php");
    exit;
}


$folders = ['uploads/products/', 'user_images/'];
$images = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    $fileToDelete = $_POST['delete'];
    if (file_exists($fileToDelete)) {
        unlink($fileToDelete);
    }
    header("Location: gallery.php"); 
    exit;
}


foreach ($folders as $folder) {
    if (is_dir($folder)) {
        $files = scandir($folder);
        foreach ($files as $file) {
            if ($file !== "." && $file !== "..") {
                $fullPath = $folder . $file;
                $images[] = $fullPath;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        img.thumb {
            width: 60px;
            height: auto;
            border-radius: 5px;
        }
    </style>
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
    <div class="card p-4 bg-secondary">
        <h2 class="mb-4">Image Gallery</h2>

        <?php if (count($images) > 0): ?>
        <table class="table table-dark table-hover text-center align-middle">
            <thead>
                <tr>
                    <th>Thumbnail</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Size (KB)</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($images as $image): ?>
                    <tr>
                        <td><img src="<?= $image ?>" class="thumb"></td>
                        <td><?= basename($image) ?></td>
                        <td><?= strtoupper(pathinfo($image, PATHINFO_EXTENSION)) ?></td>
                        <td><?= round(filesize($image) / 1024, 2) ?></td>
                        <td>
                            <form method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
                                <input type="hidden" name="delete" value="<?= $image ?>">
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php else: ?>
            <div class="alert alert-warning text-center">No images uploaded yet.</div>
        <?php endif; ?>

        <div class="mt-4">
            <a href="upload_product.php" class="text-white me-3">Back to Upload</a>
            <a href="logout.php" class="text-danger">Logout</a>
        </div>
    </div>
</div>
</body>
</html>

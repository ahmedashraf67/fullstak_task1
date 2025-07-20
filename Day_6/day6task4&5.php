<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
    <h2>Upload PNG or JPEG Image</h2>

    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="image" class="form-label">Choose image:</label>
            <input type="file" name="image" id="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $image = $_FILES['image'];

        $ext = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
        $allowed_exts = ['jpeg', 'jpg', 'png'];
        $allowed_types = ['image/jpeg', 'image/png'];

       
        if (in_array($image['type'], $allowed_types) && in_array($ext, $allowed_exts)) {
            
           
            $todayFolder = 'logs/today/';
            if (!is_dir($todayFolder)) {
                mkdir($todayFolder, 0777, true);
            }

            
            $newFileName = uniqid('img_', true) . '.' . $ext;

            
            $uploadFolder = 'uploads/';
            if (!is_dir($uploadFolder)) {
                mkdir($uploadFolder, 0777, true);
            }

            $targetPath = $uploadFolder . $newFileName;

            
            if (move_uploaded_file($image['tmp_name'], $targetPath)) {
                $dateTime = date("Y-m-d H:i:s");

               
                $logContent = "Uploaded: $dateTime - Path: $targetPath" . PHP_EOL;
                file_put_contents($todayFolder . 'log.txt', $logContent, FILE_APPEND);

                echo '<div class="alert alert-success mt-3">Image uploaded successfully!</div>';
                echo '<p>Image saved at: <code>' . $targetPath . '</code></p>';
                echo '<p>Date and Time: <code>' . $dateTime . '</code></p>';
            } else {
                echo '<div class="alert alert-danger mt-3">Failed to move the file.</div>';
            }

        } else {
            echo '<script>alert("Invalid type of image. Only JPEG and PNG are allowed.");</script>';
        }
    }
    ?>
</div>

</body>
</html>

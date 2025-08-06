<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Multiple Images</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h2 class="mb-4 text-center">Upload Your Images</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $valid_extensions = ['jpg', 'jpeg', 'png'];
        $max_size = 4 * 1024 * 1024;   
        $upload_dir = "uploads/";
        $errors = [];
        $uploaded_images = [];

        foreach ($_FILES['images']['name'] as $key => $name) {
            $tmp_name = $_FILES['images']['tmp_name'][$key];
            $size = $_FILES['images']['size'][$key];
            $error = $_FILES['images']['error'][$key];
            $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            if ($error !== 0) {
                $errors[] = "Error uploading $name";
            } elseif (!in_array($ext, $valid_extensions)) {
                $errors[] = "File type not allowed: $name";
            } elseif ($size > $max_size) {
                $errors[] = "File too large: $name";
            } else {
                $new_name = uniqid("img_", true) . '.' . $ext;
                move_uploaded_file($tmp_name, $upload_dir . $new_name);
                $uploaded_images[] = $upload_dir . $new_name;
            }
        }

        if (!empty($errors)) {
            echo '<div class="alert alert-danger"><ul>';
            foreach ($errors as $e) {
                echo "<li>$e</li>";
            }
            echo '</ul></div>';
        } else {
            echo '<div class="row">';
            foreach ($uploaded_images as $img) {
                echo '
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <img src="' . $img . '" class="card-img-top" alt="Uploaded Image">
                    </div>
                </div>';
            }
            echo '</div>';
        }
    }
    ?>

    <form method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="images" class="form-label">Select Images (JPG, PNG)</label>
            <input class="form-control" type="file" id="images" name="images[]" accept=".jpg,.jpeg,.png" multiple required>
        </div>
        <button type="submit" class="btn btn-primary">Upload Files</button>
    </form>
</div>

</body>
</html>

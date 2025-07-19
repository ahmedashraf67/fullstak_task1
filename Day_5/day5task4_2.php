<?php
$upload_ok = false;
$error_message = '';
$image_path = '';
$image_info = [];
$file_info = [];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $file = $_FILES["image"];
    $file_type = $file["type"];
    $file_tmp = $file["tmp_name"];
    $file_name = basename($file["name"]);
    $file_size = $file["size"];

   
    $image_info = [
        "name" => $file_name,
        "type" => $file_type,
        "size" => $file_size,
        "temp_name" => $file_tmp
    ];

   
    $file_info = [
        "script_name" => $_SERVER["SCRIPT_NAME"],
        "full_path" => __FILE__,
        "temp_uploaded_image" => $file_tmp
    ];

    $allowed_types = ['image/jpeg', 'image/png'];
    if (in_array($file_type, $allowed_types)) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir);
        }

        $target_file = $target_dir . time() . "_" . $file_name;

        if (move_uploaded_file($file_tmp, $target_file)) {
            $upload_ok = true;
            $image_path = $target_file;
        } else {
            $error_message = "An error occurred while uploading the file.";
        }
    } else {
        $error_message = "Only PNG and JPG images are allowed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Upload Image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h4 class="mb-4 text-center">Upload Image (PNG or JPG)</h4>

        <?php if ($error_message): ?>
            <div class="alert alert-danger text-center"><?php echo $error_message; ?></div>
        <?php elseif ($upload_ok): ?>
            <div class="alert alert-success text-center">Image uploaded successfully ✅</div>
            <div class="text-center mb-3">
                <img src="<?php echo $image_path; ?>" class="img-fluid rounded" style="max-height: 300px;" alt="Uploaded Image">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card border-primary mb-3">
                        <div class="card-header bg-primary text-white">Image Info</div>
                        <div class="card-body">
                            <pre><?php print_r($image_info); ?></pre>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-dark mb-3">
                        <div class="card-header bg-dark text-white">PHP File Info</div>
                        <div class="card-body">
                            <pre><?php print_r($file_info); ?></pre>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data" class="mt-4">
            <div class="mb-3">
                <label for="image" class="form-label">Choose an image:</label>
                <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Upload Image</button>
        </form>
    </div>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
    <h2>Uploaded Images</h2>

    <?php
    $message = "";
    $alertType = "";

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!empty($_POST['delete'])) {
            $imagePath = $_POST['delete'];

            if (file_exists($imagePath)) {
                if (unlink($imagePath)) {
                    $message = "Deleted successfully.";
                    $alertType = "success";
                } else {
                    $message = "Error while deleting the file.";
                    $alertType = "danger";
                }
            } else {
                $message = "File not found.";
                $alertType = "warning";
            }
        } else {
            $message = "No data sent.";
            $alertType = "secondary";
        }
    }

    
    if (!empty($message)) {
        echo '<div class="alert alert-' . $alertType . ' alert-dismissible fade show mt-3" role="alert">';
        echo $message;
        echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
        echo '</div>';
    }

   
    $uploadsDir = 'uploads/';
    if (!is_dir($uploadsDir)) {
        echo '<div class="alert alert-warning mt-4">No uploads folder found.</div>';
    } else {
        $images = glob($uploadsDir . "*.{jpg,png}", GLOB_BRACE);

        if (empty($images)) {
            echo '<div class="alert alert-info mt-4">No images found.</div>';
        } else {
            echo '<table class="table table-bordered table-striped table-dark mt-4">';
            echo '<thead><tr><th>Image Path</th><th>Actions</th></tr></thead>';
            echo '<tbody>';

            foreach ($images as $imagePath) {
                $folderName = basename(dirname($imagePath));
                $folderDate = date("Y-m-d H:i:s", filectime(dirname($imagePath)));

                echo '<tr>';
                echo '<td><strong>' . $folderName . '</strong> | ' . $folderDate . '<br><code>' . $imagePath . '</code></td>';
                echo '<td>
                        <form method="post">
                            <input type="hidden" name="delete" value="' . $imagePath . '">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                      </td>';
                echo '</tr>';
            }

            echo '</tbody></table>';
        }
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

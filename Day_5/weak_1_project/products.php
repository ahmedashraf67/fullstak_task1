<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['product_name'];
    $description = $_POST['description'];
    $images = $_FILES['product_images'];

    $productImages = [];

    
    $uploadDir = 'uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir);
    }

    for ($i = 0; $i < count($images['name']); $i++) {
        $imageName = time() . '_' . basename($images['name'][$i]);
        $targetPath = $uploadDir . $imageName;

        if (move_uploaded_file($images['tmp_name'][$i], $targetPath)) {
            $productImages[] = $targetPath;
        }
    }

    $product = [
        'name' => $productName,
        'description' => $description,
        'images' => $productImages
    ];

    $_SESSION['products'][] = $product;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-dark text-white py-5">
<div class="container">
    <h2 class="mb-4">Add New Product</h2>

    <form action="" method="POST" enctype="multipart/form-data" class="bg-secondary p-4 rounded">
        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="product_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Product Images</label>
            <input type="file" name="product_images[]" class="form-control" multiple required>
        </div>

        <button type="submit" class="btn btn-success">Add Product</button>
    </form>

    <hr class="my-4">

    <h4>Uploaded Products</h4>
    <div class="row">
        <?php
        if (!empty($_SESSION['products'])) {
            foreach ($_SESSION['products'] as $product) {
                echo '<div class="col-md-4">';
                echo '<div class="card bg-dark border-light mb-3">';
                if (!empty($product['images'])) {
                    echo '<img src="' . $product['images'][0] . '" class="card-img-top" style="height: 200px; object-fit: cover;">';
                }
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . htmlspecialchars($product['name']) . '</h5>';
                echo '<p class="card-text">' . htmlspecialchars($product['description']) . '</p>';
                echo '</div>';

                if (count($product['images']) > 1) {
                    echo '<div class="p-2 border-top">';
                    echo '<strong>More Images:</strong><br>';
                    for ($i = 1; $i < count($product['images']); $i++) {
                        echo '<img src="' . $product['images'][$i] . '" style="width: 50px; height: 50px; object-fit: cover; margin: 3px;">';
                    }
                    echo '</div>';
                }

                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No products added yet.</p>';
        }
        ?>
    </div>
</div>
</body>
</html>

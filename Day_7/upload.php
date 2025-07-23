<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Choose Product</title>
</head>
<body>

<?php include 'nav.php'; ?>

<h2>Choose Product Image</h2>

<form method="POST" enctype="multipart/form-data">
    <input type="file" name="product_image">
    <button type="submit">Upload</button>
</form>

</body>
</html>

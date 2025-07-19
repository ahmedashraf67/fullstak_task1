<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .btn-custom {
            min-width: 200px;
            margin: 10px;
        }
    </style>
</head>
<body class="bg-dark text-white d-flex justify-content-center align-items-center vh-100">

<div class="text-center">
    <h1 class="mb-4">Welcome Admin</h1>

    <a href="create_account.php" class="btn btn-primary btn-lg btn-custom">Create Account</a>
    <a href="products.php" class="btn btn-success btn-lg btn-custom">Products</a>
    <a href="logout.php" class="btn btn-danger btn-lg btn-custom">Logout</a>
</div>

</body>
</html>

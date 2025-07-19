<?php
session_start();
$users = $_SESSION['users'] ?? [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Cards</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .user-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }
    </style>
</head>
<body class="bg-dark text-white">

<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Registered Users</h2>
        <a href="dashboard.php" class="btn btn-outline-light">⬅ Back to Dashboard</a>
    </div>

    <div class="row g-4">
        <?php foreach ($users as $user): ?>
            <div class="col-md-4">
                <div class="card bg-secondary text-white user-card shadow">
                    <img src="user_images/<?php echo htmlspecialchars($user['image']); ?>" alt="User Image" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($user['name']); ?></h5>
                        <p class="card-text mb-1"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
                        <p class="card-text"><strong>Password:</strong> <?php echo htmlspecialchars($user['password']); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>

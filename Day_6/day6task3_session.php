<?php
session_start();


if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}


if (isset($_POST['clear'])) {
    $_SESSION['users'] = [];
}


if (isset($_POST['remove_last'])) {
    array_pop($_SESSION['users']);
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_user'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    if (!empty($name) && !empty($email)) {
        $_SESSION['users'][] = [
            'name' => $name,
            'email' => $email
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Session Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
    
    <form method="POST" class="mb-4">
        <div class="card bg-secondary p-4">
            <h4 class="mb-3">Add New User</h4>
            <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" name="name" class="form-control" required placeholder="Enter name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control" required placeholder="Enter email">
            </div>
            <button type="submit" name="save_user" class="btn btn-success">Save</button>
        </div>
    </form>

    
    <div class="card bg-secondary p-3">
        <h4 class="mb-3">Registered Users</h4>

        <?php if (!empty($_SESSION['users'])): ?>
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['users'] as $index => $user): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= htmlspecialchars($user['name']) ?></td>
                            <td><?= htmlspecialchars($user['email']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert alert-danger text-center">No users</div>
        <?php endif; ?>
    </div>

    
    <form method="POST" class="mt-4 d-flex gap-2 justify-content-center">
        <button type="submit" name="clear" class="btn btn-danger">Clear Session</button>
        <button type="submit" name="remove_last" class="btn btn-warning">Remove Last</button>
    </form>
</div>

</body>
</html>

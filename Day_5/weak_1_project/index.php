<?php
session_start();

if (!isset($_SESSION['logins'])) {
    $_SESSION['logins'] = [];
}

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"] ?? '');
    $password = trim($_POST["password"] ?? '');

    if (empty($email)) {
        $errors['email'] = "Email is required";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required";
    }

    if (empty($errors)) {
        $_SESSION['logins'][] = ['email' => $email, 'password' => $password];
        header("Location: dashboard.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 bg-secondary text-white" style="min-width: 350px;">
    <h4 class="mb-3">Login</h4>
    
    <form method="post" novalidate class="needs-validation <?php echo !empty($errors) ? 'was-validated' : ''; ?>">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input 
                type="email" 
                name="email" 
                class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" 
                id="email" 
                required>
            <?php if (isset($errors['email'])): ?>
                <div class="invalid-feedback"><?php echo $errors['email']; ?></div>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input 
                type="password" 
                name="password" 
                class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>" 
                id="password" 
                required>
            <?php if (isset($errors['password'])): ?>
                <div class="invalid-feedback"><?php echo $errors['password']; ?></div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-light w-100">Login</button>
    </form>

    <?php if (!empty($_SESSION['logins'])): ?>
        <div class="mt-3">
            <h6 class="text-white-50 small">Previous Logins:</h6>
            <ul class="list-unstyled small">
                <?php foreach ($_SESSION['logins'] as $login): ?>
                    <li><?php echo htmlspecialchars($login['email']) . ' / ' . htmlspecialchars($login['password']); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
</div>

</body>
</html>

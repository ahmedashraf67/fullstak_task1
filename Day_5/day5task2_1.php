<?php
$blocked_ip = "127.0.0.1";
$user_ip = $_SERVER['REMOTE_ADDR'];
$request_method = $_SERVER['REQUEST_METHOD'];

if ($user_ip === $blocked_ip) {
    header("Location: denied.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Check Access</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center vh-100">

    <div class="alert alert-success text-center p-4 shadow-lg">
        <h4>Access OK: GOOD host.</h4>
        <p>Method is : <strong><?php echo $request_method; ?></strong></p>
        <p>the ip is : <strong><?php echo $user_ip; ?></strong></p>
    </div>

      <div class="alert alert-danger text-center p-4 shadow-lg">
        <h4>Access denied: Invalid host.</h4>
    </div>

</body>
</html>

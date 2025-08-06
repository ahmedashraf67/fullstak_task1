<?php
session_start();


$_SESSION['username'] = "Ahmed";
$_SESSION['age'] = 25;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>

<?php include 'nav.php'; ?>

<h2>User Information</h2>
<p><strong>Name:</strong> <?= $_SESSION['username']; ?></p>
<p><strong>Age:</strong> <?= $_SESSION['age']; ?></p>

</body>
</html>

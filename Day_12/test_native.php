<?php

$conn = mysqli_connect("localhost", "root", "", "admin_user");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = 1;

$stmt = mysqli_prepare($conn, "SELECT * FROM admin WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id); 


mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

while ($row = mysqli_fetch_assoc($result)) {
    echo "Name: " . $row['name'] . "<br>";
}

?>

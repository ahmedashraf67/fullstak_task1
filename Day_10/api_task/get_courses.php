<?php
header("Content-Type: application/json");
include "db.php";

$courses = [];

$sql = "SELECT * FROM courses";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $courses[] = $row;
    }
}

echo json_encode($courses);
?>

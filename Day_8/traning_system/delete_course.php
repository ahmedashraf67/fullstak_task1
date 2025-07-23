<?php
require 'db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $sql = "DELETE FROM courses WHERE id = $id";
    $conn->query($sql);
}

header("Location: select_courses.php");
exit;
?>

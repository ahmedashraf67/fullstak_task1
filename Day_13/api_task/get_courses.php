<?php
header("Content-Type: application/json");
include "db.php";

$courses = [];

if (isset($_GET['id'])) {
   
    $id = intval($_GET['id']); 
    $stmt = $conn->prepare("SELECT * FROM courses WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        $courses[] = $row;
    }
} else {
    
    $sql = "SELECT * FROM courses";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $courses[] = $row;
        }
    }
}

echo json_encode($courses);
?>

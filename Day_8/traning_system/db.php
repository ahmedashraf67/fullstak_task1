<?php
$servername = "localhost";
$username = "root";
$password = "";
$db_name="training_system";
$conn =  mysqli_connect($servername, $username, $password,$db_name);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "CREATE DATABASE IF NOT EXISTS training_system";




?>

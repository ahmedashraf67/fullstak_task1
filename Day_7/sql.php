<?php
$con=mysql_connect('localhost','root');
mysql_select_db($con,'students_mangement');

$sql="SELECT * FROM students";
$result =$conn->query($sql);
if($result->num_rows>0)
{
    $allData=$result->fetch_all(MYSQLI_ASSOC);
}

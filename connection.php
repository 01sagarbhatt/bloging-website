<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "blog_db"; // make sure this matches your database name

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

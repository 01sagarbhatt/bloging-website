<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    $path = "uploads/" . basename($image);
    move_uploaded_file($tmp, $path);

    $sql = "INSERT INTO posts (title, content, image, created_at)
            VALUES ('$title', '$content', '$image', NOW())";
    mysqli_query($conn, $sql);
    header("Location: dashboard.php");
}
?>

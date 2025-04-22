<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM posts WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
}

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Basic sanitization using mysqli_real_escape_string
    $title = mysqli_real_escape_string($conn, $title);
    $content = mysqli_real_escape_string($conn, $content);

    $update = mysqli_query($conn, "UPDATE posts SET title='$title', content='$content' WHERE id = $id");

    if ($update) {
        echo "<script>
                alert('Post updated successfully!');
                window.location.href='dashboard.php';
              </script>";
        exit();
    } else {
        echo "<script>alert('Update failed. Please try again.');</script>";
    }
}
?>

<?php include 'header.php'; ?>

<div class="container">
    <h2 class="text-center">Edit Blog Post</h2>
    <form method="POST" class="mt-4">
        <div class="mb-3">
            <label for="title" class="form-label">Post Title</label>
            <input type="text" name="title" class="form-control" required value="<?php echo $row['title']; ?>">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Post Content</label>
            <textarea name="content" class="form-control" rows="6" required><?php echo $row['content']; ?></textarea>
        </div>
        <button type="submit" name="update" class="btn btn-success">Update Post</button>
        <a href="dashboard.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php include 'footer.php'; ?>

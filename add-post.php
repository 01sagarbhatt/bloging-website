<?php include 'header.php'; ?>

<div class="container mt-4">
    <h2>Add New Blog Post</h2>
    <form action="insert-post.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Content:</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label>Image:</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Post</button>
        <a href="dashboard.php" class="btn btn-secondary">Back</a>
    </form>
</div>

<?php include 'footer.php'; ?>

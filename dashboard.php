<?php
include 'connection.php';
include 'header.php';

if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}

// Get all counts in single queries
$posts_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM posts"));
$users_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM users"));


?>

<div class="container">
    <h2 class="text-center">Dashboard</h2>
    <p class="text-center">Welcome back, <?php echo $_SESSION['user_name']; ?>!</p>

    <!-- Quick Stats -->
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Posts</h5>
                    <p class="card-text fs-4">
                        <?php echo $posts_count['total']; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Active Users</h5>
                    <p class="card-text fs-4">
                        <?php echo $users_count['total']; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">New Messages</h5>
                    <p class="card-text fs-4">
                    2
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Table -->
    <div class="d-flex justify-content-between align-items-center mt-4">
        <h3>All Blog Posts</h3>
        <a href="add-post.php" class="btn btn-primary">+ Add New Post</a>
    </div>

    <table class="table table-bordered mt-3">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM posts ORDER BY created_at DESC");
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['title']); ?></td>
                <td><?php echo date('d M Y H:i', strtotime($row['created_at'])); ?></td>
                <td>
                    <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-info">View</a>
                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Are you sure to delete this post?');">Delete</a>
                </td>
            </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="4" class="text-center">No blog posts found.</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>
<?php include 'footer.php'; ?>
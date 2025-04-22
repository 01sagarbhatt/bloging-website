<?php
include 'connection.php';
include 'header.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM posts WHERE id = $id");
    $post = mysqli_fetch_assoc($result);
}

// Fetch the recent posts
$recent_posts = mysqli_query($conn, "SELECT * FROM posts ORDER BY created_at DESC LIMIT 5"); // Limit to 5 recent posts
?>

<div class="container mt-4">
<img src="uploads/<?php echo $post['image']; ?>" class="img-fluid my-3">
    <!-- Display the single post -->
    <h2><?php echo $post['title']; ?></h2>
    <p><strong>Created on: </strong><?php echo $post['created_at']; ?></p>
    <p><?php echo $post['content']; ?></p>
    
    <hr>

    <!-- Recent Posts Section -->
    <h4>Recent Posts</h4>
    <ul class="list-group">
        <?php
        while ($recent_post = mysqli_fetch_assoc($recent_posts)) {
            ?>
            <li class="list-group-item">
                <a href="view.php?id=<?php echo $recent_post['id']; ?>"><?php echo $recent_post['title']; ?></a>
            </li>
            <?php
        }
        ?>
    </ul>
</div>

<?php include 'footer.php'; ?>

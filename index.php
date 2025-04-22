<?php include 'connection.php'; ?>
<?php include 'header.php'; ?>

<div class="container mt-4">
    <h2 class="mb-4">Latest Blog Posts</h2>
    <div class="row">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM posts ORDER BY created_at DESC");
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="uploads/<?php echo $row['image']; ?>" class="card-img-top" height="200" style="object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['title']; ?></h5>
                    <a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Read More</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php include 'footer.php'; ?>

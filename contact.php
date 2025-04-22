<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $email   = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $query = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $success = "Message sent successfully!";
        header("Location: contact.php?success=1");
        exit();
    } else {
        $error = "Something went wrong. Try again!";
        header("Location: contact.php?error=1");
        exit();
    }
}
?>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <h2 class="text-center">Contact Us</h2>

    <?php if (isset($success)): ?>
        <div class="alert alert-success"><?php echo $success; ?></div>
    <?php elseif (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>

    <form method="POST" class="mx-auto mt-4" style="max-width: 600px;">
        <div class="mb-3">
            <label>Your Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Your Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Your Message</label>
            <textarea name="message" class="form-control" rows="5" required></textarea>
        </div>
        <button class="btn btn-primary w-100">Send Message</button>
    </form>
</div>

<?php include 'footer.php'; ?>

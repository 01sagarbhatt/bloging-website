<?php include 'connection.php'; ?>
<?php include 'header.php'; ?>


<div class="container content py-4">
    <h2 class="text-center mb-4">Welcome Back to The Himalayan Post</h2>
    <p class="text-center">This is a secure login page for registered users. Once logged in, you'll be able to explore blog posts, share your thoughts, and manage your content if you're an admin. If you haven’t registered yet, please <a href="register.php">sign up here</a>.</p>

    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">User Login</div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label for="email">Email address</label>
                            <input type="email" name="email" required class="form-control" placeholder="Enter your registered email">
                        </div>
                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" required class="form-control" placeholder="Enter your password">
                        </div>
                        <button class="btn btn-success w-100" name="login">Login</button>
                    </form>

                    <?php
                    if (isset($_POST['login'])) {
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
                        if (mysqli_num_rows($check) > 0) {
                            $row = mysqli_fetch_assoc($check);
                            if (password_verify($password, $row['password'])) {
                                $_SESSION['user_name'] = $row['name'];
                            
                        
                                echo "<div class='alert alert-success mt-3'>Login successful! Redirecting...</div>";
                                echo "<script>setTimeout(() => { window.location.href = 'dashboard.php'; }, 1500);</script>";
                            } else {
                                echo "<div class='alert alert-danger mt-3'>Incorrect password. Please try again.</div>";
                            }
                        } else {
                            echo "<div class='alert alert-warning mt-3'>No user found with this email.</div>";
                        }
                    }
                    ?>
                </div>
                <div class="card-footer text-muted text-center">
                    Forgot your password? Contact site administrator.
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

<?php include 'connection.php'; ?>
<?php include 'header.php'; ?>

<div class="container content py-4">
    <h2 class="text-center mb-4">Create a New Account</h2>
    <p class="text-center">Join <strong>The Himalayan Post</strong> and start blogging today.</p>
    <p class="text-center">Register now to become a member of <strong>The Himalayan Post</strong>. As a registered user, you can post your own blogs, comment on others, and manage your content easily.</p>

    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">User Registration</div>
                <div class="card-body">

                    <!-- Registration Form -->
                    <form method="POST" action="">
                        <div class="mb-3">
                            <label>Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
                    </form>

                    <!-- PHP Logic -->
                    <?php
                    if (isset($_POST['register'])) {
                        $name = trim($_POST['name']);
                        $email = trim($_POST['email']);
                        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

                        // Check if email already exists
                        $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
                        if (mysqli_num_rows($check) > 0) {
                            echo "<div class='alert alert-warning mt-3'>Email already registered.</div>";
                        } else {
                            $insert = mysqli_query($conn, "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')");
                            if ($insert) {
                                header("Location: register.php?success=1");
                                exit();
                            } else {
                                echo "<div class='alert alert-danger mt-3'>Something went wrong: " . mysqli_error($conn) . "</div>";
                            }
                        }
                    }
                    ?>
                </div>
                <div class="card-footer text-center">
                    Already registered? <a href="login.php">Login here</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

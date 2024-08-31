<?php
session_start();
include("config.php");
$error = "";

if (isset($_POST['login'])) {
    $user = $_POST['user'];
    $pass = $_POST['pass'];

    // Hash the password using SHA1
    $pass = sha1($pass);

    if (!empty($user) && !empty($pass)) {
        // Use prepared statements to prevent SQL injection
        $query = "SELECT auser, apass FROM admin WHERE auser = ? AND apass = ?";
        if ($stmt = $con->prepare($query)) {
            $stmt->bind_param('ss', $user, $pass);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                $_SESSION['auser'] = $user;

                // Regenerate session ID to prevent session fixation attacks
                session_regenerate_id(true);

                header("Location: dashboard.php");
                exit();
            } else {
                $error = '* Invalid Username or Password';
            }
            $stmt->close();
        } else {
            $error = '* Database query error';
        }
    } else {
        $error = '* Please fill in all the fields!';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>KobEstate - Admin Login</title>
    <link rel="shortcut icon" type="image/png" href="assets/new_imgs/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/new_css/style.css">
</head>

<body>
    <div class="page-wrappers login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Welcome to KobEstate Admin Portal</h1>
                            <p class="account-subtitle">Access to our dashboard</p>
                            <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
                            <!-- Form -->
                            <form method="post">
                                <div class="form-group">
                                    <input class="form-control" name="user" type="text" placeholder="User Name">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="password" name="pass" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" name="login" type="submit">Login</button>
                                </div>
                                <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                                </div>
                                <div class="text-center dont-have">Don't have an account yet? <a href="register.php">Register</a></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>

</html>
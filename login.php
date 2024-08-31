<?php
session_start();
include("config.php");
$error = "";
$msg = "";
if (isset($_REQUEST['login'])) {
	$email = $_REQUEST['email'];
	$pass = $_REQUEST['pass'];
	$pass = sha1($pass);

	if (!empty($email) && !empty($pass)) {
		$sql = "SELECT * FROM user where uemail='$email' && upass='$pass'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		if ($row) {

			$_SESSION['uid'] = $row['uid'];
			$_SESSION['uemail'] = $email;
			header("location:index.php");
		} else {
			$error = "<p class='alert alert-warning'>Email or Password doesnot match!</p> ";
		}
	} else {
		$error = "<p class='alert alert-warning'>Please Fill all the fields</p>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="new_images/favicon.png">
	<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/layerslider.css">
	<link rel="stylesheet" type="text/css" href="css/color.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
	<link rel="stylesheet" type="text/css" href="new_css/style.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<title>KobEstate - Login</title>
</head>

<body>

	<div class="page-loader position-fixed z-index-9999 w-100 bg-white vh-100">
		<div class="d-flex justify-content-center y-middle position-relative">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
	</div>

	<div id="page-wrapper">
		<div class="row">
			<?php include("include/header.php"); ?>
			<div class="banner-full-row page-banner" style="background-image:url('new_images/banner4.jpg');">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h2 class="page-name float-left text-white text-uppercase mt-1 mb-0"><b>Login</b></h2>
						</div>
						<div class="col-md-6">
							<nav aria-label="breadcrumb" class="float-left float-md-right">
								<ol class="breadcrumb bg-transparent m-0 p-0">
									<li class="breadcrumb-item text-white"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active">Login</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>

			<div class="page-wrappers login-body full-row bg-gray">
				<div class="login-wrapper">
					<div class="container">
						<div class="loginbox">
							<div class="login-right">
								<div class="login-right-wrap">
									<h1>Login</h1>
									<p class="account-subtitle">Access to our dashboard</p>
									<?php echo $error; ?><?php echo $msg; ?>
									<!-- Form -->
									<form method="post">
										<div class="form-group">
											<input type="email" name="email" class="form-control" placeholder="Your Email*">
										</div>
										<div class="form-group">
											<input type="password" name="pass" class="form-control" placeholder="Your Password">
										</div>

										<button class="btn btn-success" name="login" value="Login" type="submit" style="margin-left: 37%;">Login</button>

									</form>
									<div class="login-or">
										<span class="or-line"></span>
										<span class="span-or">or</span>
									</div>
									<div class="text-center dont-have">Don't have an account? <a href="register.php">Register</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php include("include/footer.php"); ?>
			<a href="#" class="bg-secondary text-white hover-text-secondary" id="scroll"><i class="fas fa-angle-up"></i></a>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/greensock.js"></script>
	<script src="js/layerslider.transitions.js"></script>
	<script src="js/layerslider.kreaturamedia.jquery.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/tmpl.js"></script>
	<script src="js/jquery.dependClass-0.1.js"></script>
	<script src="js/draggable-0.1.js"></script>
	<script src="js/jquery.slider.js"></script>
	<script src="js/wow.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>
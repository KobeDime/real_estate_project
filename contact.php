<?php
include("config.php");

$error = "";
$msg = "";

if (isset($_POST['send'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	if (!empty($name) && !empty($email) && !empty($phone) && !empty($subject) && !empty($message)) {

		$sql = "INSERT INTO contact (name,email,phone,subject,message) VALUES ('$name','$email','$phone','$subject','$message')";
		$result = mysqli_query($con, $sql);
		if ($result) {
			$msg = "<p class='alert alert-success'>Message Send Successfully</p> ";
		} else {
			$error = "<p class='alert alert-warning'>Message Not Send Successfully</p> ";
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
	<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,500,600,700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-slider.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/layerslider.css">
	<link rel="stylesheet" type="text/css" href="css/color.css" id="color-change">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/flaticon/flaticon.css">
	<link rel="stylesheet" type="text/css" href="new_css/style.css">
	<title>KobEstate - Contact</title>
</head>

<body>
	<div id="page-wrapper">
		<div class="row">
			<?php include("include/header.php"); ?>
			<div class="full-row">
				<div class="container">
					<div class="row">
						<div class="col-lg-4 mb-5 bg-secondary">
							<div class="contact-info">
								<h3 class="mb-4 mt-4 text-white">Contacts</h3>
								<ul>
									<li class="d-flex mb-4"> <i class="fas fa-map-marker-alt text-white mr-2 font-13 mt-1"></i>
										<div class="contact-address">
											<h5 class="text-white">Address</h5>
											<span class="text-white">555 Tandang Sora Ave, Novaliches</span> <br>
											<span class="text-white">Quezon City, Philippines, 1116</span>
										</div>
									</li>
									<li class="d-flex mb-4"> <i class="fas fa-phone-alt text-white mr-2 font-13 mt-1"></i>
										<div class="contact-address">
											<h5 class="text-white">Call Us</h5>
											<span class="d-table text-white">+63 967 921 4141</span>
											<span class="text-white">+63 967 921 5151/span>
										</div>
									</li>
									<li class="d-flex mb-4"> <i class="fas fa-envelope text-white mr-2 font-13 mt-1"></i>
										<div class="contact-address">
											<h5 class="text-white">Email Address</h5>
											<span class="d-table text-white">sean@gmail.com</span>
											<span class="text-white">kobe@gmail.com</span>
										</div>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-1"></div>
						<div class="col-md-12 col-lg-7">
							<div class="container">
								<div class="row">
									<div class="col-lg-12">
										<h2 class="text-secondary double-down-line text-center mb-5">Get In Touch</h2>
										<?php echo $msg; ?><?php echo $error; ?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<form class="w-100" action="#" method="post">
											<div class="row">
												<div class="row mb-4">
													<div class="form-group col-lg-6">
														<input type="text" name="name" class="form-control" placeholder="Your Name*">
													</div>
													<div class="form-group col-lg-6">
														<input type="text" name="email" class="form-control" placeholder="Email Address*">
													</div>
													<div class="form-group col-lg-6">
														<input type="text" name="phone" class="form-control" placeholder="Phone" maxlength="10">
													</div>
													<div class="form-group col-lg-6">
														<input type="text" name="subject" class="form-control" placeholder="Subject">
													</div>
													<div class="col-lg-12">
														<div class="form-group">
															<textarea name="message" class="form-control" rows="5" placeholder="Type Comments..."></textarea>
														</div>
													</div>
												</div>
												<button type="submit" value="send message" name="send" class="btn btn-success">Send Message</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3859.557427045225!2d121.01535997468675!3d14.681039775103049!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b6cee88b3b5f%3A0xf6c9e650e2bdfcad!2s555%20Tandang%20Sora%20Ave%2C%20Quezon%20City%2C%201116%20Metro%20Manila!5e0!3m2!1sen!2sph!4v1724773922927!5m2!1sen!2sph" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>			<?php include("include/footer.php"); ?>
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
	<script src="js/jquery.cookie.js"></script>
	<script src="js/custom.js"></script>

</body>

</html>
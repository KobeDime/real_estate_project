<?php
session_start();

require("config.php");

if (!isset($_SESSION['auser'])) {
	header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>KobEstate - View About</title>
	<link rel="shortcut icon" type="image/png" href="assets/new_imgs/favicon.png">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<link rel="stylesheet" href="assets/new_css/style.css">
</head>

<body>
	<?php include("header.php"); ?>
	<div class="page-wrapper">
		<div class="content container-fluid">
			<div class="page-header">
				<div class="row">
					<div class="col">
						<h3 class="page-title">View About</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
							<li class="breadcrumb-item active">View About</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">List Of About</h4>
							<?php
							if (isset($_GET['msg']))
								echo $_GET['msg'];
							?>
						</div>
						<div class="card-body">

							<div class="table-responsive">
								<table class="table table-stripped table-bordered table-hover">
									<thead>
										<tr>
											<th>#</th>
											<th>Title</th>
											<th>Content</th>
											<th>Image</th>
											<th>Actions</th>

										</tr>
									</thead>
									<?php

									$query = mysqli_query($con, "select * from about");
									$cnt = 1;
									while ($row = mysqli_fetch_row($query)) {
									?>
										<tbody>
											<tr>
												<td><?php echo $cnt; ?></td>
												<td><?php echo $row['1']; ?></td>
												<td><?php echo $row['2']; ?></td>
												<td><img src="upload/<?php echo $row['3']; ?>" height="200px" width="200px"></td>
												<td><a href="aboutedit.php?id=<?php echo $row['0']; ?>"><button class="btn btn-info">Edit</button></a>
													<a href="aboutdelete.php?id=<?php echo $row['0']; ?>"><button class="btn btn-danger">Delete</button></a>
												</td>
											</tr>
										</tbody>
									<?php
										$cnt = $cnt + 1;
									}
									?>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/js/script.js"></script>

</body>

</html>
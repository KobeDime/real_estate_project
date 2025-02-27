<?php
session_start();
require("config.php");
if (!isset($_SESSION['auser'])) {
	header("location:index.php");
}

$error = "";
$msg = "";

if (isset($_POST['insert'])) {
	$state = $_POST['state'];

	if (!empty($state)) {
		$sql = "insert into state (sname) values('$state')";
		$result = mysqli_query($con, $sql);
		if ($result) {
			$msg = "<p class='alert alert-success'>State Inserted Successfully</p>";
		} else {
			$error = "<p class='alert alert-warning'>* State Not Inserted</p>";
		}
	} else {
		$error = "<p class='alert alert-warning'>* Fill all the Fields</p>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<title>KobEstate - Add Region</title>
	<link rel="shortcut icon" type="image/png" href="assets/new_imgs/favicon.png">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/feathericon.min.css">
	<link rel="stylesheet" href="assets/plugins/datatables/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="assets/plugins/datatables/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="assets/plugins/datatables/select.bootstrap4.min.css">
	<link rel="stylesheet" href="assets/plugins/datatables/buttons.bootstrap4.min.css">
	<link rel="stylesheet" href="assets/new_css/style.css">
</head>

<body>
	<?php include("header.php"); ?>
	<div class="page-wrapper">
		<div class="content container-fluid">
			<div class="page-header">
				<div class="row">
					<div class="col">
						<h3 class="page-title">Region</h3>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
							<li class="breadcrumb-item active">Region</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header">
							<h1 class="card-title">Add Region</h1>
							<?php echo $error; ?>
							<?php echo $msg; ?>
							<?php
							if (isset($_GET['msg']))
								echo $_GET['msg'];
							?>
						</div>
						<form method="post" id="insert product" enctype="multipart/form-data">
							<div class="card-body">
								<div class="row">
									<div class="col-xl-6">
										<h5 class="card-title">Region Details</h5>
										<div class="form-group row">
											<label class="col-lg-3 col-form-label">Region Name</label>
											<div class="col-lg-9">
												<input type="text" class="form-control" name="state">
											</div>
										</div>
									</div>
								</div>
								<div class="text-left">
									<input type="submit" class="btn btn-primary" value="Submit" name="insert" style="margin-left:200px;">
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Region List</h4>
						</div>
						<div class="card-body">

							<table id="basic-datatable " class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>#</th>
										<th>Region</th>
										<th>Actions</th>
									</tr>
								</thead>


								<tbody>
									<?php

									$query = mysqli_query($con, "select * from state");
									$cnt = 1;
									while ($row = mysqli_fetch_row($query)) {
									?>
										<tr>

											<td><?php echo $cnt; ?></td>
											<td><?php echo $row['1']; ?></td>
											<td><a href="stateedit.php?id=<?php echo $row['0']; ?>"><button class="btn btn-info">Edit</button></a>
												<a href="statedelete.php?id=<?php echo $row['0']; ?>"><button class="btn btn-danger">Delete</button></a>
											</td>
										</tr>
									<?php $cnt = $cnt + 1;
									} ?>

								</tbody>
							</table>
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
	<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
	<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
	<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
	<script src="assets/plugins/datatables/dataTables.select.min.js"></script>
	<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
	<script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
	<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
	<script src="assets/plugins/datatables/buttons.flash.min.js"></script>
	<script src="assets/plugins/datatables/buttons.print.min.js"></script>
	<script src="assets/js/script.js"></script>

</body>

</html>
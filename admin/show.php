<!DOCTYPE html>
<?php
ob_start();
include('db.php');

$pid = $_GET['sid'];



$sql = "select * from roombook where id = '$pid' ";
$re = mysqli_query($con, $sql);
while ($row = mysqli_fetch_array($re)) {
	$id = $row['id'];
	$title =  $row['Title'];
	$Fname = $row['FName'];
	$lname = $row['LName'];
	$email = $row['Email'];
	$country = $row['Country'];
	$phone = $row['Phone'];
	$room_type = $row['TRoom'];
	$Bed_type = $row['Bed'];
	//$Noof_room = $row['Nroom'];
	$meal_type = $row['Meal'];
	$cin_date = $row['cin'];
	$cout_date = $row['cout'];
	$nodays = $row['nodays'];
}
?>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="assets/css/bootstrap.css" rel="stylesheet" />
	<!-- FontAwesome Styles-->
	<link href="assets/css/font-awesome.css" rel="stylesheet" />
	<!-- Custom Styles-->
	<link href="assets/css/custom-styles.css" rel="stylesheet" />
	<!-- Google Fonts-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default top-navbar" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="home.php">MAIN MENU </a>
			</div>

			<ul class="nav navbar-top-links navbar-right">

				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false">
						<i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
						</li>
						<li><a href="settings.php"><i class="fa fa-gear fa-fw"></i> Settings</a>
						</li>
						<li class="divider"></li>
						<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</ul>

					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
		</nav>
		<!--/. NAV TOP  -->
		<nav class="navbar-default navbar-side" role="navigation">
			<div class="sidebar-collapse">
				<ul class="nav" id="main-menu">
					<li>
						<a href="home.php"><i class="fa fa-dashboard"></i> Status</a>
					</li>
					<li>
						<a class="active-menu" href="roombook.php"><i class="fa fa-bar-chart-o"></i> Room Booking</a>
					</li>
					<li>
						<a href="payment.php"><i class="fa fa-qrcode"></i> Payment</a>
					</li>
					<li>
						<a href="room.php"><i class="fa-solid fa-house-user"></i>Modify rooms</a>
					</li>
					<li>
						<a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
					</li>
				</ul>

			</div>

		</nav>
		<!-- /. NAV SIDE  -->

		<div id="page-wrapper">
			<div id="page-inner">
				<article>
					<div class="row">
						<div class="col-md-12">
							<h1 class="page-header">
								Information of Guest
							</h1>
						</div>
					</div>
					<address>
						<p>Coustomer Name : - <?php echo $title . $Fname . " " . $lname; ?><br></p>
					</address>
					<table class="table">
						<tr>
							<th><span>Customer ID: </span></th>
							<td><span><?php echo $id; ?></span></td>
						</tr>
						<tr>
							<th><span>Check in Date: </span></th>
							<td><span><?php echo $cin_date; ?> </span></td>
						</tr>
						<tr>
							<th><span>Check out Date: &nbsp;</span></th>
							<td><span><?php echo $cout_date; ?></span></td>
						</tr>

					</table>
					<table class="table">
						<tr>
							<td>Customer phone:</td>
							<td><?php echo $phone; ?></td>

							<td>Customer email:</td>
							<td><?php echo $email; ?></td>
						</tr>
						<tr>
							<td>Customer Country</td>
							<td><?php echo $country; ?></td>
						</tr>
					</table>
					<br>
					<br>
					<table class="table">
						<thead class="bg-primary">
							<tr>
								<th class="col"><span>Item</span></th>
								<th class="col"><span>No of Days</span></th>

							</tr>
						</thead>
						<tbody>

							<tr>
								<td><span><?php echo $room_type; ?></span></td>
								<td><span><?php echo $nodays; ?> </span></td>

							</tr>
							<tr>
								<td><span><?php echo $Bed_type; ?> Bed </span></td>
								<td><span><?php echo $nodays; ?></span></td>

							</tr>
							<tr>
								<td><span><?php echo $meal_type; ?> </span></td>
								<td><span><?php echo $nodays; ?></span></td>

							</tr>
						</tbody>
					</table>
				</article>
			</div>

			<script src="assets/js/jquery-1.10.2.js"></script>
			<script src="assets/js/bootstrap.min.js"></script>
			<script src="assets/js/jquery.metisMenu.js"></script>
			<script src="assets/js/custom-scripts.js"></script>
</body>

</html>

<?php

ob_end_flush();

?>
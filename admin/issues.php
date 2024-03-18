<!DOCTYPE HTML>
<html>
<?php
session_start();
include 'head.php';
include 'config.php';

if (isset($_SESSION['email'])) {
	$email = $_SESSION['email'];
	echo "Session is active";
} else {
	echo "<script>window.location='admin_log.php'</script>";
}
?>


<body class="sticky-header left-side-collapsed" onload="initMap()">
	<section>
		<!-- left side start-->
		<?php
		include 'side-navbar.php';
		?>
		<!-- left side end-->

		<!-- main content start-->
		<div class="main-content main-content4">
			<!-- header-starts -->
			<?php
			include 'horizontal-header.php';
			?>
			<!-- //header-ends -->
			<div id="page-wrapper">

				<div class="container-fluid" style="background-color: black">
					<div class="row">



						<div class="col-md-12">

							<h3 class="blank1" style="color: white;">Issues Details:</h3>
							<?php

							$sql = "select * from issue";
							$result = mysqli_query($con, $sql) or die("Error:data not found");
							if (mysqli_num_rows($result) > 0) {
								echo "<div class='table-responsive' style='font-size: 20px;'>";

								echo "<table class='table table-striped table-bordered' style='background-color: #fff';>";


								echo " <th>Id</th><th>Title</th><th>Location</th><th>Victim</th><th>Accused</th><th>Description</th><th>Image1</th><th>Image2</th><th>Proceed for investigation</th>";
								while ($row = mysqli_fetch_array($result)) {
									echo "<tr>";
									echo "<td>" . $row['id'] . "</td>";
									echo "<td>" . $row['title'] . "</td>";
									echo "<td>" . $row['location'] . "</td>";
									echo "<td>" . $row['victim'] . "</td>";
									echo "<td>" . $row['accused'] . "</td>";
									echo "<td>" . $row['description'] . "</td>";
									echo "<td><img src='../$row[5]'style='height:150px; width:150px;'></td>";
									echo "<td><img src='../$row[6]'style='height:150px; width:150px;'></td>";
									echo "<td><a href='pro.php?id= $row[0]'>Proceed</a></td>";
									echo "</tr>";
								}
								echo "</table>";
								echo "</div>";
							}

							?>

						</div>
					</div>

				</div>
			</div>
		</div>
		<!--footer section start-->
		<?php
		include 'footer.php'
		?>
		<!--footer section end-->
	</section>

	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>
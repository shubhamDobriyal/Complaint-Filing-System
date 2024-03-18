<!DOCTYPE HTML>
<html>
<?php
include 'head.php';
include "config.php";
session_start();
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

				<div class="container-fluid">
					<div class="row">



						<div class="col-md-12" style="background-color: black; color: #7e1c84">

							<h3 class="blank1" style="color:#9c05bc; padding: 4px">List Of Fake Complaints</h3>
							<?php
							$i = 1;
							$sql = "select * from process where status='FAKE'";
							$result = mysqli_query($conn, $sql) or die("Error:database not connected");
							if (mysqli_num_rows($result) > 0) {
							?>
								<div class="table-responsive">
									<table class="table table-bordered table-striped" style="background-color: green">
										<thead>
											<tr>
												<th>S.No</th>
												<th>File No</th>
												<th>Title</th>

												<th>Accues</th>
												<th>Location</th>
												<th>Investigation Dept</th>
												<th>Act</th>
												<th>Description</th>
												<th>Delete Complaint</th>


											</tr>
										</thead>

										<?php
										while ($row = mysqli_fetch_array($result)) {
											$file_no = $row['fileNo'];
											$_SESSION['fileNo'] = $file_no;
											$f_no = $_SESSION['fileNo'];

											$title = $row['title'];
											$_SESSION['title'] = $title;
											$title_temp = $_SESSION['title'];

											$accues = $row['accused'];
											$_SESSION['accused'] = $accues;
											$temp_accues = $_SESSION['accused'];


											$location = $row['location'];
											$_SESSION['location'] = $location;
											$temp_location = $_SESSION['location'];

											$investigation = $row['investi_rprt'];


											$act = $row['act'];
											$description = $row['description'];

											$status = $row['status'];


											if ($status == 'FAKE') {
												$temp_status = "Delete";
												$_SESSION['status'] = $temp_status;
												$t_status = $_SESSION['status'];
											} else {
												$_SESSION['status'] = $status;
												$t_status = $_SESSION['status'];
											}



										?>

											<tbody>
												<tr>
													<th scope="row"><?php echo $i++; ?></th>
													<td><?php echo $f_no; ?></td>
													<td><?php echo $title_temp; ?></td>
													<td><?php echo $temp_accues; ?></td>
													<td><?php echo $temp_location; ?></td>
													<td><?php echo $investigation; ?></td>
													<td><?php echo $act; ?></td>
													<td><?php echo $description; ?></td>
													<td><?php echo "<a href=fake_info.php?id=$row[0]>" . $t_status . "</a>"; ?></td>

												</tr>

											</tbody>
										<?php
										}
										?>
									</table>
								</div>
						</div>
					<?php
							}


							if (isset($_GET['id'])) {
								$id = $_GET['id'];
								$sql = "delete from process where id='$id'";
								$result = mysqli_query($conn, $sql) or die("Error:data not found");
								echo "Information delete successfully";
							}
					?>
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
<!DOCTYPE html>
<html lang="en">
<?php
include "config.php";
session_start();
if (isset($_SESSION['email'])) {
	$email = $_SESSION['email'];
	echo "Session is active";
} else {
	echo "<script>window.location='admin_log.php'</script>";
}
?>

<head>
	<title>process</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style>
		h1 {
			padding: 10px;
			text-align: center;
			color: #556d14;
			font-size: 26px;
		}

		h2 {
			padding-left: 10px;
			color: #112455;
			font-size: 14px;

		}

		p {
			padding-left: 10px;
			color: #141412;
			text-align: justify;

		}

		.img-div {
			min-height: 300px;
			border: 1px solid #FFFFFF;
			padding: 10px;
			background-color: #aaf9ac;

		}

		.txt_blog {
			border: 1px solid #e3ffdb;
			height: 320px;
			background-color: #e1fdd9;
		}

		body {
			background-color: BLACK;
		}
	</style>

</head>

<body>


	<div class="container">


		<?php
		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			$_SESSION['id'] = $id;
			$sql = "select * from issue where id= $id";
			$result = mysqli_query($con, $sql) or die("Error:");
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_array($result)) {
					$title = $row['title'];
					$_SESSION['title'] = $title;

					$location = $row['location'];
					$_SESSION['location'] = $location;

					$victim = $row['victim'];
					$_SESSION['victim'] = $victim;

					$accused = $row['accused'];
					$_SESSION['accused'] = $accused;

					$description = $row['description'];
					$_SESSION['description'] = $description;

					$img1 = $row['filePath'];
					$_SESSION['img1'] = $img1;

					$img2 = $row['filePath1'];
					$_SESSION['img2'] = $img2;
				}
			}
			$title_tmp = $_SESSION['title'];

			$location_tmp = $_SESSION['location'];

			$victim_tmp = $_SESSION['victim'];

			$accused_tmp = $_SESSION['accused'];

			$description_tmp = $_SESSION['description'];

			$img1_tmp = $_SESSION['img1'];

			$img2_tmp = $_SESSION['img2'];
		}


		?>

		<h1 style="color: green; font-size:50px; text-shadow: 1px 1px  white"> COMPLAINT REPORT</h1>

		<div class="row" style="padding: 10px; color: GREEN ;  margin-top: 40PX;">
			<div class="col-sm-12">
				<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

					<div class="form-group">
						<label class="control-label col-sm-2">Issues:</label>
						<div class="col-sm-10">
							<input type="text" readonly="" class="form-control" required="" name="title" style="width:100%; background-color: #847b80;color: black;" value="<?php echo $title_tmp; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">Location:</label>
						<div class="col-sm-10">
							<input type="text" readonly="" class="form-control" required="" name="location" style="width:100%;background-color: #847b80;color: black;" value="<?php echo $location_tmp; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">Victim:</label>
						<div class="col-sm-10">
							<input type="text" readonly="" class="form-control" required="" name="victim" style="width:100%;background-color: #847b80;color: black;" value="<?php echo $victim_tmp; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">Accused:</label>
						<div class="col-sm-10">
							<input type="text" readonly="" class="form-control" required="" name="accused" style="width:100%;background-color: #847b80;color: black;" value="<?php echo $accused_tmp; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">Description:</label>
						<div class="col-sm-10">
							<input type="text" readonly="" class="form-control" required="" name="description" style="width:100%;background-color: #847b80;color: black;" value="<?php echo $description_tmp; ?>">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">Investigation Report:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" required="" name="investigation" style="width:100%;background-color: #c2b8c2;color: black;">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">Under Constitutional Act:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" required="" name="act" style="width:100%;background-color: #c2b8c2;color: black;">
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">Investigation Department/Team:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" required="" name="inv_dpt" style="width:100%;background-color: #c2b8c2;color: black;">
						</div>
					</div>



					<!------------------###############--------------------------->

					<div class="form-group">
						<label class="control-label col-sm-2">image 1</label>
						<div class="col-sm-10">


							<?php

							// $id=$_GET['id'];
							// $_SESSION['id']=$id;
							$sql = "select * from issue where id= $id";
							$result = mysqli_query($con, $sql) or die("Error:data not found");
							if (mysqli_num_rows($result) > 0) {
								while ($row = mysqli_fetch_array($result)) {
									echo "<div class='col-sm-3 img_div'>";
									echo "<img src='../$row[5]'style='height:100px; width:100px;'>";
									echo "<h2>$row[5]</h2>";
									echo "</div>";
				
							?>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-sm-2">image 1</label>
						<div class="col-sm-10">
					<?php

									echo "<div class='col-sm-3 img_div'>";
									echo "<img src='../$row[6]'style='height:100px; width:100px;'>";
									echo "<h2>$row[6]</h2>";
									echo "</div>";
								}
							}


					?>


						</div>
					</div>






					<!--------------------####################------------------------>


					<div class="form-group">
						<label class="control-label col-sm-2">Status:</label>
						<div class="col-sm-10">
							<select name="status">
								<option>--Select--</option>
								<option>Under Process</option>
								<option>FAKE</option>


							</select>
						</div>
					</div>


					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="submit" class="btn btn-default" name="process" value="Submit Report" style="background-color: GREEN;color: WHITE">
						</div>
					</div>

				</form>

				<?php
				if (isset($_POST['process'])) {
					$title = $_POST['title'];
					$location = $_POST['location'];
					$victim = $_POST['victim'];
					$accused = $_POST['accused'];
					$description = $_POST['description'];
					$investigation_rprt = $_POST['investigation'];
					$act = $_POST['act'];
					$inv_dpt = $_POST['inv_dpt'];
					$status = $_POST['status'];
					$uniq_no = mt_rand(1000, 9999);
					$x = "domestic violence/";
					$fileNo = $x . $uniq_no;
					echo $fileNo;
					$sql = "INSERT into PROCESS values('','$title','$location','$accused','$description','$investigation_rprt','$act','$inv_dpt','$status','$fileNo','$victim')";
					$result = mysqli_query($con, $sql) or die("Error:database not connected");
					echo "<script>window.location='forward_to_court.php'</script>";
				}
				?>


			</div>

		</div>
	</div><!--- container --->
</body>

</html>
<!DOCTYPE HTML>
<html>
<?php
session_start();
include 'head.php';

if(isset($_SESSION['email']))
{
	$email=$_SESSION['email'];
	echo "Session is active";
}
else
{
	echo"<script>window.location='admin_log.php'</script>";
}
?>
  
   
 <body class="sticky-header left-side-collapsed"  onload="initMap()">
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
							
						<h3 class="blank1" style="color: black;">Issues Details:</h3>
						
							  
						  
	<?php

	$sql="select * from issue where department='Domestic violence department'";
	$result=mysqli_query($conn, $sql)or die("Error:data not found");
	if(mysqli_num_rows($result)>0)
	{
		
 	echo "<table class='table table-striped table-bordered' style='background-color: #fff' ;>" ;

 	
	echo" <th>Id</th><th>Title</th><th>Description</th><th>Accused</th><th>Location</th><th>Img1</th><th>Img2</th><th>Department</th><th>process</th>";
	while($row=mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['title']."</td>";
		echo "<td>".$row['description']."</td>";
		echo "<td>".$row['accused']."</td>";
		echo "<td>".$row['location']."</td>";
		echo "<td><img src='../$row[5]'style='height:100px; width:100px;'></td>";
		echo "<td><img src='../$row[6]'style='height:100px; width:120px;'></td>";
		
		echo "<td>".$row['department']."</td>";
			
		echo "<td><a href='process.php?id=$row[0]'>View/Processes</a></td>";
		echo"</tr>";
	 }
	   echo "</table>";
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
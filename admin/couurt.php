<!DOCTYPE HTML>
<html>
<?php
include 'head.php';
include "config.php";
session_start();
if(isset($_SESSION['email']))
{
	$email=$_SESSION['email'];
	
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
			
				<div class="container-fluid">
					<div class="row" style="background-color: black; background-attachment: fixed;">
					
						
						
						<div class="col-md-12">
							
						<h3 class="blank1" style="color: white; font-size: 35px;">Issues Detail</h3>
						<?php
						$i=1;
						$sql="select * from process";
						$result=mysqli_query($conn, $sql) or die("Error:database not connected");
						if(mysqli_num_rows($result)>0)
						{
							?>
							<div class="table-responsive" style="font-size: 20px;">
						  <table class="table table-striped table-bordered " style="background-color: green;">
							<thead >
							  <tr >
							  	<th>S.No</th>
								<th>File No</th>
								<th>Title</th>
								<th>Location</th>
								<th>Victim</th>
								<th>Accused</th>
								<th>Description</th>
								
								<th>Investigation Report</th>
								<th>Investigation Department</th>
								<th>Act</th>
								<th>Image1</th>
								<th>Image2</th>
								<th>Status</th>
							 </tr>
							</thead>
							
							<?php
							
							while($row=mysqli_fetch_array($result))
							{
								$file_no=$row['fileNo'];
								$_SESSION['fileNo']=$file_no;
								$f_no=$_SESSION['fileNo'];
								
								$title=$row['title'];
								$_SESSION['title']=$title;
								$title_temp=$_SESSION['title'];
								
								$location=$row['location'];
								$_SESSION['location']=$location;
								$temp_location=$_SESSION['location'];
								
								$victim=$row['victim'];
								$_SESSION['victim']=$victim;
								$temp_victim=$_SESSION['victim'];
								
										
								$accused=$row['accused'];
								$_SESSION['accused']=$accused;
								$temp_accused=$_SESSION['accused'];
								
								
								$description=$row['description'];
						
							
							
								
								$investi_rprt=$row['investi_rprt'];
								
								$act=$row['act'];
								
								$inv_dpt=$row['inv_dpt'];
								
								
								$status=$row['status'];
								
								
								if($status=='Under Process')
								{
									$temp_status="Refer to Court";
									$_SESSION['status']=$temp_status;
									$t_status=$_SESSION['status'];
								}
								else
								{
									$_SESSION['status']=$status;
									$t_status=$_SESSION['status'];
								}
								
								
			
		 
	
	   ?>				
						
						?>
						
							<tbody>
							  <tr>
								<th scope="row"><?php echo $i++; ?></th>
								<td><?php echo $f_no; ?></td>
								<td><?php echo $title_temp; ?></td>
								<td><?php echo $temp_location; ?></td>
								<td><?php echo $temp_victim; ?></td>
								<td><?php echo $temp_accused; ?></td>
								<td><?php echo $description; ?></td>
								<td><?php echo $investi_rprt; ?></td>
								<td><?php echo $inv_dpt; ?></td>
								<td><?php echo $act; ?></td>
								
	<?php							 
	 if(isset($_GET['id']))
 	{
 		$id=$_GET['id'];
		$_SESSION['id']=$id;
		$sql="select * from issue where id='$id'";
	$sql="select * from issue ";
	$result=mysqli_query($conn, $sql)or die("Error:data not found");
	if(mysqli_num_rows($result)>0)
	{
		
 	echo "<table class='table table-striped table-bordered' style=border:2px;>";

 	
	echo" <th>Image1</th><th>Image2</th>";
	while($row=mysqli_fetch_array($result))
	{
		
		echo "<tr>";
		
		echo "<td><img src='../$row[4]'style='height:100px; width:100px;'></td>";
		echo "<td><img src='../$row[5]'style='height:100px; width:100px;'></td>";
		echo "</tr>";
		
		
		

		
		echo"</tr>";
	 }
	   echo "</table>";
	   }
}	  
		?>				
								<!--<td><?php echo $t_status; ?></td>---->
								<td><?php echo "<a href=report.php?id=$row[0]>".$t_status."</a>"; ?></td>		
								
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
</html><?php

?>
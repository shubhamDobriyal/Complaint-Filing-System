<!DOCTYPE HTML>
<html>
<?php
include 'head.php';
?>
<head></head>


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
					<div class="row">
					
						
						
						<div  class="col-md-12 table table-bordered" style=" background-image: url(images/sk2.jpg); color:#ffb; font-size: 35px;">
						<div class="">
						<h3 class="blank1" style="font-size:60px; text-align: center;background-color:rgba(0,0,0,0.5); color:orange ;padding: 8px;   text-shadow: 1px 1px green; ">Constitutional Rights</h3>
					
						<?php
include 'config.php';
$sql="select * from  cons";
$result=mysqli_query($conn, $sql) or die ("Error:database not connected");
if(mysqli_num_rows($result)>0)
{
	
	echo"<table border='2' style='width:100%;'>";
	echo "<th>Rights</th><th>Description</th>";
	while($row=mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td style='color:red;font-size:26px;'>".$row['rights']."</td>";
		echo "<td style='color:#c0c0c0;font-size:23px;'>".$row['des' ]."</td>";
		echo "</tr>";
		
       
		}
	echo "</table>";
}
?>	
						
						
						</div>
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
<!DOCTYPE HTML>
<html>
<?php

include 'head.php';
session_start();
if(isset($_SESSION['email']))
{
	$email=$_SESSION['email'];
	//echo "Session is active";
}
else
{
	echo"<script>window.location='../admin_log.php'</script>";
}
?>
 <body class="sticky-header left-side-collapsed"  onload="initMap()" style="overflow-x: hidden;">
    <section>
	
    <!-- left side start-->
		<?php
			include 'side-navbar.php';
			?>
		<!-- left side end-->
    
		<!-- main content start-->
		<div class="main-content">
			<!-- header-starts -->
			<?php 
			include 'horizontal-header.php';
			?>
		<!-- //header-ends -->
<div class="container-fluid" style="background-image: url('images/dv1.jpg'); height:640px; background-position: center;  background-attachment: fixed; ">
				<h1 class="wlc"  style="color:forestgreen; font-size: 180px;">Domestic voilence</h1>
			<!--	<p>Register User ID<?php echo $email; ?></p>---->	
				</div>
				
					
				</div>
			<!--body wrapper start-->
			
			 <!--body wrapper end-->
		</div>
        <!--footer section start-->
			<?php
			include 'footer.php'
			?>
        <!--footer section end-->

      <!-- main content end-->
   </section>
  
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>
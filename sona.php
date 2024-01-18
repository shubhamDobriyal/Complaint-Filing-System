<!DOCTYPE html>
<html lang="en">

<?php
include 'head.php';
?>

<body>
	<!-- banner -->
	<div class="banner" id="home">
		<!-- agileinfo-dot -->
		<div class="agileinfo-dot">
			<?php
			include 'nav.php';
			?>
			<div class="w3layouts-banner-slider">
				<div class="container">
					<div class="slider">
						<div class="callbacks_container">
							<ul class="rslides callbacks callbacks1" id="slider4">
								<li>
									<div class="agileits-banner-info">
										<h3>Welcome
											<div class="border"></div> <span>to the CFC Hides U</span></h3>
										<div class="w3-button">
											<div class="w3ls-button">
												<a href="#about" class="scroll hvr-shutter-out-vertical">About</a>
											</div>
											<div class="w3l-button">
												<a href="#register_issues" class="scroll hvr-shutter-out-vertical">Issues</a>
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
								</li>
								<li>
									<div class="agileits-banner-info">
										<h3>Justice
											<div class="border"></div> <span>should be made</span></h3>
										<div class="w3-button">
											<div class="w3ls-button">
												<a href="#about" class="scroll hvr-shutter-out-vertical">About</a>
											</div>
											<div class="w3l-button">
												<a href="#register_issues" class="scroll hvr-shutter-out-vertical">Issues</a>
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
								</li>
								<li>
									<div class="agileits-banner-info">
										<h3>Legal
											<div class="border"></div> <span>action undertaken</span></h3>
										<div class="w3-button">
											<div class="w3ls-button">
												<a href="#about" class="scroll hvr-shutter-out-vertical">About</a>
											</div>
											<div class="w3l-button">
												<a href="#register_issues" class="scroll hvr-shutter-out-vertical">Issues</a>
											</div>
											<div class="clearfix"> </div>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div class="clearfix"> </div>

					</div>
				</div>
			</div>
		</div>
		<!-- //agileinfo-dot -->
	</div>
	<!-- //banner -->
	
	<!-- about -->
	<div class="about" id="about">
		<div class="container">
			<div class="w3l-about-grids_inner">
				<div class="col-md-6 w3ls-about-left">
					<h2>Welcome to CFC Hides U</h2>
					<h6> Laws are like cobwebs, which may catch small flies, but let wasps and hornets break through.</h6>
					<p>A recognized causal link or principle whose violation must or should result in a penalty as failure, injury, loss, or pain.</p>
					<p>The binding rules of conduct meant to enforce justice and prescribe duty or obligation, and derived largely from custom or formal enactment by a ruler or legislature. These laws carry with them the power and authority of the enactor, and associated penalties for failure or refusal to obey. Law derives its legitimacy ultimately from universally accepted principles such as the essential justness of the rules, or the sovereign power of a parliament to enact them.</p>
					
				</div>
				<div class="col-md-6 w3ls-about-right">
					<img src="images/ab.jpg" alt=" " class="img-responsive">
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //about -->
	
	
	<!-- contact -->
	<div class="free_agile_consultation contact" id="register_issues">
		<div class="col-md-12 free_agile_consultaion_img">


		</div>
		<div class="col-md-12 free_consultation_agile">
			<h4>Issues/Complains</h4>
			<form action="" method="POST" enctype="multipart/form-data">
				<div class="contact-left agileits-w3layouts free_w3ls_agile">
					<input type="text" name="title" placeholder="Title">
					<input class="email" name="img1" type="file" placeholder="Any Id Proof" title="Id Proof">
					<input class="email" name="des" type="text" placeholder="Description">
					<input type="text" name="accu" placeholder="Accused">
					<input class="email" name="img2" type="file" placeholder="Any Id Proof" title="Id Proof">
					<input class="email" name="loc" type="text" placeholder="Location">
					<select type="text" name="dep" placeholder="Department">
					<option>select department</option>
					<option>family department</option>
					<option>crime department</option>
					<option>health department</option>
					<option>domestic department</option>
					<option>civil department</option>
					<?php
					
					mysql_connect("localhost","root","");
					mysql_select_db("project");
					$sql="select * from issues";
					$result=mysql_query($sql) or die ("Error: data not connect");
					if(mysql_num_rows($result)>0)
					{
						while($rows=mysql_fetch_array($result))
						{
							echo"<option>".$row[7]."</option>";
						}
					}
					?>
					</select>
		
					
					<input type="submit" value="REQUEST SEND" name="submit">
				</div>

			</form>
		</div>
		
		<?php
		session_start();
		$uploadDir='images/';
		mysql_connect("localhost","root","");
		mysql_select_db("project");
		
		if(isset($_POST['submit']))
		{
			$title=$_POST['title'];
			$des=$_POST['des'];
			$accu=$_POST['accu'];
			$loc=$_POST['loc'];
			$dep=$_POST['dep'];
		    $fileName=$_FILES['img1']['name'];	
	        $tmpName=$_FILES['img1']['tmp_name'];	
            $fileSize=$_FILES['img1']['size'];	
            $fileType=$_FILES['img1']['type'];	
            $filePath=$uploadDir.$fileName;
	        $result=move_uploaded_file($tmpName,$filePath);
	
			$fileName=$_FILES['img2']['name'];	
	        $tmpName=$_FILES['img2']['tmp_name'];	
            $fileSize=$_FILES['img2']['size'];	
            $fileType=$_FILES['img2']['type'];	
            $filePath1=$uploadDir.$fileName;
	        $result=move_uploaded_file($tmpName,$filePath1);
	
			
			$sql="insert into issues values ('','$title','$des','$accu','$loc','$dep','$filePath','$filePath1')";
			$result=mysql_query($sql) or die ("Error:data not connected");
			echo"information send succesfully";
		}
		?>
		<div class="clearfix"> </div>
	</div>
	<!-- //contact -->
	
	
	<!-- news -->
	<div class="gallery" id="rights">
		<div class="container">
			<div class="about-heading">
				<h3>Civil Rights</h3>
				
			</div>
		</div>
		<div class="gallery-grids">
			<div class="gallery-top-grids">
				<div class="col-sm-3 gallery-grids-left">
					<div class="gallery-grid">
						
								<img src="images/g1.jpg" alt="" />
								<div class="g-captn">
									<h4>Right to Personal Freedom</h4>
									
								</div>
							
					</div>
					
				</div>
				<div class="col-sm-3 gallery-grids-left">
					<div class="gallery-grid">
							
								<img src="images/g2.jpg" alt="" />
								<div class="g-captn">
									<h4>Right to Religious Freedom</h4>
									
								</div>
							
					</div>
					
				</div>
				<div class="col-sm-3 gallery-grids-left">
					<div class="gallery-grid">
						
								<img src="images/g3.jpg" alt="" />
								<div class="g-captn">
									<h4>Right to Freedom of Thought and Expression</h4>
									
								</div>
							
					</div>
					
				</div>
				<div class="col-sm-3 gallery-grids-left">
					<div class="gallery-grid">
						
								<img src="images/g1.jpg" alt="" />
								<div class="g-captn">
									<h4> Right to Justice</h4>
									
								</div>
							
					</div>
					
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //news -->
	
	
	<!-- footer -->
	<?php
	include 'footer.php';
	?>
	<!-- //footer -->
	
	<script src="js/jquery-2.1.4.min.js"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider3").responsiveSlides({
				auto: true,
				pager: false,
				nav: false,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<script src="js/responsiveslides.min.js"></script>
	<script src="js/bars.js"></script>
	<script src="js/jarallax.js"></script>
	<script src="js/SmoothScroll.min.js"></script>
	<script type="text/javascript">
		/* init Jarallax */
		$('.jarallax').jarallax({
			speed: 0.5,
			imgWidth: 1366,
			imgHeight: 768
		})
	</script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->
	<script src="js/bootstrap.js"></script>
</body>

</html>
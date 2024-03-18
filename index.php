<!DOCTYPE html>
<html lang="en">

<?php
include 'head.php';
include 'config.php';
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
											<div class="border"></div> <span>to the CFC Hides U</span>
										</h3>
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
											<div class="border"></div> <span>should be made</span>
										</h3>
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
											<div class="border"></div> <span>action undertaken</span>
										</h3>
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
		<div class="col-md-6 free_agile_consultaion_img">


		</div>
		<div class="col-md-6 free_consultation_agile">
			<h4><u>Issues/Complains</u></h4><br>
			<p><b>Note: Please save the images with the name of the persons/scenes indicated in images and also write about them in description box in detail.</b></p>
			<form method="POST" action="" enctype="multipart/form-data">
				<div class="contact-left agileits-w3layouts free_w3ls_agile">

					<input type="text" name="title" placeholder="Issue Regarding">

					<input class="email" name="location" type="text" placeholder="Locality">

					<input class="email" name="img1" type="file">

					<input class="" name="img2" type="file">

					<input type="text" name="victim" placeholder="Victim">

					<input type="text" class="email" name="accused" placeholder="Accused">

					<textarea name="description" placeholder="Description of the images as well as other description about the issue" required=""></textarea>

					<div class="col-sm-3" style="margin-top: 12px;">
						<select name="department" style=" background: rgba(0,0,0,0.1); height: 50px; width: 500px;">
							<?php
							$host = "localhost";
							$username  = "root";
							$passwd = "";
							$dbname = "cfc";

							//Creating a connection
							$con = mysqli_connect($host, $username, $passwd, $dbname);
							if (mysqli_connect_errno()) {
								echo "Database connection failed.";
							} else {
								//fetching data from department table
								$sql = "SELECT * FROM department";
								if ($result = mysqli_query($con, $sql)) {
									if (mysqli_num_rows($result) > 0) {
										while ($row = mysqli_fetch_array($result)) {
											echo "<option>" . $row['department'] . "</option>";
										}
									}
								} else {
									echo "No data found";
								}
							}
							?>

						</select>
					</div>

					<input type="submit" value="SUBMIT COMPLAINT" name="submit">

				</div>

				<?php
				$uploadDir = 'uploaded_images/';
				if (isset($_POST['submit'])) {
					$title = $_POST['title'];
					$location = $_POST['location'];

					$fileName = $_FILES['img1']['name'];
					$tmpName = $_FILES['img1']['tmp_name'];
					$fileSize = $_FILES['img1']['size'];
					$fileType = $_FILES['img1']['type'];
					$filePath = $uploadDir . $fileName;
					$result = move_uploaded_file($tmpName, $filePath);


					$fileName = $_FILES['img2']['name'];
					$tmpName = $_FILES['img2']['tmp_name'];
					$fileSize = $_FILES['img2']['size'];
					$fileType = $_FILES['img2']['type'];
					$filePath1 = $uploadDir . $fileName;
					$result = move_uploaded_file($tmpName, $filePath1);

					$victim = $_POST['victim'];
					$accused = $_POST['accused'];
					$description = $_POST['description'];
					$department = $_POST['department'];
					$sql = "insert into issue values('','$title','$description','$accused','$location','$filePath','$filePath1','$department','$victim')";
					$result = mysqli_query($con, $sql) or die("error: database not connected");
					echo "<script> alert('information send succesfully')</script>";
				}
				?>




			</form>
		</div>
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
		$(function() {
			// Slideshow 4
			$("#slider4").responsiveSlides({
				auto: true,
				pager: true,
				nav: true,
				speed: 500,
				namespace: "callbacks",
				before: function() {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function() {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function() {
			// Slideshow 4
			$("#slider3").responsiveSlides({
				auto: true,
				pager: false,
				nav: false,
				speed: 500,
				namespace: "callbacks",
				before: function() {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function() {
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
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event) {
				event.preventDefault();
				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
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
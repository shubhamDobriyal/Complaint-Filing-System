<?php 
include 'head.php';
include 'config.php';
?>

<html>
<style>
@import "https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
body{
	margin: 0;
	padding: 0;
	font-family: sans-serif;
	background: url(images/low.jpg) no-repeat;
	background-size: cover;
}
.login-box{
	width: 600px;
	position: absolute;
	top: 50%;
	left: 50%;
	transform: translate(-50%,-50%);
	color: white;
}
.login-box h1{
	float: left;
	font-size: 40px;
	border-bottom: 6px solid #4caf50;
	margin-bottom: 50px;
	padding: 13px 0;
}
.text-box{
	width: 100%;
	overflow: hidden;
	font-size: 20px;
	padding: 8px 0;
	margin: 8px 0;
	border-bottom: 1px solid
}
.text-box i{
	width: 26px;
	float: left;
	text-align: center;
	
}
.text-box input{
	border: none;
	outline: none;
	background: none;
	color: white;
	font-size: 18px;
	width: 80%;
	float: left;
	margin: 0 10px;
	}
	.btn{
		
		width: 100%;
		background: none;
		border: 2px solid #4cef50;
		color: white;
		padding: 5px;
		font-size: 18px;
	 cursor: pointer;
	 margin: 12px 0;
	}

</style>
<title> login page</title>
<body>

<div class="login-box">
<h1>LOGIN</h1>
<form method="POST" action="">



<div class="text-box">
<i class="fa fa-user" aria-hidden="true"></i>
<input type="text" placeholder=" enter your email" required="" value="" name="email">
</div>
<div class="text-box">
<i class="fa fa-lock" aria-hidden="true"></i>
<input type="password" placeholder=" enter your password" required="" value="" name="password">
</div>
<div>
<input type="submit"  class="btn btn-default" name="login" value="login">
	 </div>
	 </form>
	 
	 
	 
<?php 
session_start();
$con = mysqli_connect($host, $username, $passwd, $dbname);

if(isset($_POST['login']))
{
	

$email = $_POST['email'];

$password = $_POST['password'];
$_SESSION['email']=$_POST['email'];
$_SESSION['password']=$_POST['password'];

$email = stripcslashes($email);
$password = stripcslashes($password);
$sql = "select * from login where email= '$email' and password ='$password'";
$result = mysqli_query($con, $sql) ;
$row =mysqli_fetch_array($result);
if($row>0)
{
	echo"<script>window.location='admin/dashboard.php'</script>";
	
}
else
{
	echo "Wrong username or password";
}
}
?>
</div>


</body>
</html>

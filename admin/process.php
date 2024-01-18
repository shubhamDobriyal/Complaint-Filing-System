<!DOCTYPE html>
<html lang="en">
<?php
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
<head>
  <title>process</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  	h1{
		padding: 10px;
		text-align: center;
		color: #556d14;
		font-size: 26px;
	}
	h2{
		padding-left: 10px;
		color: #112455;
		font-size: 14px;
		
	}
	p{
		padding-left: 10px;
		color: #141412;
		text-align: justify;	
		
	}
	.img-div{
		min-height: 300px;
		border: 1px solid #FFFFFF;
		padding: 10px;
		background-color: #aaf9ac;
		
	}
	.txt_blog{
		border: 1px solid #e3ffdb;
		height: 320px;
		background-color: #e1fdd9;	
	}
	body{
		background-color: #d5f3c9;
	}
	
	
</style>
 
</head>
<body>

  
<div class="container">
 
                     
  <?php
   if(isset($_GET['id']))
 	{
 	$id=$_GET['id'];
	$_SESSION['id']=$id;
	$sql="select * from issue where id='$id'";
	$result=mysqli_query($conn, $sql) or die("Error:");
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_array($result))
		{
			$title=$row['title'];
			$_SESSION['title']=$title;
			
			$location=$row['location'];
			$_SESSION['location']=$location;
			
			$victim=$row['victim'];
			$_SESSION['victim']=$victim;
			
			$accused=$row['accused'];
			$_SESSION['accused']=$accused;
			
			$description=$row['description'];
			$_SESSION['description']=$description;
			 
		}
	}
	$title_tmp=$_SESSION['title'];
	
	$location_tmp=$_SESSION['location'];
	
	$victim_tmp=$_SESSION['victim'];
	
	$accused_tmp=$_SESSION['accused'];
	
	$description_tmp=$_SESSION['description'];
	
 }

 
  ?>
  
<div class="row" style="padding: 10px;">
<div class="col-sm-12">
 <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
    
    <div class="form-group">
      <label class="control-label col-sm-2" >Issues:</label>
      <div class="col-sm-10">          
        <input type="text" readonly="" class="form-control" required=""  name="title" style="width:100%;" value="<?php echo $title_tmp; ?>">
      </div>
    </div>
	
	  <div class="form-group">
      <label class="control-label col-sm-2" >Location:</label>
      <div class="col-sm-10">          
        <input type="text" readonly="" class="form-control" required=""  name="location" style="width:100%;" value="<?php echo $location_tmp; ?>">
      </div>
    </div>
	
	
	  
	  <!------------------###############--------------------------->
	  
	  <div class="form-group">
      <label class="control-label col-sm-2" >image 1</label>
      <div class="col-sm-10">          
       
		
		 <?php
		 
	$id=$_GET['id'];
	$_SESSION['id']=$id;
	$sql="select * from issue where id='$id'";
	$result=mysqli_query($conn, $sql)($sql)or die("Error:data not found");
	if(mysqli_num_rows($result)>0)
	{
		
 	echo "<table class='table table-striped table-bordered' style=border:2px;>";

 	
	echo" <th>Image1</th>";
	while($row=mysqli_fetch_array($result))
	{
		
		echo "<tr>";
		echo "<td><img src='../$row[4]'style='height:100px; width:100px;'></td>";
		
		echo "</tr>";
		
		
		

		
		echo"</tr>";
	 }
	   echo "</table>";
	   }
	   
	   ?>
      </div>
	  </div>
	 
	
	 <div class="form-group">
      <label class="control-label col-sm-2" >image 2</label>
      <div class="col-sm-10">          
       
		
		 <?php
		 
	$id=$_GET['id'];
	$_SESSION['id']=$id;
	$sql="select * from issue where id='$id'";
	$result=mysqli_query($conn, $sql) or die("Error:data not found");
	if(mysqli_num_rows($result)>0)
	{
		
 	echo "<table class='table table-striped table-bordered' style=border:2px;>";

 	
	echo" <th>Image2</th>";
	while($row=mysqli_fetch_array($result))
	{
		
		echo "<tr>";
		
		echo "<td><img src='../$row[5]'style='height:100px; width:100px;'></td>";
		echo "</tr>";
		
		
		

		
		echo"</tr>";
	 }
	   echo "</table>";
	   }
	   
	   ?>
      </div>
	  </div>
	 
	
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  <!--------------------####################------------------------>
	
	
	
	<div class="form-group">
      <label class="control-label col-sm-2" >Victim</label>
      <div class="col-sm-10">          
        <input type="text" readonly="" class="form-control" required=""  name="victim" style="width:100%;" value="<?php echo $victim_tmp; ?>">
      </div>
	  </div>
	
	
	 <div class="form-group">
      <label class="control-label col-sm-2" >Accused:</label>
      <div class="col-sm-10">          
        <input type="text" readonly="" class="form-control" required=""  name="accused" style="width:100%;" value="<?php echo $accused_tmp; ?>">
      </div>
    </div>

<div class="form-group">
      <label class="control-label col-sm-2" >Description:</label>
      <div class="col-sm-10">          
        <input type="text" readonly="" class="form-control" required=""  name="description" style="width:100%;" value="<?php echo $description_tmp; ?>">
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" >Investigation Report:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" required=""  name="investigation" style="width:100%;">
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" >Under Constitutional Act:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" required=""  name="act" style="width:100%;">
      </div>
    </div>
	
<div class="form-group">
      <label class="control-label col-sm-2" >Investigation Department/Team:</label>
      <div class="col-sm-10">          
        <input type="text" class="form-control" required=""  name="inv_dpt" style="width:100%;">
      </div>
    </div>
	
	<div class="form-group">
      <label class="control-label col-sm-2" >Status:</label>
      <div class="col-sm-10">          
        <select name="status"><option>--Select--</option>
		<option>Under Process</option>
		<option>FAKE</option>
	
		
		</select>
      </div>
    </div>
	

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <input type="submit" class="btn btn-default" name="process" value="Submit Report">
      </div>
    </div>
  </form>

<?php
 if(isset($_POST['process']))
 {
 	$title=$_POST['title'];
	$location=$_POST['location'];
	$accused=$_POST['accused'];
	$description=$_POST['description'];
	$investigation=$_POST['investigation'];
	$act=$_POST['act'];
	$inv_dpt=$_POST['inv_dpt'];
	$status=$_POST['status'];
	$uniq_no=mt_rand(1000,9999);
	$x="domestic violence/";
	$fileNo=$x.$uniq_no;
	echo $fileNo;
	$sql="insert into process values('','$title','$location','$accused','$description','$investigation','$act','$inv_dpt','$status','$fileNo')";
	$result=mysqli_query($conn, $sql) or die("Error:database not connected");
	echo "<script>window.location='fake_info.php'</script>";

 }
?>


</div>

</div>
</div><!--- container --->
</body>
</html>

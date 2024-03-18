<!DOCTYPE html>
<html lang="en">
<!---<?php
      include "config.php";
      session_start();
      if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        echo "Session is active";
      } else {
        echo "<script>window.location='admin_log.php'</script>";
      }
      ?> --->

<head>
  <title>process</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

  <style>
    h1 {

      text-align: center;
      color: green;
      font-size: 40px;
      text-decoration: underline;
      font-weight: 600;
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
      background-color: #1766e8;
    }

    body {

      background-image: url('images/rpr2.jpg');
      color: #fb6a0b;
    }
  </style>

</head>

<body>


  <div class="container">
    <h1> REPORT </h1>


    <?php

    if (isset($_GET['id'])) {
      $id = $_GET['id'];
      $_SESSION['id'] = $id;
      $sql = "select * from process where id = '$id'";
      $result = mysqli_query($con, $sql) or die("Error:");
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {

          $title = $row['title'];
          $_SESSION['title'] = $title;
          $location = $row['location'];
          $_SESSION['location'] = $location;
          $accused = $row['accused'];
          $_SESSION['accused'] = $accused;
          $description = $row['description'];
          $_SESSION['description'] = $description;

          $investi_rprt = $row['investi_rprt'];
          $_SESSION['investi_rprt'] = $investi_rprt;

          $inv_dpt = $row['inv_dpt'];
          $_SESSION['inv_dpt'] = $inv_dpt;

          $act = $row['act'];
          $_SESSION['act'] = $act;

          $status = $row['status'];
          $_SESSION['status'] = $status;

          $fileNo = $row['fileNo'];
          $_SESSION['fileNo'] = $fileNo;
        }
      }
      $title_tmp = $_SESSION['title'];
      $location_tmp = $_SESSION['location'];
      $accused_tmp = $_SESSION['accused'];
      $description_tmp = $_SESSION['description'];

      $investi_rprt_tmp = $_SESSION['investi_rprt'];

      $inv_dpt_tmp = $_SESSION['inv_dpt'];

      $act_tmp = $_SESSION['act'];

      $status_tmp = $_SESSION['status'];

      $fileNo_tmp = $_SESSION['fileNo'];
    }


    ?>



    <div class="row" style="padding: 10px;">
      <div class="col-sm-12">
        <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

          <div class="form-group">
            <label class="control-label col-sm-2">Issues:</label>
            <div class="col-sm-10">
              <input type="text" readonly="" class="form-control" required="" name="title" style="width:100%;" value="<?php echo $title_tmp; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2">Location:</label>
            <div class="col-sm-10">
              <input type="text" readonly="" class="form-control" required="" name="location" style="width:100%;" value="<?php echo $location_tmp; ?>">
            </div>
          </div>

          <!------------------###############--------------------------->

          <div class="form-group">
            <label class="control-label col-sm-2">Images:</label>
            <div class="col-sm-10">


              <?php

              $id = $_GET['id'];
              $_SESSION['id'] = $id;
              $sql = "select * from issue where id= '$id'";
              $result = mysqli_query($con, $sql) or die("Error:data not found");
              if (mysqli_num_rows($result) > 0) {

                echo "<table class='table table-striped table-bordered' style=border:2px;>";


                echo " <th>Image1</th><th>Image2</th>";
                while ($row = mysqli_fetch_array($result)) {

                  echo "<tr>";
                  echo "<td><img src='../$row[5]'style='height:100px; width:100px;'></td>";


                  echo "<td><img src='../$row[6]'style='height:100px; width:100px;'></td>";

                  echo "</tr>";
                }
                echo "</table>";
              }

              ?>


            </div>
          </div>












          <!--------------------####################------------------------>



          <div class="form-group">
            <label class="control-label col-sm-2">Accused:</label>
            <div class="col-sm-10">
              <input type="text" readonly="" class="form-control" required="" name="accused" style="width:100%;" value="<?php echo $accused_tmp; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2">Description:</label>
            <div class="col-sm-10">
              <input type="text" readonly="" class="form-control" required="" name="description" style="width:100%;" value="<?php echo $description_tmp; ?>">
            </div>
          </div>



          <div class="form-group">
            <label class="control-label col-sm-2">Investigation Report:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" required="" readonly="" name="investigation" style="width:100%;" value="<?php echo $investi_rprt_tmp; ?>">
            </div>
          </div>



          <div class="form-group">
            <label class="control-label col-sm-2">Under Constitutional Act:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" required="" readonly="" name="act" style="width:100%;" value="<?php echo $act_tmp; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2">Investigation Department/Team:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" required="" readonly="" name="inv_dpt" style="width:100%;" value="<?php echo $inv_dpt_tmp; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2">File No:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" required="" readonly="" name="fileNo" style="width:100%;" value="<?php echo $fileNo_tmp; ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2">Status:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" required="" readonly="" name="status" style="width:100%;" value="<?php echo $status_tmp; ?>">

            </div>
          </div>

          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10 " style=" text-align: center; margin-top: 30px;">

              <button onclick="myFunction()" style="  background-color: #1d840b;color: black; width: 140px; height: 30px; border: 1px solid black; font-size: 20px">Print</button>

              <script>
                function myFunction() {
                  window.print();
                }
              </script>

            </div>
          </div>
        </form>


      </div>

    </div>
  </div><!--- container --->

</body>

</html>
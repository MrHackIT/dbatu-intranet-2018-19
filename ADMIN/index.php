<?php
error_reporting(1);
session_start();
$message="";
if(isset($_POST['submit'])){
$conn = mysqli_connect("localhost","root","","admin");
$result = "SELECT * FROM admin WHERE admin_id='" . $_POST["admin_id"] . "' and password = '". $_POST["admin_password"]."'";
$run = mysqli_query($conn,$result);
$row  = mysqli_fetch_assoc($run);
    if(is_array($row)) {
      $_SESSION["admin_id"] = $row['admin_id'];

      $_SESSION["admin_password"] = $row['password'];
      }
    else{
      $message = "Invalid Username or Password!";
      }
      $temp= $_SESSION["user_id"];

      $query1 = mysqli_query($conn,"SELECT `full_name` FROM `personal_details` WHERE `roll_no` = '" . $_SESSION["user_id"] . "'");
      $query2 = mysqli_fetch_array($query1);
      $_SESSION["full_name"] = $query2['full_name'];
/*$query1 = mysqli_query("SELECT `discipline` FROM `personal_details` WHERE `roll_no` = '" . $_SESSION["user_id"] . "'");
$query1 = mysqli_fetch_array($query1);
$_SESSION['discipline'] = $query1['discipline'];



$query = mysqli_query("SELECT * FROM `info_doc` WHERE `roll_no` = '" . $_SESSION["user_id"] . "' ");
$num = mysqli_num_rows($query);
if($num > 0)
{
header("Location:../dashboard/user_dashboard.php");
}
else
{
    $query = mysqli_query("SELECT * FROM `personal_details` WHERE `roll_no` = '" . $_SESSION["user_id"] . "' ");
$num = mysqli_num_rows($query);
if($num > 0)
{
header("Location:../FRONT/edudetails.php");
}

    else
    {
     */   if(isset($_SESSION["admin_id"]))
          {
            $_SESSION["user_role"]="admin";
            $_SESSION["isLoggedIn"] = true;
            header("Location:./admin.php");

          }


}

?>


<html>
<head>
    <title> Admin Panel</title>
		<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="css/bootstrap-table.css" rel="stylesheet">
		<link type="text/css" href="css/font-awesome.css" rel="stylesheet">
        <link type="text/css" href="css/custom.css" rel="stylesheet">

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-table.js"></script>




    </head>
<body>


        <div class="jumbotron padding_adjust">

            <div class="container">

                <div class="row">

                    <div class="col-lg-1">
                    <img src="images/batulogo.png" alt="LOGO" id="logo">
                    </div>

                    <div class="col-lg-1"></div>

                    <div class="col-lg-10">
                        <h2 id="college_name">Dr. Babasaheb Ambedkar Technological University</h2>
                    </div>

                    <div class="container">

                        <div class="row">
                            <div class="col-lg-1"></div>

                            <div class="col-lg-9" align="center">
                                <p>Welcome to Admin Section</p>
                            </div>

                            <div class="col-lg-2"></div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="container">
            <div id="loginbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                <div class="panel panel-info" >
                        <center> <br><?php echo $message;?></center>
                        <div style="padding-top:30px" class="panel-body" >


                            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                            <form id="loginform" class="form-horizontal" role="form" method="POST" action="">

                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                            <input id="login-username" type="text" class="form-control" name="admin_id"  placeholder="Enter Username">
                                        </div>

                                <div style="margin-bottom: 25px" class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                            <input id="login-password" type="password" class="form-control" name="admin_password" placeholder="Enter Password">
                                        </div>


                                    <div style="margin-top:10px" class="form-group">
                                        <!-- Button -->

                                        <div class="col-sm-12 controls">
                                          <center>
                                            <input type="submit" name="submit" class="btn btn-primary" value="Login now">
                                            <button type="reset" name="resetbtn" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Reset</button>
                                          </center>
                                        </div>
                                    </div>
                                </form>



                            </div>
                        </div>
            </div>
        </div>




      </body>
</html>

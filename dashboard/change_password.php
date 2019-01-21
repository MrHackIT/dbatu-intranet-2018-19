<?php
// error_reporting(1);
session_start();
$message=NULL;

	$servername = "localhost";
	$username = "root";
	$password = "";
    $dbname = "intranet";
    $conn = mysqli_connect("localhost","root","","intranet");
   



if( isset($_SESSION["isLoggedIn"]) ){
         if( $_SESSION["user_role"]!="stu" &&  $_SESSION["user_role"]!="fac" && $_SESSION["user_role"]!="nts" ){
            header( 'Location : ../LOGIN/restrictedAccess.php' );
            die();
        }
    }
    else{
       $url='../LOGIN/restrictedAccess.php';
       $var= file_get_contents($url);
       echo $var;
        die();
    }

if(isset($_POST['submit']))
{
	
	if($_POST["new_password"] != $_POST["confirm_password"])
	{
		$message = "<span class=\"msg text-red\">Entered Passwords don't match.</span>";
	}
	else
	{
		$temp = $_SESSION['user_id'];
		$res = mysqli_query( $conn, "SELECT * FROM login WHERE roll_no=$temp" );
		$row = mysqli_fetch_array($res);
		if($_POST['old_password']==$row['password'])
		{
			$qFlag = mysqli_query( $conn, "UPDATE login SET password='".$_POST['new_password']."' WHERE roll_no=$temp" );
			if( $qFlag )
			{
				$message = "<span class=\"msg text-green\">Password Changed Successfully.</span>"; 
			}
			else
			{
				$message = "<span class=\"msg text-red\">Oops! There was an error.</span>";
			}
		}
	}
	
	



}
?>	



<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Change Password - CampusConnect</title>
		<link href="../LOGIN/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
	</head>
	<body>
		<div class="container-fluid">
			<div class="">
				<div class="col-lg-12">
					<div class="jumbotron col-sm-12" id="headerBox">
						<div class="row">
							<div class="col-sm-2"><center><img src="../LOGIN/img/Batu_logo4.png" class="element" id="universityLogo"></center></div>
							<div class="col-sm-10">
								<h2 id="pageHeader" class="text-left">Dr Babasaheb Ambedkar Technological University</h2>
								<br><p class="text-center" id="subHeading">Welcome to the CampusConnect Portal!</p>
							</div>
						</div>
						
						<div class="row">
							<a href="../LOGIN/logout.php" class="btn btn-danger pull-right" align="right">Logout</a>
							<?php
    							$dashboard_url="";
    							switch( $_SESSION['user_role'] ){
        						case "fac":
            						$dashboard_url = "../dashboard/index.php";
            						break;

        						case "stu":
            						$dashboard_url = "../dashboard/user_dashboard.php";
            						break;

        						case "nts":
            						$dashboard_url = "../dashboard/ntsuser_dashboard.php";
            					break;
    }
?>
							<a href="<?php echo $dashboard_url; ?>" class="btn btn-primary pull-right" style="margin-right: 15px;"><span class="glyphicon glyphicon-home"></span></a>
&nbsp&nbsp

						</div>



					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<?php
				if($message!=NULL)
					echo $message;
			?>
			<h2 class="form-title-box">Change Password</h2>
			<form class="form-horizontal" method="POST">
				<div class="form-group">
					<label class="control-label col-sm-2" for="old_password">Old Password:</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" id="old_password" placeholder="Enter Old Password" name="old_password">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="new_password">New Password:</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" id="new_password" placeholder="Enter New password" name="new_password">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-2" for="confirm_password">Repeat New Password:</label>
					<div class="col-sm-4">
						<input type="password" class="form-control" id="confirm_password" placeholder="Confirm New password" name="confirm_password">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-4">
						<button type="submit" name="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</body>
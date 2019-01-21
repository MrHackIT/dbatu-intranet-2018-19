<?php
    error_reporting(1);
    session_start();
    if( isset($_SESSION["isLoggedIn"]) ){
         if( $_SESSION["user_role"]!="stu" ){
            $url='../LOGIN/restrictedAccess.php';
       $var= file_get_contents($url);
       echo $var;
        die();
        }
    }
    else{
       $url='../LOGIN/restrictedAccess.php';
       $var= file_get_contents($url);
       echo $var;
        die();
    }
?>
<?php
session_start();
error_reporting(1);
include 'isLoggedInStaff';
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, 'intranet');
   $temp = $_SESSION['user_id'];
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }

   mysqli_select_db('intranet');
?>


<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Post Edit Message - CampusConnect</title>

  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif|Lobster" rel="stylesheet">
    <link href="../login/css/bootstrap.min.css" rel="stylesheet">
    <link href="../login/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="../login/css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
</head>
<body>

	<div class="container-fluid">
      <div class="jumbotron col-sm-12" id="headerBox">
        <div class="col-sm-2"><center><img src="../LOGIN/img/Batu_logo4.png" class="element" id="universityLogo"></center></div>
        <div class="col-sm-10">
            <h2 id="pageHeader" class="text-left">Dr Babasaheb Ambedkar Technological University</h2>
            <br><p class="text-center" id="subHeading">Welcome to the CampusConnect Portal!</p>
        </div>
        <div class="row" id="socialLinks">
          <a href="#"><img src="../LOGIN/img/icons/linkedin_icon.png" alt="Link to LinkedIn page" class="socialMediaIcons" align="right"></a>
          <a href="#"><img src="../LOGIN/img/icons/twitter_icon.png" alt="Link to Twitter page" class="socialMediaIcons" align="right"></a>
          <a href="#"><img src="../LOGIN/img/icons/fb_icon.png" alt="Link to Facebook page" class="socialMediaIcons" align="right"></a>
        </div>
      </div>
      <div class="col-sm-3"></div>
      <center>
      <div class="col-sm-6" id="messageBox">
      	<p class="messageText">Your changes have been saved.
      	<br><br>You will be redirected to an appropriate page after 5 seconds. Please wait.
      	<br><br>If you're not automatically redirected, <a href="../dashboard/ntsuser_dashboard.php"><u>click here</u></a>.</p>  
      	<?php
            if($_SESSION['origin']=="edit_bank_details")
            {
                echo "<br><br><a href=\"../dashboard/view_files.php\" class=\"btn btn-primary\"><u>Click Here</u></a> to view the files you have uploaded.</p>";
            }
      		$url = "../dashboard/ntsuser_dashboard.php";
      		header("refresh:5;url=$url");
      	?> 	
      </div>
      </center>

    <script src="../login/js/jquery-3.1.1.js"></script>
    <script src="../login/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../login/js/bootstrapValidator.min.js" type="text/javascript"></script>
           
     
</body>
</html>
<?php
    error_reporting(1);
    session_start();
    if( isset($_SESSION["isLoggedIn"]) ){
         if( $_SESSION["user_role"]!="fac" ){
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
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard</title>
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
                                <div class="col-sm-9">
                                <h2 id="pageHeader" class="text-left">Dr Babasaheb Ambedkar Technological University</h2>
                                <h3 class="text-center" id="subHeading">Welcome to the CampusConnect Portal!</h3>
                                </div>
                            </div>

                            
                        </div>

                    </div>

                </div>
            </div>

            <div class="container-fluid">
                <div class="">
                    <div class="col-lg-12">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION["t_full_name"];?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav navbar-right">

                <li>
                    <a href="../Faculty/t_edit_personal_details.php">View & Edit Profile</a>
                </li>
                <li>
                    <a href="../Faculty/view.php">Uploaded Documents</a>
                </li>
                <li>
                    <a href="../resources/index.php">Online Resources Library</a>
                </li>
                <li>
                    <a href="../resources/upload.php">Upload Course Material </a>
                </li>
                <li class="btn-acc">
                	<a href="change_password.php">Account &amp; Settings</a>
                </li>

        </ul>
    </div>
    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>




</body>

</html>

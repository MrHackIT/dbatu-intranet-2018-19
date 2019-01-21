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
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
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
      <a class="navbar-brand" href="#">Welcome <?php echo $_SESSION["user_id"];?></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
      <ul class="nav navbar-nav navbar-right">
        <li>
                    <a href="../FRONT/edit_personal_details.php">View & Edit Profile</a>
                </li>
                <li>
                    <a href="../FRONT/view.php">Uploaded Documents</a>
                </li>
                <li>
                    <a href="../resources/index.php">Online Resources Library</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
                
        </ul>
    </div>
  </div>
</nav>
</div></div></div>




  
</body>

</html>

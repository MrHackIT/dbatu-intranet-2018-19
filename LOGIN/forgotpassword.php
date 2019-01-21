<?php
error_reporting(1);
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';

$message="";



/*$conn = mysqli_connect("localhost","root","","intranet");
$result = mysqli_query($conn,"SELECT dob, mname FROM personal_details WHERE roll_no='".$_POST['user_id']."'");
$row  = mysqli_fetch_array($result);*/


if(isset($_POST['submit']))
{
$conn = mysqli_connect("localhost","root","","intranet");
$result = mysqli_query($conn,"SELECT dob, mname FROM personal_details WHERE roll_no='".$_POST['user_id']."'");
$row  = mysqli_fetch_array($result);
    
    if($_POST['dob']==$row['dob'])
    {
        if($_POST['mname']==$row['mname'])
        {
            if($_POST['passwd1']==$_POST['passwd2'])
            {
                $sql="UPDATE login SET password='".$_POST['passwd1']."' WHERE roll_no='".$_POST['user_id']."'";
                $result1 = mysqli_query($conn,$sql);
                $message="Password changed successfully";
                mysqli_close($conn);
            }
            else
            {
                
                mysqli_close($conn);
                $message="Something is not right. Please try again.";
                
            }
        }
        else
        {
            
            mysqli_close($conn);
            $message="Something is not right. Please try again.";
        }
    }
    else
    {
        
        mysqli_close($conn);
        $message="Something is not right. Please try again.";
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Restore Password</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/master.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif|Lobster" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 element queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	    <script type="text/javascript" src="js/bootstrap.js"></script>
      <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
  </head>
  <body>
    <div class="container-fluid">
      <div class="jumbotron col-sm-12" id="headerBox">
        <div class="col-sm-2"><center><img src="img/Batu_logo4.png" class="element" id="universityLogo"></center></div>
        <div class="col-sm-10">
            <h2 id="pageHeader" class="text-left">Dr Babasaheb Ambedkar Technological University, Lonere</h2>
            <br><p class="text-center" id="subHeading">Welcome to the CampusConnect Portal!</p>
        </div>
        <div class="row">
          <a href="#"><img src="img/icons/linkedin_icon.png" alt="Link to LinkedIn page" class="socialMediaIcons" align="right"></a>
          <a href="#"><img src="img/icons/twitter_icon.png" alt="Link to Twitter page" class="socialMediaIcons" align="right"></a>
          <a href="#"><img src="img/icons/fb_icon.png" alt="Link to Facebook page" class="socialMediaIcons" align="right"></a>
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
                                          <input id="login-username" type="text" class="form-control" name="user_id"  placeholder="Enter Username">
                                      </div>
                              <div style="margin-bottom: 25px" class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                         <input class="form-control" placeholder="Mother Name" type="text" name="mname" id="mothername" required>
                                      </div>
                              
                              <div style="margin-bottom: 25px" class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input class="form-control" placeholder="DD/MM/YYYY" type="date" name="dob" id="dob" required>
                              </div>

                              <div style="margin-bottom: 25px" class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                          <input id="login-password" type="password" class="form-control" name="passwd1" placeholder="Enter Password">
                                      </div>
                              <div style="margin-bottom: 25px" class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                          <input id="login-password" type="password" class="form-control" name="passwd2" placeholder="Re-enter Password">
                                      </div>


                                  <div style="margin-top:10px" class="form-group">
                                      <!-- Button -->

                                      <div class="col-sm-12 controls">
                                        <center>
                                          <input type="submit" name="submit" class="btn btn-primary">
                                          <button type="reset" name="resetbtn" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Reset</button>
                                        </center>
                                      </div>
                                  </div>


                                  <div class="form-group">
                                      <div class="col-md-12 control">
                                          <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                              <center>Not a member on CampusConnect !?!</center><br>
                                          <br><center><a class="btn btn-warning text-center" href="#openModal"><span class="glyphicon glyphicon-arrow-right"></span> Proceed to Registration now <span class="glyphicon glyphicon-arrow-right"></span></a></center>
                                          </div>
                                      </div>
                                  </div>
                              </form>



                          </div>
                      </div>
          </div>
      </div>


<!--Modal Box-->
      <center>
        <div id="openModal" class="modalbg">
          <div class="dialog">
                  <a href="#close" title="Close" class="close">X</a>
                  <img src="img/connections.png" class="modalHeader">
                <div class="col-lg-pull-11 row">
                  <div class="col-lg-5 text-center"><p><br><br><a href="reg_student.php" class="btn btn-primary"><span  class="glyphicon glyphicon-education"></span> Click here</a><br>if you're a <strong><br><b>STUDENT</b></strong></p></div>
                  <div class="col-lg-1"></div>
                  <div class="col-lg-5 text-center"><p><br><br><a href="reg_faculty.php" class="btn btn-success"><span class="glyphicon glyphicon-user"></span> Click here</a><br>if you're a <strong><br><b>FACULTY MEMBER</b></strong></p></div>
      	        </div>
    	    </div>
        </div>
      </center>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../login/js/bootstrap.min.js"></script>
    <script src="js/index.js"></script>
    <script src="../login/js/jquery-1.11.1.js">

    </script>

  </body>
</html>
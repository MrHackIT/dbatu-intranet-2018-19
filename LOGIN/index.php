<?php
error_reporting(1);
session_start();
$message="";
if(isset($_POST['submit']))
{

    $conn = mysqli_connect("localhost","root","","intranet");
    $row = NULL;
    switch( $_POST['user_role'] ) /* Execution when selected choice was student */
    {
        case "student":
            $result = mysqli_query( $conn, 'SELECT * FROM login WHERE roll_no="'.$_POST['user_id'].'" AND password="'.$_POST['user_name'].'" AND role="stu"' );
            $row = mysqli_fetch_array($result);
            if( is_array($row) ) /*If a row was found*/
            {
                /*Setting the session variables*/
                $_SESSION["user_id"] = $row['roll_no'];
                $_SESSION["user_name"] = $row['password'];
                $_SESSION["user_role"] = $row['role'];
                /*Storing the full name of the user by setting session variables*/
                $temp= $_SESSION["user_id"];
                $query1 = mysqli_query($conn,"SELECT `full_name` FROM `personal_details` WHERE `roll_no` = '" . $_SESSION["user_id"] . "'");
                $query2 = mysqli_fetch_array($query1);
                $_SESSION["full_name"] = $query2['full_name'];
                $_SESSION["isLoggedIn"] = true;
                header("Location:../dashboard/user_dashboard.php");
            }
            else /*Else execute this*/
            {
                $message = "<span class=\"glyphicon glyphicon-warning-sign\" style=\"font-size: 2rem\"></span> Invalid Credentials Entered !!";
            }
            break;

        case "faculty":

            $result = mysqli_query( $conn, 'SELECT * FROM login WHERE email="'.$_POST['user_id'].'" AND password="'.$_POST['user_name'].'" AND role="fac"' );
            $row = mysqli_fetch_array($result);
            if( is_array($row) ) /*If a row was found*/
            {

                /*Setting the session variables*/
                $_SESSION["user_id"] = $row['roll_no'];
                $_SESSION["user_name"] = $row['password'];
                $_SESSION["user_role"] = $row['role'];
                /*Storing the full name of the user by setting session variables*/
                $temp= $_SESSION["user_id"];
                $query1 = mysqli_query($conn,"SELECT `t_full_name` FROM `t_personal_details` WHERE `t_emp_id` = '" . $_SESSION["user_id"] . "'");
                $query2 = mysqli_fetch_array($query1);
                $_SESSION["t_full_name"] = $query2['t_full_name'];
                $_SESSION["isLoggedIn"] = true;
                header("Location:../dashboard/index.php");
            }
            else /*Else execute this*/
            {

                $message = "<span class=\"glyphicon glyphicon-warning-sign\" style=\"font-size: 2rem\"></span> Invalid Credentials Entered !!";
            }
            break;

        default:
            $message = "<span class=\"glyphicon glyphicon-warning-sign\" style=\"font-size: 2rem\"></span> Invalid Credentials Entered !!";
    }

    /*Storing the full name of the user by setting session variables*/
    $temp= $_SESSION["user_id"];
    $query1 = mysqli_query($conn,"SELECT `full_name` FROM `personal_details` WHERE `roll_no` = '" . $_SESSION["user_id"] . "'");
    $query2 = mysqli_fetch_array($query1);
    $_SESSION["full_name"] = $query2['full_name'];
}

?>





<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Select Position - CampusConnect</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/master.css" rel="stylesheet">
	    <script type="text/javascript" src="js/bootstrap.js"></script>

  </head>
  <body>
    <div class="container-fluid">
      <div class="jumbotron col-sm-12" id="headerBox">
        <div class="col-sm-2"><center><img src="img/Batu_logo4.png" class="element" id="universityLogo"></center></div>
        <div class="col-sm-10">
            <h2 id="pageHeader" class="text-left">Dr Babasaheb Ambedkar Technological University, Lonere</h2>
            <h3 class="text-center" id="subHeading">Welcome to the CampusConnect Portal!
            <a href="#"><img src="img/icons/linkedin_icon.png" alt="Link to LinkedIn page" class="socialMediaIcons" align="right"></a>
            <a href="#"><img src="img/icons/twitter_icon.png" alt="Link to Twitter page" class="socialMediaIcons" align="right"></a>
            <a href="#"><img src="img/icons/fb_icon.png" alt="Link to Facebook page" class="socialMediaIcons" align="right"></a></h3>
        </div>

      </div>

      <div class="container">
          <div class="linkbox col-sm-12 col-md-4 visible-md visible-lg">
            <ul>
              <li>
                <h5><a href="/integrated/downloads/dbatuactenglish.pdf" target="_blank">University Act</a></h5>
              </li>
              <li>
                <h5><a href="/integrated/downloads/dbaturulesregulations.pdf" target="_blank">University Rules and Regulations</a></h5>
              </li>
              <li>
                <h5><a href="/integrated/downloads/dbatuordinances.pdf" target="_blank">University Ordinances</a></h5>
              </li>
              <li>
                <h5><a href="/integrated/downloads/dbatustatutes.pdf" target="_blank">University Statues</a></h5>
              </li>
              <li>
                <h5><a href="/integrated/downloads/BATUAR20152016.pdf" target="_blank">Annual Report</a></h5>
              </li>
              <li>
                <h5>TEQIP</h5>
                <ol>
                  <li>
                    <a href="#">TEQIP I</a>
                  </li>
                  <li>
                    <a href="#">TEQIP II</a>
                  </li>
                  <li>
                    <a href="#">TEQIP III</a>
                  </li>
                </ol>
              </li>
              <li>
                <h5>University Governance Bodies</h5>
                <ol>
                  <li>
                    <h5>Executive Council</h5>
                      <ul>
                        <li>

                          <a href="/integrated/downloads/EC.pdf" target="_blank">Members List </a>

                        </li>

                        <li>
                          <a href="#">Minutes of Meeting </a>
                        </li>

                      </ul>

                  </li>
                  <li>
                    <h5>Academic Council</h5>
                    <ul>
                        <li>

                          <a href="/integrated/downloads/AC.pdf" target="_blank">Members List </a>

                        </li>

                        <li>
                          <a href="#">Minutes of Meeting </a>
                        </li>

                      </ul>
                  </li>
                  <li>
                    <h5>Finance Committee</h5>
                    <ul>
                        <li>

                          <a href="/integrated/downloads/FC.pdf" target="_blank">Members List </a>

                        </li>

                        <li>
                          <a href="#">Minutes of Meeting </a>
                        </li>

                      </ul>
                  </li>
                  <li>
                    <h5>Planning and Evaluation ( Monitoring ) Board</h5>
                    <ul>
                        <li>

                          <a href="/integrated/downloads/PlanningandEvaluationMonitoringBoard.pdf" target="_blank">Members List </a>

                        </li>

                        <li>
                          <a href="#">Minutes of Meeting </a>
                        </li>

                      </ul>
                  </li>
                  <li>
                    <h5>Building and Works Committee</h5>
                    <ul>
                        <li>

                          <a href="/integrated/downloads/BuildingandWorksCommittee.pdf" target="_blank">Members List </a>

                        </li>

                        <li>
                          <a href="#">Minutes of Meeting </a>
                        </li>

                      </ul>
                  </li>
                </ol>
              </li>
              <li>
                <h5>Hostels</h5>
                <ul>
                  <li>
                    <a href="#">Sahyagiri  </a>
                  </li>
                  <li>
                    <a href="#">Gagangiri</a>
                  </li>
                  <li>
                    <a href="#">Alaknanda </a>
                  </li>
                  <li>
                    <a href="#">Dhawalgiri </a>
                  </li>
                  <li>
                    <a href="#">Malaygiri</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <div id="loginbox" style="margin-top:10px;" class="mainbox col-sm-12 col-md-4">
              <div class="panel panel-info" >
                      <center> <br><?php echo $message;?></center>
                      <div style="padding-top:30px" class="panel-body" >


                          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

                          <form id="loginform" class="form-horizontal" role="form" method="POST" action="">

                              <div class="input-group radio-choice-container row">
                                          <div class="radio-choice-box">
                                          <!-- Student's radio button option -->
                                          <input type="radio" id="radio-student" name="user_role" value="student" checked>
                                          <label for="radio-student">Student</label>
                                          </div>
                                          <div class="radio-choice-box">
                                          <!-- Faculty Member's radio button option -->
                                          <input type="radio" id="radio-faculty" name="user_role" value="faculty">
                                          <label for="radio-faculty">Faculty Member</label>
                                          </div>
                              </div>
                              <div style="margin-bottom: 25px" class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                          <input id="login-username" type="text" class="form-control" name="user_id"  placeholder="Enter Username">
                                      </div>

                              <div style="margin-bottom: 25px" class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                          <input id="login-password" type="password" class="form-control" name="user_name" placeholder="Enter Password">
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
                                              <center>Not a member on CampusConnect !?!</center>
                                          <br><center><a class="btn btn-warning text-center" href="#openModal"><span class="glyphicon glyphicon-arrow-right"></span> Proceed to Registration now <span class="glyphicon glyphicon-arrow-right"></span></a></center>
                                          </div>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
          </div>
          <div class="marqueebox col-sm-12 col-md-4 visible-md visible-lg">
            <span class="notice-brd-title">Notice Board</span>
            <marquee loop="infinite">
              Welcome to CampusConnect - The Intranet Portal
            </marquee>
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
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../login/js/jquery-1.11.1.js"></script>

    <script src="../login/js/bootstrap.min.js"></script>
    <script src="../login/js/index.js"></script>



  </body>
</html>

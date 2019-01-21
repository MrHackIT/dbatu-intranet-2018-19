<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Select Position - CampusConnect</title>

    <!-- Bootstrap -->
    <link href="../LOGIN/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../LOGIN/css/master.css">
    <link href="../googleFonts/googleFonts.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	    <script type="text/javascript" src="js/bootstrap.js"></script>

  </head>
  <body>
    <div class="container-fluid">
      <div class="jumbotron col-sm-12" id="headerBox">
        <div class="col-sm-2"><center><img src="../LOGIN/img/Batu_logo4.png" class="element" id="universityLogo"></center></div>
        <div class="col-sm-10">
            <h2 id="pageHeader" class="text-left">Dr Babasaheb Ambedkar Technological University, Lonere</h2>
            <br><p class="text-center" id="subHeading">Welcome to the CampusConnect Portal!</p>
        </div>
      </div>
      <div class="container">
          <div id="" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
              <div class="panel panel-info" >
                      <div style="padding-top:30px" class="panel-body text-center" >
                        <div class="queryResult">
                          <?php
                            error_reporting(1);
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "intranet";

                            // Create connection
                            $conn = mysqli_connect($servername, $username, $password, $dbname);
                            // Check connection
                            if (!$conn) {
                              die("Connection failed: " . mysqli_connect_error());
                            }

                            if(isset($_POST["submitbtn"]))
    {
        $error = 0;
        if (isset($_POST['registrationUsername']) && !empty($_POST['registrationUsername'])) {
            $username=mysqli_real_escape_string($conn,trim($_POST['registrationUsername']));
        }else{
            $error = 1;
            $empty_username="Username Cannot be empty.";
            echo $empty_username.'<br>';
        }
        if (isset($_POST['emailID']) && !empty($_POST['emailID'])) {
            $email=mysqli_real_escape_string($conn,trim($_POST['emailID']));
        }else{
            $error =1;
            $empty_email="Email cannot be empty.";
            echo $empty_email.'<br>';
        }

        if (isset($_POST['registrationPassword']) && !empty($_POST['registrationPassword'])) {
            $psw=mysqli_real_escape_string($conn,trim($_POST['registrationPassword']));
        }else{
            $error = 1;
            $empty_password="Password cannot be empty";
            echo $empty_password.'<br>';
        }

        if(!$error)
        {

            $sql="select * from login where (roll_no='$username' or email='$email');";
            $res=mysqli_query($conn,$sql);
            if (mysqli_num_rows($res) > 0)
            {
            // output data of each row
              $row = mysqli_fetch_assoc($res);
              echo "Username or Email already exists.";
              $url = "reg_faculty.php";
            }
        else
        { //here you need to add else condition
           $sql = "INSERT INTO login (roll_no, email, password, role) VALUES ('$username', '$email', '$psw', 'fac');
           INSERT INTO t_personal_details (t_emp_id) VALUES ('$username');
           INSERT INTO t_banking_doc (t_emp_id) VALUES ('$username');
           INSERT INTO t_edu_details (t_emp_id) VALUES ('$username');
           INSERT INTO t_aicte_details (t_emp_id) VALUES ('$username')";
          //  $sql .= "INSERT INTO t_personal_details (t_emp_id) VALUES ('$username');";
          //  $sql .= "INSERT INTO t_professional_details (t_emp_id) VALUES ('$username');";
          //  $sql .= "INSERT INTO t_banking_doc (t_emp_id) VALUES ('$username');";
          //  $sql .= "INSERT INTO t_edu_details (t_emp_id) VALUES ('$username')";


                                  if (mysqli_multi_query($conn, $sql)) {
                                      echo "You've Completed the registration succesfully !!";
                                      $url = "reg_faculty.php";
                                    }
                                  else {
                                      echo "Oops!! There seems to be an error. Please try again.";
                                      $url = "reg_faculty.php";
                                      }
        }
        }
    }

                              mysqli_close($conn);
                              ?>
                        </div>
                        <br>
                        <center><p>You'll be redirected to appropriate page. Please be patient.</p></center>
                      </div>
                </div>
          </div>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-1.11.1.js">

    </script>

  </body>
</html>

<?php
  header("refresh:5;url=$url");
 ?>

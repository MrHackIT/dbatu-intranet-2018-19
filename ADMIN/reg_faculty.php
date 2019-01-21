<?php
session_start();
/*if ( isset( $_SESSION["isLoggedIn"] ){
  if ( $_SESSION["user_role"]!="admin" ) {
    session_destroy();
    $url = "../LOGIN/restrictedAccess.php";
    $var = file_get_contents($url);
    echo $var;
    die();
  }
}
else{
  session_destroy();
    $url = "../LOGIN/restrictedAccess.php";
    $var = file_get_contents($url);
    echo $var;
    die();
}*/
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Register a New Student - CampusConnect</title>

    <!-- Bootstrap -->
    <link href="../LOGIN/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../LOGIN/css/master.css">
    <link href="../googleFonts/googleFonts.css" rel="stylesheet">
    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
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
        <div class="row">
          <p class="text-right"><a href="admin.php" class="btn btn-primary"><span class="glyphicon glyphicon-home"></span></a></p>
        </div>
      </div>
      <div class="container">
          <div id="registrationbox" style="margin-top:10px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
              <div class="panel panel-info" >

                      <div style="padding-top:30px" class="panel-body" >

                          <div style="display:none" id="registrationAlert" class="alert alert-danger col-sm-12"></div>

                          <form id="registrationForm" class="form-horizontal" method="POST" action="faculty.php">

                            <div style="margin-bottom: 25px" class="input-group col-md-12">
                                        <label for="registrationUsername">Enter Employee ID : </label>
                                        <input id="registrationUsername" name="registrationUsername" type="text" class="form-control" name="username" value="">
                            </div>

                            <div style="margin-bottom: 25px" class="input-group col-md-12">
                                        <label for="emailID">Enter e-Mail address : </label>
                                        <input id="emailID" name="emailID" type="email" class="form-control" name="username" value="">
                            </div>

                            <div style="margin-bottom: 25px" class="input-group col-md-12">
                                        <label for="registrationPassword">Enter new password : </label>
                                        <input id="registrationPassword" name="registrationPassword" type="password" class="form-control" name="password">
                            </div>

                            <div style="margin-bottom: 25px" class="input-group col-md-12">
                                        <label for="confirmPassword">Confirm password : </label>
                                        <input id="confirmPassword" name="confirmPassword" type="password" class="form-control" name="password">
                            </div>

                                  <div style="margin-top:10px" class="form-group">
                                      <!-- Button -->

                                      <div class="col-sm-12 controls">
                                        <center>
                                          <button type="submit" name="submitbtn" class="btn btn-primary" onclick="validateForm()"><span class="glyphicon glyphicon-plus-sign"></span> Submit</button>
                                          <button type="reset" name="resetbtn" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Reset</button>
                                        </center>
                                      </div>
                                  </div>
                              </form>



                          </div>
                      </div>
          </div>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-1.11.1.js"></script>
    <script src="js/bootstrapValidator.min.js" type="text/javascript"></script>


  </body>
</html>


    <script type="text/javascript">
        $(document).ready(function(){
            var validator= $("#registrationForm").bootstrapValidator({


                fields : {
                    registrationUsername : {
                        message : "Employee ID is required",
                        validators : {
                            notEmpty : {
                                message : "Please provide your Employee ID provided by the University."
                            }
                        }
                    },

                     emailID : {
                         validators : {
                            notEmpty : {
                                message : "Please provide your email address."
                            },
                             emailAddress : {
                                 message : "Email address is Invalid."
                             }
                        }
                    },

                    registrationPassword: {
                      validators: {
                        identical: {
                          field: 'confirmPassword',
                          message: "Confirm your Password below - make sure that you\'ve typed the same Password."
                                  }
                                }
                              },
        confirmPassword: {
            validators: {
                identical: {
                            field: 'registrationPassword',
                            message: "The password don\'t match !?!"
                          }
                        }
                      },
                }
            });
        });
    </script>

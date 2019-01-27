<?php
    //error_reporting(1);
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
<?php
ob_start();
//error_reporting(1);
session_start();
include 'isLoggedIn.php';
  $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $dbname = 'intranet';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);


   $temp = $_SESSION['user_id'];

//echo "$temp";
    if(! $conn ) {
      die('Could not connect: ' . mysqli_connect_error());
   }
   $t_score_10=0;
      $sql = "SELECT * FROM  t_edu_details WHERE t_emp_id=$temp";


$retval = mysqli_query($conn, $sql);
   $row = mysqli_fetch_array($retval,MYSQLI_ASSOC);

 if(isset($_POST['submit_edu']))
        {
          //aicte variable----
          $t_aicte_diploma_or_12=$_POST['t_twelth'];

            $t_score_10=$_POST['t_tenth'];
            $t_passing_10=$_POST['t_pass_tenth'];
            $t_passing_university_10=$_POST['t_board_tenth'];

            $t_score_12=$_POST['t_twelth'];
            $t_passing_12=$_POST['t_pass_twelth'];
            $t_passing_university_12=$_POST['t_board_twelth'];

            $t_ug_marks=$_POST['t_ug'];
            $t_passing_ug=$_POST['t_pass_ug'];
            $t_passing_university_ug=$_POST['ug_university'];


            $t_pg_marks=$_POST['t_pg'];
            $t_passing_pg=$_POST['t_pass_pg'];
            $t_passing_university_pg=$_POST['pg_university'];

            $t_phd_marks=$_POST['t_phd'];
            $t_passing_phd=$_POST['t_pass_phd'];
            $t_passing_university_phd = $_POST['t_passing_university_phd'];

            $t_postphd_marks=$_POST['t_postphd_marks'];
            $t_passing_postphd=$_POST['t_passing_postphd'];
            $t_passing_university_postphd = $_POST['t_passing_university_postphd'];

            $t_other_marks=$_POST['t_other_marks'];
            $t_passing_other=$_POST['t_passing_other'];
            $t_passing_university_other = $_POST['t_passing_university_other'];

            $t_fields_experties = $_POST['t_field_of_expertise'];
            $t_other_activity = $_POST['t_other'];


      $query1=mysqli_query($conn,"UPDATE t_edu_details
                                  SET t_score_10='$t_score_10',
                                      t_score_12='$t_score_12',
                                      t_ug_marks='$t_ug_marks',
                                      t_pg_marks='$t_pg_marks',
                                      t_phd_marks='$t_phd_marks',
                                      t_passing_10='$t_passing_10',
                                      t_passing_12='$t_passing_12',
                                      t_passing_ug='$t_passing_ug',
                                      t_passing_pg='$t_passing_pg',
                                      t_passing_phd='$t_passing_phd',

                                      t_passing_university_10='$t_passing_university_10',
                                      t_passing_university_12='$t_passing_university_12',
                                      t_passing_university_ug='$t_passing_university_ug',
                                      t_passing_university_pg='$t_passing_university_pg',
                                      t_passing_university_phd='$t_passing_university_phd',
                                      t_postphd_marks='$t_postphd_marks',
                                      t_passing_postphd='$t_passing_postphd',
                                      t_passing_university_postphd='$t_passing_university_postphd',
                                      t_other_marks='$t_other_marks',
                                      t_passing_other='$t_passing_other',
                                      t_passing_university_other='$t_passing_university_other',
                                      t_fields_experties='$t_fields_experties',
                                      t_other_activity='$t_other_activity' WHERE t_emp_id='$temp'");

      $aicte_query = mysqli_query($conn, "UPDATE t_aicte_details
                                          SET t_aicte_diploma_or_12='$t_aicte_diploma_or_12' WHERE t_emp_id='$temp'");
      if($query1 && $aicte_query)
      {
      header('location:post_edit_msg.php');
      }


}

   mysqli_close($conn);

?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Educational Details</title>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="../LOGIN/css/bootstrap.min.css" rel="stylesheet">
<link href="../LOGIN/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="../LOGIN/css/bootstrapValidator.min.css" rel="stylesheet">
<link href="../LOGIN/style.css" rel="stylesheet">
<link href="../LOGIN/css/style.css" rel="stylesheet">
<link href="../LOGIN/css/bootstrap.css" rel="stylesheet" />
<link href="../LOGIN/css/font-awesome.css" rel="stylesheet" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">



</head>

<body>
<style>
    .container{
        width: 90%;
    }

    .form-group{
        margin-bottom:5px;

    }
     .green {
          color: green
      }
      .red{
          color:red
      }
    </style>

        <div id="page-content-wrapper">


		<div class="text-center" style="padding-top: 10px; padding-bottom: 10px; background-color: #eee;">
            <h1 style="font-size:40px;">Education Details</h1>
        </div>
<?php include 'topBar.php'; ?>


        </div>



        <!--div class="col-sm-offset-1">
        <h3 align="center">Welcome</h3>  <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><span class="glyphicon glyphicon-list"></span> More</a>
        </div-->



		 <p style="margin:50px"></p>
   <div class="row row-content">
     <div class="col-xs-12 col-sm-12">
     <ul class="prg_track">
     <li class="active"><a href="t_edit_personal_details.php">Personal Details</a></li>
     <li><a href="t_edit_edu_details.php">Educational Details</a></li>
     <li><a href="t_edit_banking_details.php">Account Details</a></li>
     <li><a href="t_edit_professional_details.php">Professional Details</a></li>
     <li><a href="t_edit_aicte_details.php">AICTE Details</a></li>
     </ul>
     </div></div>

		 <p style="margin:50px"></p>

        <div class="container">

          <div class="row">
              <form class="form" id="t_edu_det" action="" method="post"  enctype="multipart/form-data">

		<div class="panel-body" style="font-size:100%">
          <div class="form-group">
                				<div class="col-sm-3">
                					<label class="control-label"><h3><u>Exams</u></h3></label>
                                </div>
                				<div class="col-sm-3">
                					<label class="control-label"><h3><u>CGPA/Percent</u></h3></label>
                                </div>
                                <div class="col-sm-3">
                					 <label class="control-label"><h3><u>Passing Year</u></h3></label>
                                </div>
                                <div class="col-sm-3">
                					<label class="control-label"><h3><u>State Board</u></h3></label>
                                </div>
                			</div>

							 <div class="col-sm-12">
                     <div class="form-group">
                                <div class="col-sm-3">
                                <label class="control-label"><h4>10<sup>th</sup></h4><p style="padding:9px"></p></label>
                                </div>
                                <div class="col-sm-3">
                                <input type="text" placeholder="10th Percentage" value="<?php echo $row['t_score_10']?>" class="form-control" id="t_tenth" name="t_tenth" >
                                </div>
                               			  <div class="col-sm-3">
                				        <input type="text" placeholder="10th Passing Year" value="<?php echo $row['t_passing_10']?>" class="form-control" id="t_pass_10" name="t_pass_tenth" >
                                </div>

                                <div class="col-sm-3">
                					<div class="form-group">
                                            <select name="t_board_tenth" class="form-control" id="t_10board"  >

                                             <option value="<?php echo $row['t_passing_university_10']; ?>"><?php echo $row['t_passing_university_10']; ?></option>
                                            <option value="">------------Select State------------</option>
											<option value="cbsc">CBSC</option>
                                            <option value="issc">ICSC</option>
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Orissa">Orissa</option>
                                            <option value="Pondicherry">Pondicherry</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttaranchal">Uttaranchal</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="West Bengal">West Bengal</option>
                                            </select>
                                    </div>
                                </div>

                			</div>
          </div>

							 <div class="col-sm-12">
                <div class="form-group">
                				<div class="col-sm-3 ">
                				<label class="control-label"><h4>12<sup>th</sup>/ Diploma</h4><p style="padding:9px"></p></label>
                                </div>
                                <div class="col-sm-3 ">
                					<input type="text" placeholder="12th Percentage" value="<?php echo $row['t_score_12']?>" class="form-control" id="t_twelth" name="t_twelth">
                                </div>
                                <div class="col-sm-3 ">
                					 <input type="text" class="form-control" value="<?php echo $row['t_passing_12']?>"  placeholder="12th Passing Year" id="t_pass_12" name="t_pass_twelth" >
                                </div>
                                <div class="col-sm-3 ">
                					<div class="form-group">
                                                    <select name="t_board_twelth" class="form-control" id="t_12board" >
                                                    <option value="<?php echo $row['t_passing_university_12']; ?>"><?php echo $row['t_passing_university_12']; ?></option>
                                            <option value="">------------Select State------------</option>
												    <option value="cbsc">CBSC</option>
                                                    <option value="issc">ICSC</option>
                                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                                    <option value="Assam">Assam</option>
                                                    <option value="Bihar">Bihar</option>
                                                    <option value="Chandigarh">Chandigarh</option>
                                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                                    <option value="Daman and Diu">Daman and Diu</option>
                                                    <option value="Delhi">Delhi</option>
                                                    <option value="Goa">Goa</option>
                                                    <option value="Gujarat">Gujarat</option>
                                                    <option value="Haryana">Haryana</option>
                                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                                    <option value="Jharkhand">Jharkhand</option>
                                                    <option value="Karnataka">Karnataka</option>
                                                    <option value="Kerala">Kerala</option>
                                                    <option value="Lakshadweep">Lakshadweep</option>
                                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                                    <option value="Maharashtra">Maharashtra</option>
                                                    <option value="Manipur">Manipur</option>
                                                    <option value="Meghalaya">Meghalaya</option>
                                                    <option value="Mizoram">Mizoram</option>
                                                    <option value="Nagaland">Nagaland</option>
                                                    <option value="Orissa">Orissa</option>
                                                    <option value="Pondicherry">Pondicherry</option>
                                                    <option value="Punjab">Punjab</option>
                                                    <option value="Rajasthan">Rajasthan</option>
                                                    <option value="Sikkim">Sikkim</option>
                                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                                    <option value="Tripura">Tripura</option>
                                                    <option value="Uttaranchal">Uttaranchal</option>
                                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                                    <option value="West Bengal">West Bengal</option>
                                                    </select>
                                    </div>
                                </div>
                			</div>
          </div>

          <div class="col-sm-12">
                     <div class="form-group">
                                <div class="col-sm-3">
                				<label class="control-label"><h4>UG Degree</h4><p style="padding:9px"></p></label>
                                </div>
                                <div class="col-sm-3">
                				<input type="text" placeholder="C.G.P.A." value="<?php echo $row['t_ug_marks']?>"  class="form-control" id="t_ug" name="t_ug" >
                                </div>
                                <div class="col-sm-3">
                					 <input type="text" class="form-control"  value="<?php echo $row['t_passing_ug']?>" placeholder="Passing Year" id="t_pass_ug" name="t_pass_ug" >
                                </div>
                                <div class="col-sm-3">
                					<input type="text" placeholder="University" value="<?php echo $row['t_passing_university_ug']?>" class="form-control" name="ug_university" >
                                </div>
                			</div>
          </div>
          <div class="col-sm-12">
                     <div class="form-group">
                                <div class="col-sm-3">
                				<label class="control-label"><h4>PG Degree</h4><p style="padding:9px"></p></label>
                                </div>
                                <div class="col-sm-3">
                				<input type="text" placeholder="C.G.P.A."  value="<?php echo $row['t_pg_marks']?>" class="form-control" id="t_pg" name="t_pg">
                                </div>
                                <div class="col-sm-3">
                					 <input type="text" class="form-control" value="<?php echo $row['t_passing_pg']?>" placeholder="Passing Year" id="t_pass_pg" name="t_pass_pg">
                                </div>
                                <div class="col-sm-3">
                					<input type="text" placeholder="University"  value="<?php echo $row['t_passing_university_pg']?>" class="form-control" name="pg_university">
                                </div>
                			</div>
          </div>
          <div class="col-sm-12">
                     <div class="form-group">
                                <div class="col-sm-3">
                				<label class="control-label"><h4>PhD</h4><p style="padding:9px"></p></label>
                                </div>
                                <div class="col-sm-3">
                				<input type="text" placeholder="Grading Scale"  value="<?php echo $row['t_phd_marks']?>" class="form-control" id="t_phd" name="t_phd"  >
                                </div>
                                <div class="col-sm-3">
                					 <input type="text"  class="form-control"  value="<?php echo $row['t_passing_phd']?>" placeholder="PhD Passing Year" id="t_pass_phd" name="t_pass_phd">
                                </div>
                                <div class="col-sm-3">
                					<input type="text" placeholder="PhD University"  value="<?php echo $row['t_passing_university_phd']?>" class="form-control" name="t_passing_university_phd" >
                                </div>
                    </div>
          </div>
          <div class="col-sm-12">
                     <div class="form-group">
                                <div class="col-sm-3">
                				<label class="control-label"><h4>Post Doctoral Fellowship</h4><p style="padding:9px"></p></label>
                                </div>
                                <div class="col-sm-3">
                				<input type="text" placeholder="Grading Scale"  value="<?php echo $row['t_postphd_marks']?>" class="form-control" id="t_postphd" name="t_postphd_marks">
                                </div>
                                <div class="col-sm-3">
                					 <input type="text" class="form-control" value="<?php echo $row['t_passing_postphd']?>" placeholder="Receiving Year" id="t_pass_postphd" name="t_passing_postphd">
                                </div>
                                <div class="col-sm-3">
                					<input type="text" placeholder="University"  value="<?php echo $row['t_passing_university_postphd']?>" class="form-control" name="t_passing_university_postphd">
                                </div>
                			</div>
          </div>
           <div class="col-sm-12">
                     <div class="form-group">
                                <div class="col-sm-3">
                				<label class="control-label"><h4>Others</h4><p style="padding:9px"></p></label>
                                </div>
                                <div class="col-sm-3">
                				<input type="text" placeholder="Grading Scale"  value="<?php echo $row['t_other_marks']?>" class="form-control" id="t_other" name="t_other_marks">
                                </div>
                                <div class="col-sm-3">
                					 <input type="text" class="form-control" value="<?php echo $row['t_passing_other']?>" placeholder="Receiving Year" id="t_pass_other" name="t_passing_other">
                                </div>
                                <div class="col-sm-3">
                					<input type="text" placeholder="University"  value="<?php echo $row['t_passing_university_other']?>" class="form-control" name="t_passing_university_other">
                                </div>
                			</div>
          </div>




    </div>
  </div>
</div>
        <div class="row">
        <div class="panel panel-info">
        <div class="panel-heading"><h1 class="panel-title" style="color:black">Portfolio</h1></div>
        <div class="panel-body" style="font-size:120%">
        <div class="row">

            <div class="col-sm-5 col-sm-offset-1">
               <div class="form-group">
                   <label for="skills">Field of Expertise</label><br>
                   <textarea class="form-control" rows="7" name="t_field_of_expertise"><?php echo $row['t_fields_experties'];?></textarea>
               </div>
            </div>

            <div class="col-sm-5">
	           <div class="form-group">
	               <label for="workintern">Other Activities</label><br>
	               <textarea class="form-control" rows="7" name="t_other"><?php echo $row['t_other_activity'];?></textarea>
	 	       </div>
	       </div>
        </div>
        </div>
        </div>
        </div>
        </div>

	    <div class="form-group">
                        <div class="col-xs-8 col-xs-offset-2 col-lg-4 col-lg-offset-4">
                            <p style="padding: 5px;"></p>
                        <button type="submit" name="submit_edu" class="btn btn-primary btn-block">Save &amp; Continue</button>
                        </div>
                       </div>
    </form>
            </div>
              </div>

   <p style="padding:40px;"></p>
     <footer  class="row-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-5 col-xs-offset-1 col-sm-3 col-sm-offset-1">
                    <h4>Links :</h4>
                    <ul class="list-unstyled">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Menu</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-sm-4">
                    <h4>Our Address :</h4>
                    <address>
		              Dr. Babasaheb Ambedkar Technological University,<br>Lonere campus,<br>
                    Maharashtra 402103 <br><br>

		          </address>
                </div>
               <div class="col-xs-12 col-sm-4">
                   <h4>Contact :</h4>
                <span class="glyphicon glyphicon-earphone"></span> Prof. Mukund Kulkarni : +91 94212 52368<br>

		        <span class="glyphicon glyphicon-earphone"></span> Dr. Brijesh Iyer: +91 94030 02289<br>
                </div>
                <div class="col-xs-12">
                    <p style="padding:10px;"></p>
                    <p align=center>\A92017 DBATU. All rights reserved. </p>
                </div>
            </div>
        </div>
    </footer>

			<!-- jQuery and BOOTstrap JS-->


			 <script src="../LOGIN/js/jquery-1.11.1.js"></script>
    <script src="../LOGIN/js/bootstrap.min.js" type="text/javascript"></script>
	<!--BootstrapValidator-->
    <script src="../LOGIN/js/bootstrapValidator.min.js" type="text/javascript"></script>


			<!--<script type="text/javascript">
			 $(document).ready(function()
        {
            var validator= $("#t_edu_det").bootstrapValidator({


                fields : {
                    t_tenth : {
                        message : "State rank is required",
                        validators : {
                            notEmpty : {
                                message : "Please provide tenth score."
                            }
                        }
                    },

						 t_pass_tenth : {
                        message : "State rank is required",
                        validators : {
                            notEmpty : {
                                message : "Please provide tenth passing year"
                            }
                        }
                    },


					 t_board_tenth : {
                        message : "State rank is required",
                        validators : {
                            notEmpty : {
                                message : "Please provide tenth passing university."
                            }
                        }
                    },


					 t_twelth : {
                        message : "State rank is required",
                        validators : {
                            notEmpty : {
                                message : "Please provide twelth marks."
                            }
                        }
                    },

					 t_pass_twelth: {
                        message : "State rank is required",
                        validators : {
                            notEmpty : {
                                message : "Please provide twelth passing year."
                            }
                        }
                    },



					 t_board_twelve : {
                        message : "State rank is required",
                        validators : {
                            notEmpty : {
                                message : "Please provide twelth board of passing."
                            }
                        }
                    },


					 t_btech : {
                        message : "State rank is required",
                        validators : {
                            notEmpty : {
                                message : "Please provide btech score."
                            }
                        }
                    },


                     t_pass_btech : {
                        message : "State rank is required",
                        validators : {
                            notEmpty : {
                                message : "Please provide btech passing year."
                            }
                        }
                    },

                   btech_university : {
                        message : "State rank is required",
                        validators : {
                            notEmpty : {
                                message : "Please provide btech passing university."
                            }
                        }
                    },

				 t_mtech : {
                        message : "State rank is required",
                        validators : {
                            notEmpty : {
                                message : "Please provide mtech score."
                            }
                        }
                    },


               t_pass_mtech : {
                        message : "State rank is required",
                        validators : {
                            notEmpty : {
                                message : "Please provide mtech passing year."
                            }
                        }
                    },


					 mtech_university : {
                        message : "State rank is required",
                        validators : {
                            notEmpty : {
                                message : "Please provide mtech passing university."
                            }
                        }
                    },

                     t_field_of_expertise : {
                        message : "State rank is required",
                        validators : {
                            notEmpty : {
                                message : "Please provide field of experties."
                            }
                        }
                    },


				 </script>-->

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
<script>
    $("#tgl").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>
</body>
</html>

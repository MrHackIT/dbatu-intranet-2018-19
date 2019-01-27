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
ob_start();
error_reporting(1);
session_start();
include 'isLoggedInStudent.php';
   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';

   $conn = mysqli_connect($dbhost, $dbuser, $dbpass, "intranet");
   $temp = $_SESSION['user_id'];
   if( !$conn ) {
      die('Could not connect: ' . mysqli_error());
   }


$_SESSION['roll_no']=$_POST['roll_no'];
$post_photo =   $_SESSION["user_id"].".jpg";
$post_photo_tmp = $_FILES['gen_domi_certi']['tmp_name'];

$ext = pathinfo($post_photo,PATHINFO_EXTENSION);

if($ext == 'jpg' || $ext == 'jpeg' || $ext == 'JPG' || $ext == 'JPEG')
{
    $src=imagecreatefromjpeg($post_photo_tmp);
}

    list($width_min,$height_min) = getimagesize($post_photo_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$src,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"bank/general_domi/".$post_photo,80);



        $gen_income =   $_SESSION["user_id"].".jpg";
$gen_income_tmp = $_FILES['gen_income_certi']['tmp_name'];

$extc = pathinfo($gen_income,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($gen_income_tmp);
}

    list($width_min,$height_min) = getimagesize($gen_income_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"bank/gen_income/".$gen_income,80);



         $oth_income =   $_SESSION["user_id"].".jpg";
$oth_income_tmp = $_FILES['oth_income_cert']['tmp_name'];

$extc = pathinfo($oth_income,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($oth_income_tmp);
}

    list($width_min,$height_min) = getimagesize($oth_income_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"bank/oth_income/".$oth_income,80);




        $oth_domi =   $_SESSION["user_id"].".jpg";
$oth_domi_tmp = $_FILES['oth_domi_cert']['tmp_name'];

$extc = pathinfo($oth_domi,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($oth_domi_tmp);
}

    list($width_min,$height_min) = getimagesize($oth_domi_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"bank/oth_domi/".$oth_domi,80);



          $oth_cast =   $_SESSION["user_id"].".jpg";
$oth_cast_tmp = $_FILES['oth_cast_cert']['tmp_name'];

$extc = pathinfo($oth_cast,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($oth_cast_tmp);
}

    list($width_min,$height_min) = getimagesize($oth_cast_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"bank/oth_cast/".$oth_cast,80);






         $oth_vali =  $_SESSION["user_id"].".jpg";
$oth_vali_tmp = $_FILES['oth_vali_cert']['tmp_name'];

$extc = pathinfo($oth_vali,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($oth_vali_tmp);
}

    list($width_min,$height_min) = getimagesize($oth_vali_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"bank/oth_vali/".$oth_vali,80);



         $oth_non =   $_SESSION["user_id"].".jpg";
$oth_non_tmp = $_FILES['oth_non_creamy']['tmp_name'];

$extc = pathinfo($oth_non,PATHINFO_EXTENSION);

if($extc == 'jpg' || $extc == 'jpeg' || $extc == 'JPG' || $extc == 'JPEG')
{
    $srcc=imagecreatefromjpeg($oth_non_tmp);
}

    list($width_min,$height_min) = getimagesize($oth_non_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$srcc,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"bank/oth_non_creamy/".$oth_non,80);






   $sql = "SELECT * FROM bank_info_doc WHERE roll_no=$temp";
   $retval = mysqli_query($conn, $sql);
   $row = mysqli_fetch_assoc($retval);
   if(isset($_POST['submit'])){
$bank_name=$_POST['bank_name'];
$acc_no=$_POST['acc_no'];
$branch_ifsc=$_POST['branch_ifsc'];
$branch_name=$_POST['branch_name'];
$adhar_no=$_POST['adhar_no'];
$query1=mysqli_query($conn,"update bank_info_doc set bank_name='$bank_name', acc_no='$acc_no', branch_ifsc='$branch_ifsc', branch_name='$branch_name', adhar_no='$adhar_no' WHERE roll_no='$temp'");
if($query1)
{

header('location: post_edit_msg.php');
}
 mysqli_close($conn);
}

   mysqli_close($conn);
?>





<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>Banking Information and Documents</title>
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
    <style>
    .container{
        width: 95%;
    }
         .green {
          color: green
      }
      .red{
          color:red
      }
    </style>
</head>
<body>
<div id="wrapper">

         <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Welcome  <?php echo $_SESSION["user_id"] ?>&nbsp;&nbsp;&nbsp;  <button class="btn btn-xs" id="tgl">&times;</button>
                    </a>
                </li>

                <li>
                    <a href="../dashboard/user_dashboard.php"><span  class="glyphicon glyphicon-home"></span> Dashboard</a>
                </li>
                <li>
                    <a href="#"><span  class="glyphicon glyphicon-pencil"></span> Registration</a>
                </li>
                <li>
                    <a href="#"><span  class="glyphicon glyphicon-folder-open"></span> Course Material</a>
                </li>
                <li>
                    <a href="#"><span  class="glyphicon glyphicon-play"></span> Videos</a>
                </li>

            </ul>
        </div>
        <div id="page-content-wrapper">
        <div class="text-center" style="padding-top: 10px; padding-bottom: 10px; background-color: #eee;">
            <h1>Banking Information</h1>
        </div>
      </div>
      <?php include 'topBar.php'; ?>
<p style="padding:40px;"></p>
<div class= "col-md-2"></div>
<div class= "col-md-10">
<div class="row row-content">
            <center><div class="col-xs-12 col-sm-12">
            <ul class="prg_track">
            <li class="active"><a href="edit_personal_details.php">Personal Details</a></li>
            <li class="active"><a href="edit_edu_details.php">Educational Details</a></li>
            <li><a href="edit_bank_details.php">Banking Information</a></li>
            </ul>
            </div></center>
            </div></div>
        <p style="padding:20px;"></p>
        <p style="margin:50px"></p>
<div class="container">
 <form class="form" id="bankdetails" action="" method="POST" enctype="multipart/form-data">
	<div class="panel-group">
		<div class="panel panel-info">
       <div class="panel-heading"><h1 class="panel-title" style="color:black">Banking Information and Documents <a title="This information will be tranferred to student section for scholarship purpose." onClick="alert('This information will be tranferred to student section for scholarship purpose.')"><img src="index.jpg" height="13px"/></a></h1></div>
      <div class="panel-body">

	  	<div class="form-group">
	             <label for="sel" class="control-label">Select Bank<font style="color:#FF0000">*</font></label><br/>
	             <div class="col-xs-12 col-lg-7">
				 <select class="form-control" name="bank_name" id="sel">
	                     <option value="<?php echo $row['bank_name']; ?>" selected><?php echo $row['bank_name']; ?></option>
                         <option value="Allahabad Bank">Allahabad Bank</option>
                         <option value="Andhra Bank">Andhra Bank</option>
						 <option value="Axis Bank">Axis Bank</option>
             <option value="Bank of Maharashtra">Bank of Maharashtra</option>
             <option value="Corporation Bank">Corporation Bank</option>
						 <option value="Bank of India">Bank of India</option>
						 <option value="Bank of Maharashtra">Bank of Maharashtra</option>
 			  		 <option value="Canara Bank">Canara Bank</option>
 						 <option value="Central Bank of India">Central Bank of India</option>
 						 <option value="City Union Bank">City Union Bank</option>
 						 <option value="Corporation Bank">Corporation Bank</option>
 						 <option value="Deutsche Bank">Deutsche Bank</option>
 						 <option value="Development Credit Bank">Development Credit Bank</option>
  					 <option value="Dhanlaxmi Bank">Dhanlaxmi Bank</option>
 						 <option value="Federal Bank">Federal Bank</option>
 						 <option value="ICICI Bank">ICICI Bank</option>
 						 <option value="IDBI Bank">IDBI Bank</option>
 						 <option value="Indian Bank">Indian Bank</option>
 						 <option value="Indian Overseas Bank">Indian Overseas Bank</option>
 						 <option value="IndusInd Bank">IndusInd Bank</option>
 						 <option value="ING Vysya Bank">ING Vysya Bank</option>
 						 <option value="Jammu and Kashmir Bank">Jammu and Kashmir Bank</option>
 						 <option value="Karnataka Bank Ltd">Karnataka Bank Ltd</option>
  					 <option value="Karur Vysya Bank">Karur Vysya Bank</option>
 						 <option value="Kotak Bank">Kotak Bank</option>
  					 <option value="Laxmi Vilas Bank">Laxmi Vilas Bank</option>
  					 <option value="Oriental Bank of Commerce">Oriental Bank of Commerce</option>
 						 <option value="Punjab National Bank - Corporate Banking">Punjab National Bank - Corporate Banking</option>
 						 <option value="Punjab National Bank - Retail Banking">Punjab National Bank - Retail Banking</option>
 						 <option value="Punjab &amp; Sind Bank">Punjab &amp; Sind Bank</option>
 						 <option value="Shamrao Vitthal Co-operative Bank">Shamrao Vitthal Co-operative Bank</option>
 						 <option value="South Indian Bank">South Indian Bank</option>
 						 <option value="State Bank of Bikaner &amp; Jaipur">State Bank of Bikaner &amp; Jaipur</option>
 						 <option value="State Bank of Hyderabad">State Bank of Hyderabad</option>
 						 <option value="State Bank of India">State Bank of India</option>
  					 <option value="State Bank of Mysore">State Bank of Mysore</option>
 						 <option value="State Bank of Patiala">State Bank of Patiala</option>
  					 <option value="State Bank of Travancore">State Bank of Travancore</option>
 						 <option value="Syndicate Bank">Syndicate Bank</option>
 						 <option value="Tamilnad Mercantile Bank Ltd.">Tamilnad Mercantile Bank Ltd.</option>
  					 <option value="UCO Bank">UCO Bank</option>
  					 <option value="Union Bank of India">Union Bank of India</option>
  					 <option value="United Bank of India">United Bank of India</option>
  					 <option value="Vijaya Bank">Vijaya Bank</option>
 						 <option value="Yes Bank Ltd">Yes Bank Ltd</option>
                       </select>
	             </div>
	  </div>
	  <br/><br/><br>
	  <div class="form-group">
	  <label for="acc1" class="control-label">Account No<font style="color:#FF0000">*</font></label><br />
	  	<div class="col-xs-12 col-lg-7">
	  <input class="form-control" placeholder="Enter the account number" value="<?php echo $row['acc_no']; ?>" type="text" name="acc_no" id="acc1">
	 	 </div>
	  </div>


	   <br/><br/><br>
	  <div class="form-group">
	  <label for="ifsc" class="control-label">Branch IFSC<font style="color:#FF0000">*</font></label><br />
	  	<div class="col-xs-12 col-lg-7">
	  <input class="form-control" placeholder="Enter the IFSC Code" value="<?php echo $row['branch_ifsc']; ?>" type="text" name="branch_ifsc" id="ifsc">
	 	 </div>
	  </div>

	   <br/><br/><br>
	  <div class="form-group">
	  <label for="bname" class="control-label">Branch Name <font style="color:#FF0000">*</font></label><br />
	  	<div class="col-xs-12 col-lg-7">
	  <input class="form-control" placeholder="Enter the branch name" type="text" value="<?php echo $row['branch_name']; ?>" name="branch_name" id="bname">
	 	 </div>
	  </div>

	   <br/><br/><br>
	  <div class="form-group">
	  <label for="adhaar" class="control-label">Adhaar Number<font style="color:#FF0000">*</font></label><br />
	  	<div class="col-xs-12 col-lg-7">
	  <input class="form-control" placeholder="Enter the adhaar number" type="text" value="<?php echo $row['adhar_no']; ?>" name="adhar_no" id="adhaar">
	 	 </div>
	  </div>
	   <br/><br/>

          </div>
</div>
    </div>
<div class="panel panel-info">
      <div class="panel-heading"><h1 class="panel-title" style="color:black">Other Documents <a title="Files Should Be Scanned Copy of Documents.Each File Must Be Less Than 100KB" onClick="alert('Files Should Be Scanned Copy of Documents.Each File Must Be Less Than 200KB.')"><img src="index.jpg" height="13px"/></a></h1></div>
      <div class="panel-body">

                    <div class="form-group">
                    <label class="col-sm-12 control-label">Category wise Documents(only scanned files can be uploaded)<font style="color:#FF0000"> *</font></label>
                    <div class="col-sm-12">
                        </div>
          </div>
                        <div class="row">

			          <div class="col-sm-8 col-lg-4">
					     <div class="customDiv">
	                        <div class="radio">
	                            <label><input type="radio" value="genral" name="categorySelect" onClick="selectedGeneral()">General</label>
	                        </div>

					 	<div class="form-group">
	               <label for="inputdecipline">Income Certificate</label><br>
	               <div class="col-sm-7 col-lg-7">


	                   <input class="form-control" type="file" accept="image/*" id="generalid" name="gen_income_certi" disabled="disabled">
	                    <output id="list"></output>
					 </div>

	            </div>
                        <br><br>     <br><br>

				   <div class="form-group">
	               <label for="inputdecipline">Domicile Certificate</label><br>
	               <div class="col-sm-7 col-lg-7">

	                   <input class="form-control" type="file" accept="image/*" id="domicile" name="gen_domi_certi"   disabled="disabled">

					 </div>

	            </div>
				<br><br>


				<br><br>
						 </div>
                            </div>
					  <div class="col-sm-8 col-lg-4">
					      <div class="customDiv">
					         <div class="radio">
 	                            <label><input type="radio" value="other" name="categorySelect" onClick="selectedOther()">Other</label>
	                         </div>

							 <div class="form-group">
	               <label for="inputdecipline">Income Certificate</label><br>
	               <div class="col-sm-7 col-lg-7">

	                   <input class="form-control" type="file" accept="image/*"  name="oth_income_cert" id="otherid" disabled="disabled">

					 </div>

	            </div>
				<br><br><br><br>

	          <div class="form-group">
	               <label for="inputdecipline">Domicile Certificate</label><br>
	               <div class="col-sm-7 col-lg-7">

	                   <input class="form-control" type="file" accept="image/*" id="domicerti"  name="oth_domi_cert"  disabled="disabled">

					 </div>
	            </div>


				<br><br><br><br>

                              <div class="form-group">
	               <label for="inputdecipline">Caste Certificate</label><br>
	               <div class="col-sm-7 col-lg-7">
	                   <input class="form-control" type="file" accept="image/*" id="caste"   name="oth_cast_cert"  disabled="disabled">

					 </div>
	            </div>

                        <br><br><br><br>


                              <div class="form-group">
	               <label for="inputdecipline">Caste Validity Certificate</label><br>
	               <div class="col-sm-7 col-lg-7">
	                   <input class="form-control" type="file" accept="image/*" name="oth_vali_cert"  id="validity" disabled="disabled">

					 </div>
	            </div>

                                                          <br><br> <br><br>

                              <div class="form-group">
	               <label for="inputdecipline">Non-Creamy layer Certificate</label><br>
	               <div class="col-sm-7 col-lg-7">
	                   <input class="form-control" type="file" accept="image/*" id="cremylayer" name="oth_non_creamy" disabled="disabled">

					 </div>
	            </div>

						 </div>
                            </div>
					  </div>


             </div>

    <p style="padding:20px;"></p>
    <div class="form-group">
                        <div class="col-xs-8 col-xs-offset-2 col-lg-3 col-lg-offset-4">
                            <p style="padding: 5px;"></p>
                            <input type="submit" class="btn btn-primary btn-block" name="submit" id="submit" value="Save & Continue">
                        </div>
                       </div>
                      </div>
					  </form>
					 </div>

     <p style="padding:40px;"></p>
     <?php include "footer.php"; ?>
    <script src="js/jquery-3.1.1.js"></script>
    <script src="../login/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../login/js/bootstrapValidator.min.js" type="text/javascript"></script>


    <script type="text/javascript">

         $(document).ready(function(){
            var validator= $("#bankdetails").bootstrapValidator({
            fields : {

                /*   bank_name : {
                        validators : {
                            notEmpty : {
                                message : "Please Provide Your Bank Name."
                            }
                        }
                    },

                     acc_no : {
                             validators : {
                                notEmpty : {
                                    message : "Please provide your Account Number."
                                }
                            }
                        },
                    branch_ifsc : {
                         validators : {
                                notEmpty : {
                                    message : "Please provide your Bank IFSC Code."
                                }
                            }
                    },
                    branch_name : {
                         validators : {
                                notEmpty : {
                                    message : "Please provide Branch Name."
                                }
                            }
                    },

                    adhar_no :{
                         validators : {
                                notEmpty : {
                                    message : "Please provide your Aadhar Number."
                                }
                            }
                    },

        */
                gen_income_certi : {
                         validators : {
                             file: {
                                 extension: 'jpg,jpeg,png',
                                 maxSize: 202400,
                                 message: 'selected file is not supported or bigger.'
                             }

                        }
                    },

                gen_domi_certi : {
                         validators : {
                             file: {
                                 extension: 'jpg,jpeg,png',
                                 maxSize: 202400,
                                 message: 'selected file is not supported or bigger.'
                             }

                        }
                    },
                oth_income_cert : {
                         validators : {
                             file: {
                                 extension: 'jpg,jpeg,png',

                                 maxSize: 202400,
                                 message: 'selected file is not supported or bigger.'
                             }

                        }
                    },
                oth_domi_cert : {
                         validators : {
                             file: {
                                 extension: 'jpg,jpeg,png',

                                 maxSize: 202400,
                                 message: 'selected file is not supported or bigger.'
                             }

                        }
                    },
                oth_cast_cert : {
                         validators : {
                             file: {
                                 extension: 'jpg,jpeg,png',

                                 maxSize: 202400,
                                 message: 'selected file is not supported or bigger.'
                             }

                        }
                    },
                oth_vali_cert : {
                         validators : {
                             file: {
                                 extension: 'jpg,jpeg,png',

                                 maxSize: 202400,
                                 message: 'selected file is not supported or bigger.'
                             }

                        }
                    },
                oth_non_creamy : {
                         validators : {
                             file: {
                                 extension: 'jpg,jpeg,png',

                                 maxSize: 202400,
                                 message: 'selected file is not supported or bigger.'
                             }

                        }
                    },

            }

            });
        });

    function selectedGeneral(){
     document.getElementById("generalid").disabled = false;
     document.getElementById("domicile").disabled = false;
     document.getElementById("otherid").disabled = true;
     document.getElementById("domicerti").disabled = true;
     document.getElementById("caste").disabled = true;
     document.getElementById("cremylayer").disabled = true;
     document.getElementById("validity").disabled = true;
    }



    function selectedOther(){
     document.getElementById("generalid").disabled = true;
     document.getElementById("domicile").disabled = true;
     document.getElementById("otherid").disabled = false;
     document.getElementById("domicerti").disabled = false;
     document.getElementById("caste").disabled = false;
     document.getElementById("cremylayer").disabled = false;
     document.getElementById("validity").disabled = false;
    }



    </script>

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
    </div></div>
  </body>
</html>

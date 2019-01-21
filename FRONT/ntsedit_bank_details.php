<?php
    error_reporting(1);
    session_start();
    if( isset($_SESSION["isLoggedIn"]) ){
         if( $_SESSION["user_role"]!="nts" ){
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

session_start();
include 'isLoggedInStaff';

   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   $temp = $_SESSION['user_id'];
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }


      $sql = "SELECT * FROM ntsbanking_doc WHERE t_emp_id=$temp";

      echo $temp;

   mysqli_select_db($conn,'intranet');
   $retval = mysqli_query($conn,$sql );
   $row = mysqli_fetch_assoc($retval);

   if(isset($_POST['t_submit_bank']))
{
$t_bank_name=$_POST['t_bank_name'];
$t_acc_no=$_POST['t_acc_no'];
$t_branch_ifsc=$_POST['t_branch_ifsc'];
$t_branch_name=$_POST['t_branch_name'];
$t_adhar_no=$_POST['t_adhar_no'];
$t_pan_card_no=$_POST['t_pan_card'];
$t_voter_id_no=$_POST['t_voter_id'];

$query3=mysqli_query($conn,"UPDATE ntsbanking_doc SET t_bank_name='$t_bank_name',t_acc_no='$t_acc_no',t_branch_ifsc='$t_branch_ifsc',t_branch_name='$t_branch_name',t_adhar_no='$t_adhar_no',t_pan_card_no='$t_pan_card_no',t_voter_id_no='$t_voter_id_no' WHERE t_emp_id='$temp'");
if($query3)
{
header('location:ntspost_edit_msg.php');
}
}

   mysqli_close($conn);




?>








<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Banking Information and Documents</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

 <link href="../login/css/bootstrap.min.css" rel="stylesheet">
<link href="../login/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="../login/css/bootstrapValidator.min.css" rel="stylesheet">
<link href="../login/style.css" rel="stylesheet">
<link href="../login/css/style.css" rel="stylesheet">
<link href="../login/css/bootstrap.css" rel="stylesheet" />
<link href="../login/css/font-awesome.css" rel="stylesheet" />
  
  

    <script src="../LOGIN/js/jquery-1.11.1.js"></script>
    <script src="../LOGIN/js/bootstrap.min.js" type="text/javascript"></script>
  <!--BootstrapValidator-->
    <script src="../LOGIN/js/bootstrapValidator.min.js" type="text/javascript"></script>


</head>
<style>
    .container{
        width: 95%;
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
        <div id="wrapper">

    
     <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Welcome  <?php echo $_SESSION["user_id"] ?>&nbsp;&nbsp;&nbsp;  <button class="btn btn-xs" id="tgl">&times;</button>
                    </a>
                </li>
        
                <li>
                    <a href="../dashboard/index.php"><span  class="glyphicon glyphicon-home"></span> Dashboard</a>
                </li>
                <li>
                    <a href="../resources/upload.php"><span  class="glyphicon glyphicon-folder-open"></span> Course Material</a>
                </li>
                <li>
                    <a href="../resources/index.php">Online Resources Library</a>
                </li>
               
            </ul>
        </div>
        <div id="page-content-wrapper">
<div class="jumbotron text-center">
   <h1 style="font-size:40px;">Account Details And Documents</h1>
</div>
    <p style="padding:40px;"></p>
     <div class="row">
        <div class="col-xs-3"><a href="#menu-toggle" class="btn btn-default pull-left" id="menu-toggle"><span class="glyphicon glyphicon-list"></span> More</a></div>
        <div class="col-xs-6"><h3 align="center">Welcome <?php echo $_SESSION["user_id"] ?> (Logged in as <b>Faculty</b>)</h3></div>
    <div class="col-xs-3"><a href="../LOGIN/logout.php" class="btn btn-danger pull-right">LOGOUT</a></div>
  </div>
     <p style="margin:50px"></p>
        <div class="row row-content">
            <div class="col-xs-12 col-sm-12">
            <ul class="prg_track">
            <li class="active"><a href="ntsedintspersonal_details.php">Personal Details</a></li>    
            <li><a href="ntsedit_edu_details.php">Educational Details</a></li>    
            <li><a href="ntsedit_bank_details.php">Account Details</a></li> 
            </ul>
            </div>
            </div>
<p style="margin:50px"></p>
<body>


<div class="container">
    <form class="form" id="banking" method="POST" action="" enctype="multipart/form-data">
  <div class="panel-group">
    <div class="panel panel-info">
      <div class="panel-heading"><h1 class="panel-title" style="color:black">Banking Information and Documents <a title="This information will be tranferred to student section for scholarship purpose." onClick="alert('This information will be tranferred to student section for scholarship purpose.')"><img src="index.jpg" height="13px"/></a></h1></div>

      <div class="panel-body">
      <div class="form-group">
    <div class="form-group">
               <label for="t_sel" class="label-control">Select Bank<font style="color:#FF0000">*</font></label><br/>
               <div class="col-xs-12 col-lg-7">
         <select class="form-control" name="t_bank_name" id="t_sel">
                       <option value="<?php echo $row['t_bank_name'] ?>" selected disabled><?php echo $row['t_bank_name'] ?></option>
                         <option>Allahabad Bank</option>
                         <option>Andhra Bank</option>
             <option>Axis Bank</option>
                         <option>Bank of Maharashtra</option>
                         <option>Corporation Bank</option>
             <option>Bank of India</option>
             <option>Bank of Maharashtra</option>
               <option>Canara Bank</option>
             <option>Central Bank of India</option>
             <option>City Union Bank</option>
             <option>Corporation Bank</option>
             <option>Deutsche Bank</option>
             <option>Development Credit Bank</option>
              <option>Dhanlaxmi Bank</option>
             <option>Federal Bank</option>
             <option>ICICI Bank</option>
             <option>IDBI Bank</option>
             <option>Indian Bank</option>
             <option>Indian Overseas Bank</option>
             <option>IndusInd Bank</option>
             <option>ING Vysya Bank</option>
             <option>Jammu and Kashmir Bank</option>
             <option>Karnataka Bank Ltd</option>
              <option>Karur Vysya Bank</option>
             <option>Kotak Bank</option>
              <option>Laxmi Vilas Bank</option>
              <option>Oriental Bank of Commerce</option>
             <option>Punjab National Bank - Corporate Banking</option>
             <option>Punjab National Bank - Retail Banking</option>
             <option>Punjab &amp; Sind Bank</option>
             <option>Shamrao Vitthal Co-operative Bank</option>
             <option>South Indian Bank</option>
             <option>State Bank of Bikaner &amp; Jaipur</option>
             <option>State Bank of Hyderabad</option>
             <option>State Bank of India</option>
              <option>State Bank of Mysore</option>
             <option>State Bank of Patiala</option>
              <option>State Bank of Travancore</option>
             <option>Syndicate Bank</option>
             <option>Tamilnad Mercantile Bank Ltd.</option>
              <option>UCO Bank</option>
              <option>Union Bank of India</option>
              <option>United Bank of India</option>
              <option>Vijaya Bank</option>
             <option>Yes Bank Ltd</option>
                       </select>
             </div>  </div>
    </div>
    <br/><br/><br>
    <div class="form-group">
    <div class="form-group">
    <label for="t_acc1" class="control-label">Account No<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Enter the account number" value="<?php echo $row['t_acc_no'] ?>" type="number" name="t_acc_no" id="t_acc1" />
          </div>
      </div>
    </div>


    <br/> <br/><br/>
    <div class="form-group">

    <label for="t_ifsc" class="control-label">Branch IFSC<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" value="<?php echo $row['t_branch_ifsc'] ?>" placeholder="Enter the IFSC Code" type="text" name="t_branch_ifsc" id="t_ifsc" />

     </div>
    </div>

     <br/><br/><br/>
    <div class="form-group">

    <label for="t_bname" class="control-label" >Branch Name <font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Enter the branch name" value="<?php echo $row['t_branch_name'] ?>" type="text" name="t_branch_name" id="t_bname" />
     </div>
    </div>

    <br/> <br/><br/>
    <div class="form-group">
    <label for="t_adhaar">Adhaar Number<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Enter the adhaar number" value="<?php echo $row['t_adhar_no'] ?>" type="number" name="t_adhar_no" id="t_adhaar" />
     </div>
    </div>

        <br/>   <br/><br/>

    <div class="form-group">
    <label for="t_pan" class="control-label" >PAN Card Number<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Enter the pan card number" value="<?php echo $row['t_pan_card_no'] ?>" type="number" name="t_pan_card" id="t_pan"  />
     </div>
    </div>


        <br/>   <br/><br/>
    <div class="form-group">
    <label for="t_voter" class="control-label">Voter Id Number<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Enter the voter number" value="<?php echo $row['t_voter_id_no'] ?>" type="number" name="t_voter_id" id="t_voter"   />
     </div>
    </div>
         <br/> <br><br>

</div>
        </div></div>
<div class="panel panel-info">
      <div class="panel-heading"><h1 class="panel-title" style="color:black">Other Documents <a title="Files Should Be Scanned Copy of Documents.Each File Must Be Less Than 100KB" onClick="alert('Files Should Be Scanned Copy of Documents.Each File Must Be Less Than 100KB.')"><img src="index.jpg" height="13px"/></a></h1></div>
      <div class="panel-body">

                    <div class="form-group">
                    <label class="col-sm-12 control-label">Category wise Documents(only scanned files can be uploaded)<font style="color:#FF0000"> *</font></label>
                    <div class="col-sm-12">
                        </div>
          </div>
                        <div class="row">

                <div class="col-sm-8 col-lg-4">
               <div class="customDiv">
                          <div class="checkbox">
                              <label><input type="checkbox" value="genral" name=" t_as[]" onClick="toggleTB(this,'t_generalid','t_domicile')">General</label>
                          </div>

            <div class="form-group">
                 <label for="inputdecipline">Income Certificate</label><br>
                 <div class="col-sm-7 col-lg-7">

                     <input class="form-control" type="file" accept="image/*" id="t_generalid" name="t_gen_income_certi" disabled="disabled">

           </div>

              </div>
                        <br><br>     <br><br>

           <div class="form-group">
                 <label for="t_inputdecipline">Domacile Certificate</label><br>
                 <div class="col-sm-7 col-lg-7">
                     <input class="form-control" type="file" accept="image/*" id="t_domicile" name="t_gen_domi_certi"   disabled="disabled">

           </div>

              </div>
        <br><br>


        <br><br>
             </div>
                            </div>
            <div class="col-sm-8 col-lg-4">
                <div class="customDiv">
                   <div class="checkbox">
                              <label><input type="checkbox" value="other" name="t_Other_category" onClick="toggleOther(this,'b','c','d','validity','t_cremylayer'')">Other</label>
                           </div>

               <div class="form-group">
                 <label for="t_inputdecipline">Income Certificate</label><br>
                 <div class="col-sm-7 col-lg-7">
                     <input class="form-control" type="file" accept="image/*"  name="t_oth_income_cert" id="b" disabled="disabled">
           </div>

              </div>
        <br><br><br><br>

            <div class="form-group">
                 <label for="t_inputdecipline">Domacile Certificate</label><br>
                 <div class="col-sm-7 col-lg-7">
                     <input class="form-control" type="file" accept="image/*" id="c"  name="t_oth_domi_cert"  disabled="disabled">
           </div>
              </div>


        <br><br><br><br>

                              <div class="form-group">
                 <label for="t_inputdecipline">Caste Certificate</label><br>
                 <div class="col-sm-7 col-lg-7">
                     <input class="form-control" type="file" accept="image/*" id="d"   name="t_oth_cast_cert"  disabled="disabled">
                     </div>
              </div>

                        <br><br><br><br>


                              <div class="form-group">
                 <label for="t_inputdecipline">Caste Validity Certificate</label><br>
                 <div class="col-sm-7 col-lg-7">
                     <input class="form-control" type="file" accept="image/*"   name="t_oth_vali_cert"  id="validity" disabled="disabled">

           </div>
              </div>

                                                          <br><br> <br><br>

                              <div class="form-group">
                 <label for="t_inputdecipline">Non-Cremylayer Certificate</label><br>
                 <div class="col-sm-7 col-lg-7">
                     <input class="form-control" type="file" accept="image/*" id="t_cremylayer"    name="t_oth_non_creamy" disabled="disabled">

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
                            <button type="submit" class="btn btn-primary btn-block" name="t_submit_bank" value="Submit">Submit</button>
                        </div>
                       </div>
                      </div>
    </form>
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
                    <p align=center>?2017 DBATU. All rights reserved. </p>
                </div>
            </div>
        </div>
    </footer>

    </div></div>

 <!--   <script src="js/jquery-3.1.1.js"></script>
    <script src="bootstrap/bootstrap-3.3.7-dist/js/bootstrap.min.js" type="text/javascript"></script>
  <!--  <script src="bootstrap/bootstrap-3.3.7-dist/js/bootstrapValidator.min.js" type="text/javascript"></script>     -->

<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

     $("#tgl").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
    <script type="text/javascript">
    function toggleTB(what,wh,elid)
    {
     if(what.checked)
    { document.getElementById(elid).disabled=0 }
     else
      { document.getElementById(elid).disabled=1 }

    if(what.checked)
    { document.getElementById(wh).disabled=0 }
     else
      { document.getElementById(wh).disabled=1 }
    }



        function toggleOther(ddd,whtt,ee,who,when,why)
    {
     if(ddd.checked)
    { document.getElementById(ee).disabled=0 }
     else
      { document.getElementById(ee).disabled=1 }

    if(ddd.checked)
    { document.getElementById(whtt).disabled=0 }
     else
      { document.getElementById(whtt).disabled=1 }

         if(ddd.checked)
    { document.getElementById(who).disabled=0 }
     else
      { document.getElementById(who).disabled=1 }

    if(ddd.checked)
    { document.getElementById(when).disabled=0 }
     else
      { document.getElementById(when).disabled=1 }

     if(ddd.checked)
    { document.getElementById(why).disabled=0 }
     else
      { document.getElementById(why).disabled=1 }

    }
    </script>

     <script type="text/javascript">
      $(document).ready(function () {
          var validator = $("#banking").bootstrapValidator({
      fields :{


    t_acc_no: {

                       message : "account number required",
           validators :{
                notEmpty : {
                   message : "Please provide account number",
                         }
                       }
              },

    t_branch_ifsc: {

                       message : "branch ifsc code is required",
           validators :{
                notEmpty : {
                   message : "Please provide branch ifsc code",
                         }
                       }
              },
    t_branch_name: {

                       message : "branch name  is required",
           validators :{
                notEmpty : {
                   message : "Please provide branch name",
                         }
                       }
              },
    t_adhar_no: {

                       message : "Aadhar number  is required",
           validators :{
                notEmpty : {
                   message : "Please provide Aadhar number",
                         }
                       }
              },
    t_pan_card: {

                       message : "pan card number is required",
           validators :{
                notEmpty : {
                   message : "Please provide pan card number",
                         }
                       }
              },
     t_voter_id: {

                       message : "voter id is required",
           validators :{
                notEmpty : {
                   message : "Please provide voter id ",
                         }
                       }
              },


        }

    });
    });
    </script>






</body>
</html>

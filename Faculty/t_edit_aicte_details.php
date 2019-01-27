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
<?php
ob_start();
session_start();
include 'isLoggedIn.php';

   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   $temp = $_SESSION['user_id'];
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }


      $sql = "SELECT * FROM t_aicte_details WHERE t_emp_id=$temp";



   mysqli_select_db($conn,'intranet');
   $retval = mysqli_query($conn,$sql );
   $row = mysqli_fetch_assoc($retval);

   if(isset($_POST['t_aicte_submit'])){
                // PERSONAL DETAILS VAR
                $t_aicte_enrolment_id=$_POST['t_aicte_enrolment_id'];

                $t_aicte_fathers_name=$_POST['t_aicte_fathers_name'];
                $t_aicte_mothers_name=$_POST['t_aicte_mothers_name'];
                $t_aicte_std_code=$_POST['t_aicte_std_code'];
                $t_aicte_landline=$_POST['t_aicte_landline'];
                $t_aicte_fax_phone=$_POST['t_aicte_fax_phone'];
                $t_aicte_alt_email_id=$_POST['t_aicte_alt_email_id'];
                $t_aicte_passport_number=$_POST['t_aicte_passport_number'];
                $t_aicte_religion=$_POST['t_aicte_religion'];
                $t_aicte_nationality=$_POST['t_aicte_nationality'];
                $t_aicte_postal_code=$_POST['t_aicte_postal_code'];
                $t_aicte_addr_line_1=$_POST['t_aicte_addr_line_1'];
                $t_aicte_addr_line_2=$_POST['t_aicte_addr_line_2'];
                $t_aicte_city_village=$_POST['t_aicte_city_village'];
                $t_aicte_district=$_POST['t_aicte_district'];
                $t_aicte_state=$_POST['t_aicte_state'];
                //BANK DETAILS VAR
                $t_aicte_payscale=$_POST['t_aicte_payscale'];
                $t_aicte_sal_mode=$_POST['t_aicte_sal_mode'];
                $t_aicte_basic_pay=$_POST['t_aicte_basic_pay'];
                $t_aicte_gross_pay_per_month=$_POST['t_aicte_gross_pay_per_month'];
                $t_aicte_hra=$_POST['t_aicte_hra'];
                $t_aicte_other_allowances=$_POST['t_aicte_other_allowances'];
                $t_aicte_t_gross_sal_last_financial_y=$_POST['t_aicte_t_gross_sal_last_financial_y'];
                $t_aicte_t_tax_paid_last_financial_y=$_POST['t_aicte_t_tax_paid_last_financial_y'];
                //PROFESSIONAL DETAILS Var
                $t_aicte_appt_type=$_POST['t_aicte_appt_type'];
                $t_aicte_apt_appr_by_gov=$_POST['t_aicte_apt_appr_by_gov'];
                $t_aicte_apt_appr_by_univ=$_POST['t_aicte_apt_appr_by_univ'];
                $t_aicte_ug_degree=$_POST['t_aicte_ug_degree'];
                $t_aicte_pg_degree=$_POST['t_aicte_pg_degree'];
                $t_aicte_other_quali=$_POST['t_aicte_other_quali'];
                $t_aicte_doj=$_POST['t_aicte_doj'];
                $t_aicte_area_of_speciali=$_POST['t_aicte_area_of_speciali'];
                $t_aicte_programme=$_POST['t_aicte_programme'];
                $t_aicte_course=$_POST['t_aicte_course'];
                $t_aicte_fy_common_sub_teacher=$_POST['t_aicte_fy_common_sub_teacher'];
                $t_aicte_fy_common_sub=$_POST['t_aicte_fy_common_sub'];
                $t_aicte_ext_designation=$_POST['t_aicte_ext_designation'];
                $t_aicte_fac_unique_id=$_POST['t_aicte_fac_unique_id'];
                $t_aicte_fac_teach_for=$_POST['t_aicte_fac_teach_for'];
                $t_aicte_teach_exp_in_y=$_POST['t_aicte_teach_exp_in_y'];
                $t_aicte_word_exp_in_y=$_POST['t_aicte_word_exp_in_y'];
                $t_aicte_research_exp_in_y=$_POST['t_aicte_research_exp_in_y'];
                $t_aicte_total_exp_in_y=$_POST['t_aicte_total_exp_in_y'];
                $t_aicte_other_exp_in_y=$_POST['t_aicte_other_exp_in_y'];
                $t_aicte_books_published=$_POST['t_aicte_books_published'];
                $t_aicte_publi_in_inter_conference=$_POST['t_aicte_publi_in_inter_conference'];
                $t_aicte_publi_in_national_conference=$_POST['t_aicte_publi_in_national_conference'];
                $t_aicte_publi_in_inter_journal=$_POST['t_aicte_publi_in_inter_journal'];
                $t_aicte_publi_in_national_journal=$_POST['t_aicte_publi_in_national_journal'];
                $t_aicte_doct_degree=$_POST['t_aicte_doct_degree'];
                $t_aicte_dect_stu_guided=$_POST['t_aicte_dect_stu_guided'];
                $t_aicte_pg_proj_guided=$_POST['t_aicte_pg_proj_guided'];
                $t_aicte_patents=$_POST['t_aicte_patents'];
                $t_aicte_appli_to_aicte=$_POST['t_aicte_appli_to_aicte'];
                $t_aicte_work_as_expert_mem_in_aicte_comm=$_POST['t_aicte_work_as_expert_mem_in_aicte_comm'];

//PERSONAL details SUBMISSION
                $query_personal=mysqli_query($conn,"UPDATE t_aicte_details SET  t_aicte_enrolment_id='$t_aicte_enrolment_id',
                                                                        t_aicte_fathers_name='$t_aicte_fathers_name',
                                                                        t_aicte_mothers_name='$t_aicte_mothers_name',

                                                                        t_aicte_std_code='$t_aicte_std_code',
                                                                        t_aicte_landline='$t_aicte_landline',
                                                                        t_aicte_fax_phone='$t_aicte_fax_phone',

                                                                        t_aicte_alt_email_id='$t_aicte_alt_email_id',

                                                                        t_aicte_passport_number='$t_aicte_passport_number',

                                                                        t_aicte_religion='$t_aicte_religion',
                                                                        t_aicte_nationality='$t_aicte_nationality',
                                                                        t_aicte_postal_code='$t_aicte_postal_code',
                                                                        t_aicte_addr_line_1='$t_aicte_addr_line_1',
                                                                        t_aicte_addr_line_2='$t_aicte_addr_line_2',
                                                                        t_aicte_city_village='$t_aicte_city_village',
                                                                        t_aicte_state='$t_aicte_state',
                                                                        t_aicte_district='$t_aicte_district' WHERE t_emp_id='$temp'");




//BANK ACCOUNT details submission
$query_bank=mysqli_query($conn,"UPDATE t_aicte_details SET t_aicte_payscale='$t_aicte_payscale',
                                                           t_aicte_sal_mode='$t_aicte_sal_mode',
                                                           t_aicte_basic_pay='$t_aicte_basic_pay',
                                                           t_aicte_gross_pay_per_month='$t_aicte_gross_pay_per_month',
                                                           t_aicte_hra='$t_aicte_hra',
                                                           t_aicte_other_allowances='$t_aicte_other_allowances',
                                                           t_aicte_t_gross_sal_last_financial_y='$t_aicte_t_gross_sal_last_financial_y',
                                                           t_aicte_t_tax_paid_last_financial_y='$t_aicte_t_tax_paid_last_financial_y' WHERE t_emp_id='$temp'");

$query_professional=mysqli_query($conn,"UPDATE t_aicte_details SET  t_aicte_appt_type='$t_aicte_appt_type',
                                                            t_aicte_apt_appr_by_gov='$t_aicte_apt_appr_by_gov',
                                                            t_aicte_apt_appr_by_univ='$t_aicte_apt_appr_by_univ',
                                                            t_aicte_ug_degree='$t_aicte_ug_degree',
                                                            t_aicte_pg_degree='$t_aicte_pg_degree',
                                                            t_aicte_other_quali='$t_aicte_other_quali',
                                                            t_aicte_doj='$t_aicte_doj',
                                                            t_aicte_area_of_speciali='$t_aicte_area_of_speciali',
                                                            t_aicte_programme='$t_aicte_programme',
                                                            t_aicte_course='$t_aicte_course',
                                                            t_aicte_fy_common_sub_teacher='$t_aicte_fy_common_sub_teacher',
                                                            t_aicte_fy_common_sub='$t_aicte_fy_common_sub',
                                                            t_aicte_ext_designation='$t_aicte_ext_designation',
                                                            t_aicte_fac_unique_id='$t_aicte_fac_unique_id',
                                                            t_aicte_fac_teach_for='$t_aicte_fac_teach_for',
                                                            t_aicte_teach_exp_in_y='$t_aicte_teach_exp_in_y',
                                                            t_aicte_word_exp_in_y='$t_aicte_word_exp_in_y',
                                                            t_aicte_research_exp_in_y='$t_aicte_research_exp_in_y',
                                                            t_aicte_total_exp_in_y='$t_aicte_total_exp_in_y',
                                                            t_aicte_other_exp_in_y='$t_aicte_other_exp_in_y',
                                                            t_aicte_books_published='$t_aicte_books_published',
                                                            t_aicte_publi_in_inter_conference='$t_aicte_publi_in_inter_conference',
                                                            t_aicte_publi_in_national_conference='$t_aicte_publi_in_national_conference',
                                                            t_aicte_publi_in_inter_journal='$t_aicte_publi_in_inter_journal',
                                                            t_aicte_publi_in_national_journal='$t_aicte_publi_in_national_journal',
                                                            t_aicte_doct_degree='$t_aicte_doct_degree',
                                                            t_aicte_dect_stu_guided='$t_aicte_dect_stu_guided',
                                                            t_aicte_pg_proj_guided='$t_aicte_pg_proj_guided',
                                                            t_aicte_patents='$t_aicte_patents',
                                                            t_aicte_appli_to_aicte='$t_aicte_appli_to_aicte',
                                                            t_aicte_work_as_expert_mem_in_aicte_comm='$t_aicte_work_as_expert_mem_in_aicte_comm' WHERE t_emp_id='$temp'");


if($query_personal || $query_personal || $query_professional)
{
header('location:post_edit_msg.php');
}
}

   mysqli_close($conn);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>AICTE</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

 <link href="../LOGIN/css/bootstrap.min.css" rel="stylesheet">
<link href="../LOGIN/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="../LOGIN/css/bootstrapValidator.min.css" rel="stylesheet">
<link href="../LOGIN/style.css" rel="stylesheet">
<link href="../LOGIN/css/style.css" rel="stylesheet">
<link href="../LOGIN/css/bootstrap.css" rel="stylesheet" />
<link href="../LOGIN/css/font-awesome.css" rel="stylesheet" />



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
<div class="text-center" style="padding-top: 10px; padding-bottom: 10px; background-color: #eee;">
   <h1 style="font-size:40px;">AICTE</h1>
</div>
<?php include 'topBar.php'; ?>


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
            </div>
          </div>
<p style="margin:50px"></p>
<body>


<div class="container">
<form class="form" id="aicte_details" method="POST" action="" enctype="multipart/form-data">
  <div class="panel-group">
	   <div class="panel panel-info">
       <div class="panel-heading"><h1 class="panel-title" style="color:black">Personal Details</h1></div>
       <div class="panel-body">
	  <!-- LIST START HERE-->
<ol type="1">
<div class="row">
  <div class="form-group col-lg-4">
   <li>
   <label for="t_aicte_enrolment_id" class="control-label">Enrolment Id :<font style="color:#FF0000">*</font></label><br />
   <input class="form-control" placeholder="Enrolment Id (EId)" value="<?php echo $row['t_aicte_enrolment_id']; ?>" type="text" name="t_aicte_enrolment_id" id="t_aicte_enrolment_id" >
   </li>
  </div>
</div><hr>
<!--<div class="row">
  <div class="form-group col-lg-1">
   <li>
     <label for="t_aicte_title" class="control-label">Title :<font style="color:#FF0000">*</font></label><br />
     <input class="form-control" placeholder="Dr./Mr./Mrs/Miss" value="<?php //echo $row['t_full_name']; ?>" type="text" name="t_aicte_title" id="t_aicte_title" >
  </li>
  </div>
    <div class="form-group col-lg-2">
      <label for="t_aicte_first_name" class="control-label">First Name :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="First Name" value="<?php //echo $row['t_full_name']; ?>" type="text" name="t_aicte_first_name" id="t_aicte_first_name" >
    </div>
    <div class="form-group col-lg-2">
      <label for="t_aicte_middle_name" class="control-label">Middle Name :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Middle Name" value="<?php //echo $row['t_full_name']; ?>" type="text" name="t_aicte_middle_name" id="t_aicte_middle_name" >
    </div>
    <div class="form-group col-lg-2">
      <label for="t_aicte_last_name" class="control-label">Last Name :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Last Name" value="<?php //echo $row['t_full_name']; ?>" type="text" name="t_aicte_last_name" id="t_aicte_last_name" >
    </div>
</div><hr>-->
<div class="row">
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_fathers_name" class="control-label">Father's Name :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Father's Name" value="<?php echo $row['t_aicte_fathers_name']; ?>" type="text" name="t_aicte_fathers_name" id="t_aicte_fathers_name" >
    </li>
  </div>
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_mothers_name" class="control-label">Mother's Name :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Mother's Name" value="<?php echo $row['t_aicte_mothers_name']; ?>" type="text" name="t_aicte_mothers_name" id="t_aicte_mothers_name" >
    </li>
  </div>


</div><hr>
<div class="row">
  <div class="form-group col-lg-1">
    <li>
      <label for="t_aicte_std_code" class="control-label">STD code :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="STD code" value="<?php echo $row['t_aicte_std_code']; ?>" type="text" name="t_aicte_std_code" id="t_aicte_std_code" >
    </li>
  </div>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_landline" class="control-label">Landline :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Landline No." value="<?php echo $row['t_aicte_landline']; ?>" type="text" name="t_aicte_landline" id="t_aicte_landline" >
    </li>
  </div>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_fax_phone" class="control-label">Fax Phone :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Fax Phone" value="<?php echo $row['t_aicte_fax_phone']; ?>" type="text" name="t_aicte_fax_phone" id="t_aicte_fax_phone" >
    </li>
  </div>

</div><hr>
<div class="row">

  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_alt_email_id" class="control-label">Alternate Email-Id :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Email Address" value="<?php echo $row['t_aicte_alt_email_id']; ?>" type="text" name="t_aicte_alt_email_id" id="t_aicte_alt_email_id" >
    </li>
  </div>
<!--  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_aadhar_card" class="control-label">Aadhar Card :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Aadhar Card (UID)" value="<?php //echo $row['t_aicte_aadhar_card']; ?>" type="text" name="t_aicte_aadhar_card" id="t_aicte_aadhar_card" >
    </li>
  </div>-->
</div>
<div class="row">
<!--  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_pan_card" class="control-label">PAN Card :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="PAN Card" value="<?php //echo $row['t_aicte_pan_card']; ?>" type="text" name="t_aicte_pan_card" id="t_aicte_pan_card" >
    </li>
  </div> -->
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_passport_number" class="control-label">Passport Number :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Passport Number" value="<?php echo $row['t_aicte_passport_number']; ?>" type="text" name="t_aicte_passport_number" id="t_aicte_passport_number" >
    </li>
  </div>
</div><hr>
<div class="row">

  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_religion" class="control-label">Religion :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Religion" value="<?php echo $row['t_aicte_religion']; ?>" type="text" name="t_aicte_religion" id="t_aicte_religion" >
    </li>
  </div>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_nationality" class="control-label">Nationality :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Nationality" value="<?php echo $row['t_aicte_nationality']; ?>" type="text" name="t_aicte_nationality" id="t_aicte_nationality" >
    </li>
  </div>

</div><hr>
<div class="row">
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_addr_line_1" class="control-label">Address Line 1 :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Address Line 1" value="<?php echo $row['t_aicte_addr_line_1']; ?>" type="text" name="t_aicte_addr_line_1" id="t_aicte_addr_line_1" >
    </li>
  </div>
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_addr_line_2" class="control-label">Address Line 2 :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Address Line 2" value="<?php echo $row['t_aicte_addr_line_2']; ?>" type="text" name="t_aicte_addr_line_2" id="t_aicte_addr_line_2" >
    </li>
  </div>

  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_city_village" class="control-label">City/Village :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="City/Village" value="<?php echo $row['t_aicte_city_village']; ?>" type="text" name="t_aicte_city_village" id="t_aicte_city_village" >
    </li>
  </div>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_district" class="control-label">District :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="District" value="<?php echo $row['t_aicte_district']; ?>" type="text" name="t_aicte_district" id="t_aicte_district" >
    </li>
  </div>
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_state" class="control-label">State :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="State" value="<?php echo $row['t_aicte_state']; ?>" type="text" name="t_aicte_state" id="t_aicte_state" >
    </li>
  </div>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_postal_code" class="control-label">Postal Code :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Postal Code" value="<?php echo $row['t_aicte_postal_code']; ?>" type="text" name="t_aicte_postal_code" id="t_aicte_postal_code" >
    </li>
  </div>
</div><hr>
</ol>


       </div>
       </div>
  </div>
<!--ACCOUNT PANEL-->
<div class="panel-group">
   <div class="panel panel-info">
     <div class="panel-heading"><h1 class="panel-title" style="color:black">Account Details</h1></div>
     <div class="panel-body">
  <!-- LIST START HERE-->
<ol type="1">
<!--<div class="row">
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_bank_name" class="control-label">Bank Name :<font style="color:#FF0000">*</font></label><br />
        <select class="form-control" name="t_aicte_bank_name" id="t_aicte_bank_name">
          <option value="<?php //echo $row['t_aicte_bank_name'] ?>" selected disabled><?php //echo $row['t_aicte_bank_name'] ?></option>
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
    </li>
  </div>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_branch_name" class="control-label">Bank Branch Name :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Bank Branch Name" value="<?php //echo $row['t_aicte_branch_name']; ?>" type="text" name="t_aicte_branch_name" id="t_aicte_branch_name" >
    </li>
  </div>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_ifsc_code" class="control-label">IFSC Code :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="IFSC Code" value="<?php //echo $row['t_aicte_ifsc_code']; ?>" type="text" name="t_aicte_ifsc_code" id="t_aicte_ifsc_code" >
    </li>
  </div>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_bank_account_no" class="control-label">Bank Account Number :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Bank Account Number" value="<?php //echo $row['t_aicte_bank_account_no']; ?>" type="text" name="t_aicte_bank_account_no" id="t_aicte_bank_account_no" >
    </li>
  </div>
</div><hr> -->
<div class="row">
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_payscale" class="control-label">PayScale :<font style="color:#FF0000">*</font></label><br />
      <select class="form-control" name="t_aicte_payscale" id="t_aicte_payscale">
        <option value="<?php echo $row['t_aicte_payscale'] ?>" selected disabled><?php echo $row['t_aicte_payscale'] ?></option>
        <option value="5th Pay Scale">5th Pay Scale</option>
        <option value="6th Pay Scale">6th Pay Scale</option>
        <option value="7th Pay Scale">7th Pay Scale</option>
      </select>
    </li>
  </div>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_sal_mode" class="control-label">Salary Mode :<font style="color:#FF0000">*</font></label><br />
      <select class="form-control" name="t_aicte_sal_mode" id="t_aicte_sal_mode">
        <option value="<?php echo $row['t_aicte_sal_mode'] ?>" selected disabled><?php echo $row['t_aicte_sal_mode'] ?></option>
        <option value="Credit to Bank Account">Credit to Bank Account</option>
      </select>
    </li>
  </div>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_basic_pay" class="control-label">Basic Pay :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Basic Pay in Rs." value="<?php echo $row['t_aicte_basic_pay']; ?>" type="text" name="t_aicte_basic_pay" id="t_aicte_basic_pay" >
    </li>
  </div>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_gross_pay_per_month" class="control-label">Gross Pay per month :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Gross Pay per month in Rs." value="<?php echo $row['t_aicte_gross_pay_per_month']; ?>" type="text" name="t_aicte_gross_pay_per_month" id="t_aicte_gross_pay_per_month" >
    </li>
  </div>
  <?php


   ?>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_hra" class="control-label">HRA :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="HRA in Rs." value="<?php echo $row['t_aicte_hra']; ?>" type="text" name="t_aicte_hra" id="t_aicte_hra" >
    </li>
  </div>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_da" class="control-label">DA :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="DA in Rs." value="<?php echo $row['t_aicte_hra']; ?>" type="text" name="t_aicte_da" id="t_aicte_da" >
    </li>
  </div>
</div><hr>
<div class="row">
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_other_allowances" class="control-label">Other Allowances :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Other Allowances in Rs." value="<?php echo $row['t_aicte_other_allowances']; ?>" type="text" name="t_aicte_other_allowances" id="t_aicte_other_allowances" >
    </li>
  </div>
  <div class="form-group col-lg-4">
    <li>
      <label for="t_aicte_t_gross_sal_last_financial_y" class="control-label">Total Gross Salary for the last Financial Year :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Total Gross Salary for the last Financial Year in Rs." value="<?php echo $row['t_aicte_t_gross_sal_last_financial_y']; ?>" type="text" name="t_aicte_t_gross_sal_last_financial_y" id="t_aicte_t_gross_sal_last_financial_y" >
    </li>
  </div>
  <div class="form-group col-lg-4">
    <li>
      <label for="t_aicte_t_tax_paid_last_financial_y" class="control-label">Total Tax paid in the last Financial Year :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Total Tax paid in the last Financial Year in Rs." value="<?php echo $row['t_aicte_t_tax_paid_last_financial_y']; ?>" type="text" name="t_aicte_t_tax_paid_last_financial_y" id="t_aicte_t_tax_paid_last_financial_y" >
    </li>
  </div>
</div>
</ol>

     </div>
     </div>
</div>










  <!--EDUCATIONAL & PROFESSIONAL PANEL-->
<div class="panel panel-info">
<div class="panel-heading"><h1 class="panel-title" style="color:black">Educational and Professional Details</h1></div>
<div class="panel-body">
<ol type="1">
  <div class="row">
    <div class="form-group col-lg-3">
      <li>
        <label for="t_aicte_appoint_type" class="control-label">Appointment Type :<font style="color:#FF0000">*</font></label><br />
        <div class="col-xs-12 col-lg-7">
       <?php
            if ( $row['t_aicte_appt_type']=="Regular" )
            {
                echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"Regular\" name=\"t_aicte_appt_type\" checked>Regular</label>
                <label class=\"radio-inline\"><input type=\"radio\" value=\"Approved\" name=\"t_aicte_appt_type\">Approved</label>";
            } else {
              echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"Regular\" name=\"t_aicte_appt_type\">Regular</label>
        <label class=\"radio-inline\"><input type=\"radio\" value=\"Approved\" name=\"t_aicte_appt_type\" checked>Approved</label>";
            }

          ?>
       </div>
      </li>
    </div>
    <div class="form-group col-lg-3">
      <li>
        <label for="t_aicte_apt_appr_by_gov" class="control-label">Appointment approved by Government :<font style="color:#FF0000">*</font></label><br />
        <div class="col-xs-12 col-lg-7">
       <?php
            if ( $row['t_aicte_apt_appr_by_gov']=="yes" )
            {
                echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"yes\" name=\"t_aicte_apt_appr_by_gov\" checked>Yes</label>
                <label class=\"radio-inline\"><input type=\"radio\" value=\"no\" name=\"t_aicte_apt_appr_by_gov\">No</label>";
            } else {
              echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"yes\" name=\"t_aicte_apt_appr_by_gov\">Yes</label>
        <label class=\"radio-inline\"><input type=\"radio\" value=\"no\" name=\"t_aicte_apt_appr_by_gov\" checked>No</label>";
            }

          ?>
       </div>
      </li>
    </div>
    <div class="form-group col-lg-3">
      <li>
        <label for="t_aicte_apt_appr_by_univ" class="control-label">Appointment approved by University :<font style="color:#FF0000">*</font></label><br />
        <div class="col-xs-12 col-lg-7">
       <?php
            if ( $row['t_aicte_apt_appr_by_univ']=="yes" )
            {
                echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"yes\" name=\"t_aicte_apt_appr_by_univ\" checked>Yes</label>
                <label class=\"radio-inline\"><input type=\"radio\" value=\"no\" name=\"t_aicte_apt_appr_by_univ\">No</label>";
            } else {
              echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"yes\" name=\"t_aicte_apt_appr_by_univ\">Yes</label>
        <label class=\"radio-inline\"><input type=\"radio\" value=\"no\" name=\"t_aicte_apt_appr_by_univ\" checked>No</label>";
            }

          ?>
       </div>
      </li>
    </div>

  </div><hr>
<div class="row">
<!--  <div class="form-group col-lg-4">
    <li>
      <label for="t_aicte_completed_ug" class="control-label">Completed UG :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
     <?php
      /*    if ( $row['t_aicte_completed_ug']=="male" )
          {
              echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"male\" name=\"t_aicte_completed_ug\" checked>Yes</label>
              <label class=\"radio-inline\"><input type=\"radio\" value=\"female\" name=\"t_aicte_completed_ug\">No</label>";
          } else {
            echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"male\" name=\"t_aicte_completed_ug\">Yes</label>
      <label class=\"radio-inline\"><input type=\"radio\" value=\"female\" name=\"t_aicte_completed_ug\" checked>No</label>";
          }
          */
        ?>
     </div>
    </li>
  </div> -->
<!--  <div class="form-group col-lg-4">
    <li>
      <label for="t_aicte_completed_pg" class="control-label">Completed PG :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
     <?php
        /*  if ( $row['t_aicte_gender']=="male" )
          {
              echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"male\" name=\"t_aicte_completed_pg\" checked>Yes</label>
              <label class=\"radio-inline\"><input type=\"radio\" value=\"female\" name=\"t_aicte_completed_pg\">No</label>";
          } else {
            echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"male\" name=\"t_aicte_completed_pg\">Yes</label>
      <label class=\"radio-inline\"><input type=\"radio\" value=\"female\" name=\"t_aicte_completed_pg\" checked>No</label>";
          }
          */
        ?>
     </div>
    </li>
  </div>  -->
<!--  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_diploma" class="control-label">Diploma :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
     <?php
          /*if ( $row['t_aicte_diploma']=="male" )
          {
              echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"male\" name=\"t_aicte_diploma\" checked>Yes</label>
              <label class=\"radio-inline\"><input type=\"radio\" value=\"female\" name=\"t_aicte_diploma\">No</label>";
          } else {
            echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"male\" name=\"t_aicte_diploma\">Yes</label>
      <label class=\"radio-inline\"><input type=\"radio\" value=\"female\" name=\"t_aicte_diploma\" checked>No</label>";
          }
          */
        ?>
     </div>
    </li>
  </div>  -->
</div>
<div class="row">
  <div class="form-group col-lg-4">
    <li>
      <label for="t_aicte_ug_degree" class="control-label">UG DEGREE :</label><br />
      <input class="form-control" placeholder="COURSE NAME (if completed)" value="<?php echo $row['t_aicte_ug_degree']; ?>" type="text" name="t_aicte_ug_degree" id="t_aicte_ug_degree" >
    </li>
  </div>
  <div class="form-group col-lg-4">
    <li>
      <label for="t_aicte_pg_degree" class="control-label">PG DEGREE :</label><br />
      <input class="form-control" placeholder="COURSE NAME (if completed)" value="<?php echo $row['t_aicte_pg_degree']; ?>" type="text" name="t_aicte_pg_degree" id="t_aicte_pg_degree" >
    </li>
  </div>
  <div class="form-group col-lg-4">
    <li>
      <label for="t_aicte_other_quali" class="control-label">Other Qualification's :</label><br />
      <input class="form-control" placeholder="e.g MBA, PH.D APPEARING" value="<?php echo $row['t_aicte_other_quali']; ?>" type="text" name="t_aicte_other_quali" id="t_aicte_other_quali" >
    </li>
  </div>
</div><hr>
<div class="row">
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_doj" class="control-label">Date of Joining :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="dd/mm/yyyy" value="<?php echo $row['t_aicte_doj']; ?>" type="text" name="t_aicte_doj" id="t_aicte_doj" >
    </li>
  </div>
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_area_of_speciali" class="control-label">Areas of Specialization :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Areas of Specialization" value="<?php echo $row['t_aicte_area_of_speciali']; ?>" type="text" name="t_aicte_area_of_speciali" id="t_aicte_area_of_speciali" >
    </li>
  </div>
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_programme" class="control-label">Programme :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Programme" value="<?php echo $row['t_aicte_programme']; ?>" type="text" name="t_aicte_programme" id="t_aicte_programme" >
    </li>
  </div>
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_course" class="control-label">Course :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Course" value="<?php echo $row['t_aicte_course']; ?>" type="text" name="t_aicte_course" id="t_aicte_course" >
    </li>
  </div>

</div><hr>
<div class="row">
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_fy_common_sub_teacher" class="control-label">FY/Common Subject Teacher? :</label><br />
      <div class="col-xs-12 col-lg-7">
     <?php
          if ( $row['t_aicte_fy_common_sub_teacher']=="yes" )
          {
              echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"yes\" name=\"t_aicte_fy_common_sub_teacher\" checked>Yes</label>
              <label class=\"radio-inline\"><input type=\"radio\" value=\"no\" name=\"t_aicte_FY_common_sub_teacher\">No</label>";
          } else {
            echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"yes\" name=\"t_aicte_fy_common_sub_teacher\">Yes</label>
      <label class=\"radio-inline\"><input type=\"radio\" value=\"no\" name=\"t_aicte_fy_common_sub_teacher\" checked>No</label>";
          }

        ?>
     </div>
    </li>
  </div>



</div>
<div class="row">
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_fy_common_sub" class="control-label">FY/Common Subject :<font style="color:#FF0000"></font></label><br />
      <input class="form-control" placeholder="FY/Common Subject" value="<?php echo $row['t_aicte_fy_common_sub']; ?>" type="text" name="t_aicte_fy_common_sub" id="t_aicte_fy_common_sub" >
    </li>
  </div>
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_ext_designation" class="control-label">Exact Designation :<font style="color:#FF0000"></font></label><br />
      <input class="form-control" placeholder="Exact Designation" value="<?php echo $row['t_aicte_ext_designation']; ?>" type="text" name="t_aicte_ext_designation" id="t_aicte_ext_designation" >
    </li>
  </div>
</div><hr>
<div class="row">
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_fac_unique_id" class="control-label">Faculty Unique ID :<font style="color:#FF0000">*</font></label><br />
      <input class="form-control" placeholder="Faculty Unique ID" value="<?php echo $row['t_aicte_fac_unique_id']; ?>" type="text" name="t_aicte_fac_unique_id" id="t_aicte_fac_unique_id" >
    </li>
  </div>
  <div class="form-group col-lg-4">
    <li>
      <label for="t_aicte_fac_teach_for" class="control-label">Faculty Teaching For (Please Select Appropriate Level) :<font style="color:#FF0000">*</font></label><br />
      <select class="form-control" name="t_aicte_fac_teach_for" id="sel">
          <option value="<?php echo $row['t_aicte_fac_teach_for']; ?>" selected ><?php echo $row['t_aicte_fac_teach_for']; ?></option>
          <option value="UG">UG</option>
          <option value="PG">PG</option>
        </select>
    </li>
  </div>


</div>
<div class="row">
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_teach_exp_in_y" class="control-label">Teaching Experience in Years :<font style="color:#FF0000"></font></label><br />
      <input class="form-control" placeholder="Teaching Experience in Years" value="<?php echo $row['t_aicte_teach_exp_in_y']; ?>" type="text" name="t_aicte_teach_exp_in_y" id="t_aicte_teach_exp_in_y" >
    </li>
  </div>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_word_exp_in_y" class="control-label">Work Experience in Years :<font style="color:#FF0000"></font></label><br />
      <input class="form-control" placeholder="Work Experience in Years" value="<?php echo $row['t_aicte_word_exp_in_y']; ?>" type="text" name="t_aicte_word_exp_in_y" id="t_aicte_word_exp_in_y" >
    </li>
  </div>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_research_exp_in_y" class="control-label">Research Experience in Years :<font style="color:#FF0000"></font></label><br />
      <input class="form-control" placeholder="Research Experience in Years" value="<?php echo $row['t_aicte_research_exp_in_y']; ?>" type="text" name="t_aicte_research_exp_in_y" id="t_aicte_addr_line_2" >
    </li>
  </div>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_total_exp_in_y" class="control-label">Total Experience in Years :<font style="color:#FF0000"></font></label><br />
      <input class="form-control" placeholder="Total Experience in Years" value="<?php echo $row['t_aicte_total_exp_in_y']; ?>" type="text" name="t_aicte_total_exp_in_y" id="t_aicte_total_exp_in_y" >
    </li>
  </div>
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_other_exp_in_y" class="control-label">Any Other Experience in Years :<font style="color:#FF0000"></font></label><br />
      <input class="form-control" placeholder="Any Other Experience in Years" value="<?php echo $row['t_aicte_other_exp_in_y']; ?>" type="text" name="t_aicte_other_exp_in_y" id="t_aicte_other_exp_in_y" >
    </li>
  </div>

</div><hr>
<div class="row">
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_books_published" class="control-label">No of books Published :<font style="color:#FF0000"></font></label><br />
      <input class="form-control" placeholder="COUNT" value="<?php echo $row['t_aicte_books_published']; ?>" type="text" name="t_aicte_books_published" id="t_aicte_books_published" >
    </li>
  </div>
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_publi_in_inter_conference" class="control-label">Number of Publications in International Conference :<font style="color:#FF0000"></font></label><br />
      <input class="form-control" placeholder="COUNT" value="<?php echo $row['t_aicte_publi_in_inter_conference']; ?>" type="text" name="t_aicte_publi_in_inter_conference" id="t_aicte_publi_in_inter_conference" >
    </li>
  </div>
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_publi_in_national_conference" class="control-label">Number of Publications in National Conference :<font style="color:#FF0000"></font></label><br />
      <input class="form-control" placeholder="COUNT" value="<?php echo $row['t_aicte_publi_in_national_conference']; ?>" type="text" name="t_aicte_publi_in_national_conference" id="t_aicte_publi_in_national_conference" >
    </li>
  </div>
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_publi_in_inter_journal" class="control-label">Number of Publications in International Journal :<font style="color:#FF0000"></font></label><br />
      <input class="form-control" placeholder="COUNT" value="<?php echo $row['t_aicte_publi_in_inter_journal']; ?>" type="text" name="t_aicte_publi_in_inter_journal" id="t_aicte_publi_in_inter_journal" >
    </li>
  </div>
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_publi_in_national_journal" class="control-label">Number of Publications in National Journal :<font style="color:#FF0000"></font></label><br />
      <input class="form-control" placeholder="COUNT" value="<?php echo $row['t_aicte_publi_in_national_journal']; ?>" type="text" name="t_aicte_publi_in_national_journal" id="t_aicte_publi_in_national_journal" >
    </li>
  </div>

</div><hr>
<div class="row">
  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_doct_degree" class="control-label">Doctrate Degree :<font style="color:#FF0000"></font></label><br />
      <div class="col-xs-12 col-lg-7">
     <?php
          if ( $row['t_aicte_doct_degree']=="yes" )
          {
              echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"yes\" name=\"t_aicte_doct_degree\" checked>Yes</label>
              <label class=\"radio-inline\"><input type=\"radio\" value=\"no\" name=\"t_aicte_doct_degree\">No</label>";
          } else {
            echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"yes\" name=\"t_aicte_doct_degree\">Yes</label>
      <label class=\"radio-inline\"><input type=\"radio\" value=\"no\" name=\"t_aicte_doct_degree\" checked>No</label>";
          }

        ?>
     </div>
    </li>
  </div>
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_dect_stu_guided" class="control-label">No. of Doctorate Students Guided :<font style="color:#FF0000"></font></label><br />
      <input class="form-control" placeholder="COUNT" value="<?php echo $row['t_aicte_dect_stu_guided']; ?>" type="text" name="t_aicte_dect_stu_guided" id="t_aicte_dect_stu_guided" >
    </li>
  </div>
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_pg_proj_guided" class="control-label">No. of PG Projects Guided :<font style="color:#FF0000"></font></label><br />
      <input class="form-control" placeholder="COUNT" value="<?php echo $row['t_aicte_pg_proj_guided']; ?>" type="text" name="t_aicte_pg_proj_guided" id="t_aicte_pg_proj_guided" >
    </li>
  </div>
<!--  <div class="form-group col-lg-2">
    <li>
      <label for="t_aicte_search_flag" class="control-label">Search Flag :<font style="color:#FF0000"></font></label><br />
      <div class="col-xs-12 col-lg-7">
     <?php
      /*    if ( $row['t_aicte_search_flag']=="male" )
          {
              echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"male\" name=\"t_aicte_search_flag\" checked>Yes</label>
              <label class=\"radio-inline\"><input type=\"radio\" value=\"female\" name=\"t_aicte_search_flag\">No</label>";
          } else {
            echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"male\" name=\"t_aicte_search_flag\">Yes</label>
      <label class=\"radio-inline\"><input type=\"radio\" value=\"female\" name=\"t_aicte_search_flag\" checked>No</label>";
    }*/

        ?>
     </div>
    </li>
  </div>-->
</div>
<div class="row">
  <div class="form-group col-lg-3">
    <li>
      <label for="t_aicte_patents" class="control-label">Patents :<font style="color:#FF0000"></font></label><br />
      <input class="form-control" placeholder="COUNT" value="<?php echo $row['t_aicte_patents']; ?>" type="text" name="t_aicte_patents" id="t_aicte_patents" >
    </li>
  </div>
</div><hr>
<div class="row">
  <div class="form-group col-lg-5">
    <li>
      <label for="t_aicte_appli_to_aicte" class="control-label">Have you ever applied to AICTE for any grants/assistance :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
     <?php
          if ( $row['t_aicte_appli_to_aicte']=="male" )
          {
              echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"yes\" name=\"t_aicte_appli_to_aicte\" checked>Yes</label>
              <label class=\"radio-inline\"><input type=\"radio\" value=\"no\" name=\"t_aicte_appli_to_aicte\">No</label>";
          } else {
            echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"yes\" name=\"t_aicte_appli_to_aicte\">Yes</label>
      <label class=\"radio-inline\"><input type=\"radio\" value=\"no\" name=\"t_aicte_appli_to_aicte\" checked>No</label>";
          }

        ?>
     </div>
    </li>
  </div>
  <div class="form-group col-lg-5">
    <li>
      <label for="t_aicte_work_as_expert_mem_in_aicte_comm" class="control-label">Would you like to work as Expert Member on various committees of AICTE :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
     <?php
          if ( $row['t_aicte_work_as_expert_mem_in_aicte_comm']=="yes" )
          {
              echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"yes\" name=\"t_aicte_work_as_expert_mem_in_aicte_comm\" checked>Yes</label>
              <label class=\"radio-inline\"><input type=\"radio\" value=\"no\" name=\"t_aicte_get_aicte_work_as_expert_mem_in_aicte_commnder\">No</label>";
          } else {
            echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"yes\" name=\"t_aicte_work_as_expert_mem_in_aicte_comm\">Yes</label>
      <label class=\"radio-inline\"><input type=\"radio\" value=\"no\" name=\"t_aicte_work_as_expert_mem_in_aicte_comm\" checked>No</label>";
          }

        ?>
     </div>
    </li>
  </div>
</div><hr>
</ol>




</div>


</div>
<div class="form-group">
<div class="col-xs-8 col-xs-offset-2 col-lg-3 col-lg-offset-4">
<p style="padding: 5px;"></p>
<button type="submit" class="btn btn-primary btn-block" name="t_aicte_submit" value="Submit">Submit</button>
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






</body>
</html>

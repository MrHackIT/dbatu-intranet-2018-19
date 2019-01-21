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
session_start();
include 'isLoggedInStaff';
    error_reporting(1);


   $dbhost = 'localhost';
   $dbuser = 'root';
   $dbpass = '';

   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn ) {
      die('Could not connect: ' . mysqli_connect_error());
   }
    $_SESSION['t_emp_id']=$_POST['t_emp_id'];
      $temp = $_SESSION['user_id'];
      $sql = "SELECT * FROM ntspersonal_details WHERE t_emp_id=$temp";

   $_SESSION['t_emp_id'];

    $post_photo = $temp.".jpg";
    $post_photo_tmp = $_FILES['t_profile_photo']['tmp_name'];

    list($width_min,$height_min) = getimagesize($post_photo_tmp);

    $newwidth_min = 350;
    $newheight_min = ($height_min / $width_min)*$newwidth_min;

    $tmp_min = imagecreatetruecolor($newwidth_min,$newheight_min);

    imagecopyresampled($tmp_min,$src,0,0,0,0,$newwidth_min,$newheight_min, $width_min,$height_min);

    imagejpeg($tmp_min,"t_personal_detail/".$post_photo,80);

   mysqli_select_db($conn,'intranet');
   $retval = mysqli_query($conn,$sql);
   $row = mysqli_fetch_assoc($retval);
$_SESSION['t_emp_id']=$_POST['t_emp_id'];

//Processing Submitted Data
if(isset($_POST['t_per_info']))
{

$t_full_name=$_POST['t_full_name'];
$t_discipline=$_POST['t_discipline'];
$t_designation=$_POST['t_designation'];
$t_gender=$_POST['t_gender'];
$t_dob=$_POST['t_dob'];
$t_email=$_POST['t_email'];
$t_contact=$_POST['t_contactno'];
$t_blood_group=$_POST['t_blood_group'];
$t_category=$_POST['t_category'];
$t_address=$_POST['t_address'];
$t_profile_photo=$_POST['t_profile_photo'];

/*<<<<<<< HEAD:Faculty/t_edit_personal_detail.php
$query3="UPDATE ntspersonal_details SET  t_full_name='$t_full_name',t_discipline='$t_discipline',t_designation='$t_designation',t_gender='$t_gender', t_dob='$t_dob',t_email='$t_email', t_contact='$t_contact', t_blood_group='$t_blood_group', t_category='$t_category', t_address='$t_address',t_profile_photo='$t_profile_photo', t_pofile_photo_name='$post_photo'  WHERE t_emp_id='$temp'";
       $run = mysqli_query($conn,$query3);
if($run)
=======*/
$query3=mysqli_query($conn,"update ntspersonal_details set t_full_name='$t_full_name',t_discipline='$t_discipline',t_designation='$t_designation',t_gender='$t_gender', t_dob='$t_dob',t_email='$t_email', t_contact='$t_contact', t_blood_group='$t_blood_group', t_category='$t_category', t_address='$t_address',t_profile_photo='$t_profile_photo', t_pofile_photo_name='$post_photo'  where t_emp_id='$temp'");
if($query3)
//>>>>>>> 0d29f38a8544c96742f40e0c23043adb245117da:Faculty/t_edintspersonal_details.php
{
header('location:ntspost_edit_msg.php');
}
}

//<<<<<<< HEAD:Faculty/t_edit_personal_detail.php
//=======
//Getting from Database to echo in the form
$temp = $_SESSION['user_id'];
$sql = "SELECT * FROM ntspersonal_details WHERE t_emp_id=$temp";   
echo $_SESSION['t_emp_id'];
$post_photo = $temp.".jpg";
$post_photo_tmp = $_FILES['t_profile_photo']['tmp_name'];
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
    
    imagejpeg($tmp_min,"t_personal_detail/".$post_photo,80);
    
  $retval = mysqli_query($conn,$sql);
   
   $row = mysqli_fetch_assoc($retval);

//Close connection
//>>>>>>> 0d29f38a8544c96742f40e0c23043adb245117da:Faculty/t_edintspersonal_details.php
   mysqli_close($conn);

?>
   <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<!--<<<<<<< HEAD:Faculty/t_edit_personal_detail.php
<title>personal Details</title>
<link href="https://fonts.googleapis.com/css?family=Droid+Serif|Lobster" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/bootstrapValidator.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
  <style>



=======-->
<title>Edit Personal Details</title>
<link href="../login/css/bootstrap.min.css" rel="stylesheet">
<link href="../login/css/bootstrap-theme.min.css" rel="stylesheet">
<link href="../login/css/bootstrapValidator.min.css" rel="stylesheet">
<link href="../login/style.css" rel="stylesheet">
<link href="../login/css/style.css" rel="stylesheet">
<link href="../login/css/bootstrap.css" rel="stylesheet" />
<link href="../login/css/font-awesome.css" rel="stylesheet" />
<link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
<style>   
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
<header class="jumbotron">

        <div class="container">
            <div class="row row-header">
                <div class="col-xs-12 col-sm-2 col-sm-offset-1">
                    <img src="../LOGIN/img/batu_logo2.png" class="img-responsive">                </div>
                <div class="col-xs-8 col-sm-9">
                    <h1 style="font-size:30px">Dr. BABASAHEB AMBEDKAR TECHNOLOGICAL UNIVERSITY</h1>
                    <p style="padding:15px;"></p></div>
                    <div class="col-xs-10 col-sm-6 col-sm-offset-2">
                    <h2>INTRANET SYSTEM</h2></div>

          </div>
        </div>
        </header>

    <!--<p style="padding:40px;"></p>

        <div class="row row-content">
            <div class="col-xs-12 col-sm-12">
            <ul class="prg_track">
            <li><a href="faculty-personal.php">Personal Details</a></li>
            <li><a href="#">Academic Details</a></li>
            <li><a href="#">Professional Details</a></li>
      <li><a href="#">Banking Details</a></li>
        
            </ul>
            </div>
</div>
        <p style="margin:50px"></p>

=======-->

        <div class="jumbotron text-center">
            <h1>Personal Details</h1> 
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
    
    <div class="container">
            <div class="col-lg-12">
       <form class="form" id="t_personal_info" action="" method="post" enctype="multipart/form-data">
    <div class="panel panel-info">
      <div class="panel-heading"><h1 class="panel-title" style="color:black">PERSONAL DETAILS</h1></div>
      <div class="panel-body" style="font-size:110%">

            <div class="row">
          <div class="col-sm-4 col-sm-push-8">
                    <div class="form-group">
                    <label class="col-sm-12 control-label"><p align=left>Profile Photo <a title="Profile Photo Must Not Be More Than 100KB..!" onClick="alert('Profile Photo Must Not Be More Than 100KB!') required"><img src="../FRONT/index.jpg" height="13px"/></a><font style="color:#FF0000"> *</font></p></label>
                    <div class="col-sm-8">
                    <img id="preview" class="img-responsive img-thumbnail " src="t_personal_detail/<?php echo $row['t_pofile_photo_name'] ?>" alt="Image Preview" width="160px" height="130px">
                    <p style="padding:1px;"></p>

                    <input type="file" id="t_files" class="form-control" accept="image/*" name="t_profile_photo" onChange="imagepreview(this);">
                    </div>
                    </div>
                    </div>

           <div class="col-lg-8 col-lg-pull-4">
           <div class="form-group">
    <label for="t_fullname" class="control-label">Full Name :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Full Name" value="<?php echo $row['t_full_name']; ?>" type="text" name="t_full_name" id="t_fullname" >
     </div>
    </div>


     <br/><br/>
    <div class="form-group">
    <label for="t_employee_id" class="control-label">Employee ID<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Employee ID" value="<?php echo $_SESSION["user_id"]; ?>" type="text" name="t_emp_id" id="t_employee_id" disabled>
     </div>
    </div>
              <br><br>
                <div class="form-group">
          <label for="t_sel1" class="control-label" >Discipline :<font style="color:#FF0000">*</font></label><br />

        <div class="col-xs-12 col-lg-7">
          <select class="form-control" name="t_discipline" id="sel" val="" required>
            <option value="<?php echo $row['t_discipline']; ?>" selected ><?php echo $row['t_discipline']; ?></option>
            <option value="COMPUTER">Computer</option>
            <option value="IT">IT</option>
            <option value="CIVIL">Civil</option>
            <option value="CHEMICAL">Chemical</option>
            <option value="EXTC">EXTC</option>
            <option value="MECHANICAL">Mechanical</option>
            <option value="ELECTRICAL">Electrical</option>
            <option value="PETROCHEMICAL">Petro Chemical</option>
          </select>
                    </div>
              </div>

     <br/><br/>
     <div class="form-group">
    <label for="t_designation" class="control-label">Designation<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Designation" type="text" name="t_designation" id="t_designation" value="<?php echo $row['t_designation']?>">
     </div>
    </div>
    <br /><br />

    <div class="form-group">
    <label for="t_gender" class="control-label">Gender :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
     <?php
          if ( $row['t_gender']=="male" )
          {
              echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"male\" name=\"t_gender\" checked>Male</label>
      <label class=\"radio-inline\"><input type=\"radio\" value=\"female\" name=\"t_gender\">Female</label>";
          } else {
            echo "<label class=\"radio-inline\"><input type=\"radio\" value=\"male\" name=\"t_gender\">Male</label>
      <label class=\"radio-inline\"><input type=\"radio\" value=\"female\" name=\"t_gender\" checked>Female</label>";
          }

        ?>
     </div>
    </div>

     <br/><br/>
    <div class="form-group">
    <label for="t_dob" class="control-label">Date Of Birth :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="DD/MM/YYYY" type="date" name="t_dob" id="t_dob" value="<?php echo $row['t_dob']?>"required>
     </div>
    </div>
     <br/><br/>

          <div class="form-group">
    <label for="t_contactno" class="control-label">Contact No :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Contact Number" type="tel" name="t_contactno" id="t_contactno" value="<?php echo $row['t_contact']?>">
     </div>
    </div>
     <br/><br/>

          <div class="form-group">
    <label for="t_email" class="control-label">Email :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <input class="form-control" placeholder="Email Id" type="email" name="t_email" id="t_emailid" value="<?php echo $row['t_email']?>"required>
     </div>
    </div>
     <br/><br/>

           <div class="form-group">
    <label for="t_blood" class="control-label">Blood Group :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-4">
     <select class="form-control" name="t_blood_group" required>
                                   <option value="<?php echo $row['t_blood_group']?>" selected ><?php echo strtoupper($row['t_blood_group']);?></option>
                                   <option value="o+">O+</option>
                                   <option value="o-">O-</option>
                                   <option value="a+">A+</option>
                                   <option value="a-">A-</option>
                                   <option value="b+">B+</option>
                                   <option value="b-">B-</option>
                                   <option value="ab+">AB+</option>
                                   <option value="ab-">AB-</option>
                               </select>
     </div>
    </div>
     <br/><br/>

          <div class="form-group">
    <label for="t_category" class="control-label">Category :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-4">
         <select class="form-control" name="t_category" required>
                                   <option value="<?php echo $row['t_category']?>" selected ><?php echo $row['t_category']?></option>
                                   <option value="general">General</option>
                                   <option value="obc">OBC</option>
                                   <option value="nt">NT</option>
                                   <option value="vj">VJ</option>
                                   <option value="st">ST</option>
                                   <option value="sc">SC</option>
                                   <option value="sbc">SBC</option>
                               </select>
     </div>
    </div>
     <br/><br/>

          <div class="form-group">
    <label for="t_address" class="control-label">Permanent Address :<font style="color:#FF0000">*</font></label><br />
      <div class="col-xs-12 col-lg-7">
    <textarea class="form-control" rows="6" name="t_address"><?php echo $row['t_address'];?></textarea>
     </div>
    </div>
     <br/><br/>

           <div class="form-group">
                        <div class="col-xs-8 col-xs-offset-2 col-lg-4 col-lg-offset-6">
                            <p style="padding: 5px;"></p>
                            <button type="submit" class="btn btn-primary btn-block" name="t_per_info">Save &amp; Continue</button>
                        </div>
                       </div>
                </div></div>
    </form></div></div>
           

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
                    <p align=center>�2017 DBATU. All rights reserved. </p>
                </div>
            </div>
        </div>
    </footer>

            </div></div>
           <script src="../LOGIN/js/jquery-1.11.1.js"></script>
           <script src="../LOGIN/js/bootstrap.min.js" type="text/javascript"></script>
       <script src="../LOGIN/js/bootstrapValidator.min.js"type="text/javascript"></script>

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
                  function imagepreview(input){
                    if(input.files && input.files[0]){
                      var filerd = new FileReader();
                      filerd.onload=function(e){
                          $('#preview').attr('src',e.target.result);

                    };                     
          filerd.readAsDataURL(input.files[0]);
           }
       }     
        </script>

   <!---<script type="text/javascript">
        $(document).ready(function(){
            var validator= $("#t_personal_info").bootstrapValidator({


                fields : {

   t_profile_photo : {

                            file: {
                                 extension: 'jpg,jpeg,png',
                                 type:'image/jpg,image/jpeg,image/png',
                                 maxSize: 102400,
                                 message: 'selected file is not supported or bigger.'
                             }


                    },


          }

            });
        });
    </script> -->
    </div></div>
</body>
</html>
